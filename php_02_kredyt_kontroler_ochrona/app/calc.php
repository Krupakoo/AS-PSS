<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

function getParams(&$kwota,&$lata,&$procent){
	$kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
	$procent = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;	
}

function validate(&$kwota,&$lata,&$procent,&$messages, $role){
	
	if ( ! (isset($kwota) && isset($lata) && isset($procent))) {
		return false;
	}

	if ( $kwota == "") {
		$messages [] = 'Nie podano kwoty kredytu.';
	}
	if ( $lata == "") {
		$messages [] = 'Nie podano liczby lat.';
	}
	if ( $procent == "") {
		$messages [] = 'Nie podano oprocentowania.';
	}

	if (count ( $messages ) != 0) return false;
	
	if (! is_numeric( $kwota ) || $kwota <= 0) {
		$messages [] = 'Kwota musi być dodatnią liczbą.';
	}
	
	if (! is_numeric( $lata ) || $lata <= 0) {
		$messages [] = 'Liczba lat musi być dodatnią liczbą.';
	}	
    
	if (! is_numeric( $procent )) {
		$messages [] = 'Oprocentowanie musi być liczbą.';
	}	
    
	if (count ( $messages ) != 0) return false;
    
    $kwota_f = floatval($kwota);
    $procent_f = floatval($procent);
    
    switch ($role) {
        case 'user':
            if ($kwota_f > 10000) {
                $messages [] = 'Użytkownik (rola **user**) może wnioskować o kwotę maksymalnie do 10 000 PLN.';
            }
            if ($procent_f < 10) {
                $messages [] = 'Dla roli **user** minimalne oprocentowanie to 10%.';
            }
            break;
            
        case 'worker':
            if ($kwota_f > 50000) {
                $messages [] = 'Pracownik (rola **worker**) może wnioskować o kwotę maksymalnie do 50 000 PLN.';
            }
            if ($procent_f < 7) {
                $messages [] = 'Dla roli **worker** minimalne oprocentowanie to 7%.';
            }
            break;
            
        case 'admin':
            break;
            
        default:
            $messages [] = 'Błąd autoryzacji: nieznana rola.';
            return false;
    }
    
	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$kwota,&$lata,&$procent,&$messages,&$result){
	
	$kwota_f = floatval($kwota);
	$lata_i = intval($lata);
	$procent_f = floatval($procent);
	
    $rata_miesieczna = 0;

    $miesiece = $lata_i * 12;

    $p_miesieczne = ($procent_f / 100) / 12;
    
    if ($p_miesieczne == 0) {
        $rata_miesieczna = $kwota_f / $miesiece;
    } else {
        $potega = pow((1 + $p_miesieczne), $miesiece);
        $rata_miesieczna = $kwota_f * ($p_miesieczne * $potega) / ($potega - 1);
    }
    
    $result = number_format($rata_miesieczna, 2, ',', ' ') . " PLN";
}

$kwota = null;
$lata = null;
$procent = null;
$result = null;
$messages = array();

getParams($kwota,$lata,$procent);

global $role; 

if ( validate($kwota,$lata,$procent,$messages, $role) ) {
	process($kwota,$lata,$procent,$messages,$result);
}

include 'calc_view.php';

?>
