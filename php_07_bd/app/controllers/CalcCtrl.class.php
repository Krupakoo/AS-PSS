<?php
namespace app\controllers;

use app\forms\CalcParamsForm;
use app\transfer\CalcResult;
use PDOException;

class CalcCtrl {

    private $form;
    private $result;
    public $records;

    public function __construct(){
        $this->form = new CalcParamsForm();
        $this->result = new CalcResult();
    }

    public function getParams(){
        $this->form->kwota = getFromRequest('kwota');
        $this->form->lata = getFromRequest('lata');
        $this->form->procent = getFromRequest('procent');
    }

    public function validate() {
        if (! (isset($this->form->kwota) && isset($this->form->lata) && isset($this->form->procent))) {
            return false;
        }
        
        if (empty($this->form->kwota)) {
            getMessages()->addError('Nie podano kwoty');
        }
        if (empty($this->form->lata)) {
            getMessages()->addError('Nie podano lat');
        }
        if (empty($this->form->procent)) {
            getMessages()->addError('Nie podano oprocentowania');
        }
        
        if (! getMessages()->isError()) {
            
            if (! is_numeric($this->form->kwota)) {
                getMessages()->addError('Kwota nie jest liczbą całkowitą');
            }
            if (! is_numeric($this->form->lata)) {
                getMessages()->addError('Lata nie są liczbą całkowitą');
            }
            if (! is_numeric($this->form->procent)) {
                getMessages()->addError('Oprocentowanie nie jest liczbą całkowitą');
            }
            
            if (! getMessages()->isError()) {
                
                $kwota = floatval($this->form->kwota);
                $lata = intval($this->form->lata);
                $procent = floatval($this->form->procent);

               
                if ($kwota < 0) getMessages()->addError('Kwota nie może być ujemna');
                if ($lata < 0) getMessages()->addError('Lata nie mogą być ujemne');
                if ($procent < 0) getMessages()->addError('Oprocentowanie nie może być ujemne');

                
                
                if (inRole('admin')) {
                    
                    if ($procent < 2) {
                        getMessages()->addError('Dla Administratora minimalne oprocentowanie to 2%');
                    }
                } else {
                    
                    if ($kwota > 50000) {
                        getMessages()->addError('Zwykły użytkownik może wnioskować o kredyt maksymalnie do 50 000 zł');
                    }
                    if ($procent < 10) {
                        getMessages()->addError('Dla użytkownika minimalne oprocentowanie to 10%');
                    }
                }
            }
        }
        
        return ! getMessages()->isError();
    }

    public function action_calcCompute() {
        $this->getParams();
        
        if ($this->validate()) {
            
            $kwota = floatval($this->form->kwota);
            $lata = intval($this->form->lata);
            $procent = floatval($this->form->procent);
            
            $oprocentowanie_mies = $procent / 100 / 12;
            $liczba_rat = $lata * 12;

            if ($oprocentowanie_mies == 0) {
                $this->result->rata = $kwota / $liczba_rat;
            } else {
                $this->result->rata = $kwota * $oprocentowanie_mies / (1 - pow(1 + $oprocentowanie_mies, -$liczba_rat));
            }
            $this->result->rata = round($this->result->rata, 2);

            try {
                
                \getDB()->insert("wynik", [ 
                    "kwota" => $kwota,
                    "lata" => $lata,
                    "procent" => $procent,
                    "rata" => $this->result->rata,
                    "data" => date("Y-m-d H:i:s") 
                ]);

                \getMessages()->addInfo('Obliczenia i zapis do bazy zakończone pomyślnie.');

            } catch (PDOException $e) {
                \getMessages()->addError('Wystąpił błąd podczas zapisu do bazy.');
                if (\getConf()->debug) \getMessages()->addError($e->getMessage()); 
            }
        }
        
        $this->generateView();
    }

    public function action_calcShow(){
        $this->generateView();
    }

    public function action_calcHistory(){
        $this->records = []; 
        
        try{
            
            $this->records = \getDB()->select("wynik", [
                "kwota",
                "lata",
                "procent",
                "rata",
                "data"
            ], [ 
                "ORDER" => ["data" => "DESC"]
            ]);
            
        } catch (PDOException $e){
            \getMessages()->addError('Wystąpił błąd podczas pobierania historii obliczeń.');
            if (\getConf()->debug) \getMessages()->addError($e->getMessage()); 
        }
        
        $this->generateHistoryView();
    }

    public function generateView(){
        \getSmarty()->assign('page_title','Kalkulator Kredytowy');
        \getSmarty()->assign('form', $this->form);
        \getSmarty()->assign('res', $this->result);
        \getSmarty()->display('CalcView.tpl');
    }

    public function generateHistoryView(){
        \getSmarty()->assign('page_title','Historia Obliczeń');
        \getSmarty()->assign('records', $this->records);
        \getSmarty()->display('CalcHistoryView.tpl');
    }
}