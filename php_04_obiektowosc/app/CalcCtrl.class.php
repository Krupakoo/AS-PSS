<?php

global $conf; 

require_once $conf->root_path.'/lib/smarty/Smarty.class.php'; 
require_once $conf->root_path.'/lib/Messages.class.php'; 
require_once $conf->root_path.'/app/CalcForm.class.php';
require_once $conf->root_path.'/app/CalcResult.class.php';



class CalcCtrl {

	private $msgs;       
	private $form;       
	private $result;     
	private $hide_intro; 

	public function __construct(){
		
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->hide_intro = false;
	}
	

	public function getParams(){
		$this->form->kwota   = isset($_REQUEST ['kwota']) ? $_REQUEST ['kwota'] : null;
		$this->form->lata    = isset($_REQUEST ['lata']) ? $_REQUEST ['lata'] : null;
		$this->form->procent = isset($_REQUEST ['procent']) ? $_REQUEST ['procent'] : null;
	}
	

	public function validate() {
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->lata ) && isset ( $this->form->procent ))) {
			return false; 
		} else { 
			$this->hide_intro = true; 
			$this->msgs->addInfo('Przekazano parametry. Wykonuję walidację.');
		}
		
		if ($this->form->kwota == "") {
			$this->msgs->addError('Nie podano kwoty kredytu.');
		}
		if ($this->form->lata == "") {
			$this->msgs->addError('Nie podano liczby lat.');
		}
		if ($this->form->procent == "") {
			$this->msgs->addError('Nie podano oprocentowania.');
		}
		
		if (! $this->msgs->isError()) {
			
			if (! is_numeric( $this->form->kwota ) || $this->form->kwota <= 0) {
				$this->msgs->addError('Kwota musi być dodatnią liczbą.');
			}
			if (! is_numeric( $this->form->lata ) || $this->form->lata <= 0) {
				$this->msgs->addError('Liczba lat musi być dodatnią liczbą.');
			}
			if (! is_numeric( $this->form->procent )) { 
				$this->msgs->addError('Oprocentowanie musi być liczbą.');
			}
		}
		
		return ! $this->msgs->isError();
	}
	

	public function process(){

		$this->getParams(); 
		
		if ($this->validate()) {
				
			$this->msgs->addInfo('Parametry poprawne. Wykonuję obliczenia.');
			
			
			$kwota_f = floatval($this->form->kwota);
			$lata_i = intval($this->form->lata);
			$procent_f = floatval($this->form->procent);
				
			$miesiece = $lata_i * 12;
			$p_miesieczne = ($procent_f / 100) / 12;
			
			if ($p_miesieczne == 0) {
				$rata_miesieczna = $kwota_f / $miesiece;
			} else {
				$potega = pow((1 + $p_miesieczne), $miesiece);
				$rata_miesieczna = $kwota_f * ($p_miesieczne * $potega) / ($potega - 1);
			}

			$this->result->rata = number_format($rata_miesieczna, 2, ',', ' ') . " PLN";
			
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		
		$smarty->assign('page_title','Kalkulator Kredytowy (OOP)');
		$smarty->assign('page_description','Wersja z programowaniem obiektowym.');
		$smarty->assign('page_header','Obiekty w PHP');
				
		$smarty->assign('hide_intro',$this->hide_intro);
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result); 
	
		$smarty->display($conf->root_path.'/app/CalcView.html');
	}
}