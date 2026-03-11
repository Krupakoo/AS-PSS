<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\RegisterForm;

class RegisterCtrl {
    private $form;

    public function __construct() {
        $this->form = new RegisterForm();
    }

    public function validate() {
        
        $this->form->login = ParamUtils::getFromRequest('login', true, 'Login jest wymagany');
        $this->form->pass = ParamUtils::getFromRequest('pass', true, 'Hasło jest wymagane');
        $this->form->imie = ParamUtils::getFromRequest('imie', true, 'Imię jest wymagane');
        $this->form->nazwisko = ParamUtils::getFromRequest('nazwisko', true, 'Nazwisko jest wymagane');
        $this->form->email = ParamUtils::getFromRequest('email', true, 'E-mail jest wymagany');
        $this->form->telefon = ParamUtils::getFromRequest('telefon', true, 'Numer telefonu jest wymagany');

        if (App::getMessages()->isError()) return false;

   
        try {
            $exists = App::getDB()->has("uzytkownik", [
                "OR" => [
                    "login" => $this->form->login,
                    "email" => $this->form->email
                ]
            ]);
            if ($exists) {
                Utils::addErrorMessage('Użytkownik o podanym loginie lub adresie e-mail już istnieje');
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd bazy danych przy sprawdzaniu unikalności');
        }

        return !App::getMessages()->isError();
    }

    public function action_registerShow() {
        $this->generateView();
    }

    public function action_registerSave() {
        if ($this->validate()) {
            try {
                
                App::getDB()->action(function($db) {
                 
                    $db->insert("uzytkownik", [
                        "login" => $this->form->login, 
                        "email" => $this->form->email,
                        "haslo_hash" => password_hash($this->form->pass, PASSWORD_DEFAULT),
                        "imie" => $this->form->imie,
                        "nazwisko" => $this->form->nazwisko,
                        "telefon" => $this->form->telefon, 
                        "rola" => "kursant"
                    ]);
                    
                    $user_id = $db->id();

                    
                    $db->insert("kursant", [
                        "id_uzytkownika" => $user_id,
                        "poziom_jezykowy" => "A1"
                    ]);
                });

                Utils::addInfoMessage('Konto zostało utworzone pomyślnie. Możesz się teraz zalogować.');
                App::getRouter()->redirectTo('loginShow');
            } catch (\Exception $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas zapisu danych: ' . $e->getMessage());
            }
        } else {
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('RegisterView.tpl');
    }
}