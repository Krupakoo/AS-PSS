<?php
require_once 'CalcForm.class.php';
require_once 'CalcResult.class.php';

class CalcCtrl {

	private $form;
	private $result;

	public function __construct(){
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	public function getParams(){
		$this->form->kwota   = getFromRequest('kwota');
		$this->form->lata    = getFromRequest('lata');
		$this->form->procent = getFromRequest('procent');
	}
	
	public function validate() {
		if (! (isset($this->form->kwota) && isset($this->form->lata) && isset($this->form->procent))) {
			return false;
		}
		
		if ($this->form->kwota == "") {
			getMessages()->addError('Nie podano kwoty kredytu');
		}
		if ($this->form->lata == "") {
			getMessages()->addError('Nie podano okresu w latach');
		}
		if ($this->form->procent == "") {
			getMessages()->addError('Nie podano oprocentowania');
		}
		
		if (! getMessages()->isError()) {
			
			if (! is_numeric($this->form->kwota) || $this->form->kwota <= 0) {
				getMessages()->addError('Kwota musi być dodatnią liczbą');
			}
			
			if (! is_numeric($this->form->procent) || $this->form->procent <= 0) {
				getMessages()->addError('Oprocentowanie musi być dodatnią liczbą');
			}
            
			$lata_int = filter_var($this->form->lata, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1)));
			if ($lata_int === false) {
				getMessages()->addError('Okres kredytowania (lata) musi być dodatnią liczbą całkowitą');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
			$kwota_f = floatval($this->form->kwota);
			$lata_i = intval($this->form->lata);
			$procent_f = floatval($this->form->procent);
            
			$ilosc_rat = $lata_i * 12;
			$stopa_mies = ($procent_f / 100) / 12;
			
			$q = 1 + $stopa_mies;
			
			if ($stopa_mies > 0) {
				$rata_miesieczna = $kwota_f * ( (pow($q, $ilosc_rat) * $stopa_mies) / 
								  (pow($q, $ilosc_rat) - 1) );
			} else {
				$rata_miesieczna = $kwota_f / $ilosc_rat;
			}
			
			$this->result->rata = number_format($rata_miesieczna, 2, ',', ' ') . " PLN";
			
			getMessages()->addInfo('Obliczenia zakończone.');
		}
		
		$this->generateView();
	}
	
	public function generateView(){
		
		getSmarty()->assign('page_title','Kalkulator Kredytowy OOP');
		getSmarty()->assign('page_header','Kalkulator Kredytowy');
					
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.html'); 
	}
}
?>