<?php
require_once dirname(__FILE__).'/../config.php';

require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

function getParams(&$form){
	$form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$form['lata'] = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
	$form['procent'] = isset($_REQUEST['procent']) ? $_REQUEST['procent'] : null;	
}

function validate(&$form,&$infos,&$msgs,&$hide_intro){
    
	if ( ! (isset($form['kwota']) && isset($form['lata']) && isset($form['procent']) ))	return false;
    
    $hide_intro = true;
    $infos [] = 'Przekazano parametry. Wykonuję walidację.';

	if ( $form['kwota'] == "") $msgs [] = 'Nie podano kwoty kredytu.';
	if ( $form['lata'] == "") $msgs [] = 'Nie podano liczby lat.';
	if ( $form['procent'] == "") $msgs [] = 'Nie podano oprocentowania.';

	if (count($msgs) > 0) return false;
	
	if (! is_numeric( $form['kwota'] ) || $form['kwota'] <= 0) $msgs [] = 'Kwota musi być dodatnią liczbą.';
	if (! is_numeric( $form['lata'] ) || $form['lata'] <= 0) $msgs [] = 'Liczba lat musi być dodatnią liczbą.';	
	if (! is_numeric( $form['procent'] )) $msgs [] = 'Oprocentowanie musi być liczbą.';	
    
	if (count($msgs) > 0) return false;
	else return true;
}

function process(&$form,&$infos,&$msgs,&$result){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	$kwota_f = floatval($form['kwota']);
	$lata_i = intval($form['lata']);
	$procent_f = floatval($form['procent']);
	
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

$form = array(
    'kwota' => null,
    'lata' => null,
    'procent' => null
);
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

$smarty = new Smarty\Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kalkulator Kredytowy');
$smarty->assign('page_description','Kalkulator Kredytowy oparty na bibliotece Smarty');
$smarty->assign('page_header','Kalkulator Kredytowy');

$smarty->assign('hide_intro',$hide_intro);

$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

$smarty->display(_ROOT_PATH.'/app/calc.html');
?>