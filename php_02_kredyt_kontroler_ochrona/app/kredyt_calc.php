<?php
require_once dirname(__FILE__) . '/../config.php';
session_start();

$messages = [];
$amount = $_REQUEST['amount'] ?? null;
$installments = $_REQUEST['installments'] ?? null;
$interest = $_REQUEST['interest'] ?? null;

if (!isset($amount, $installments, $interest)) {
    $messages[] = 'Brak jednego z wymaganych parametrów.';
}

if ($amount === '') $messages[] = 'Nie podano kwoty kredytu.';
if ($installments === '') $messages[] = 'Nie wybrano liczby rat.';
if ($interest === '') $messages[] = 'Nie podano oprocentowania.';

if (empty($messages)) {
    if (!is_numeric($amount)) $messages[] = 'Kwota musi być liczbą.';
    if (!is_numeric($interest)) $messages[] = 'Oprocentowanie musi być liczbą.';
}

if (empty($messages)) {
    $amount = floatval($amount);
    $installments = intval($installments);
    $interest = floatval($interest);

    if ($amount <= 0 || $installments <= 0 || $interest < 0) {
        $messages[] = 'Podaj dodatnie wartości.';
    }

    if (empty($messages)) {
        if ($amount <= 10000) {
        }
        elseif ($amount > 10000 && $amount <= 50000) {
            if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'user' && $_SESSION['role'] != 'admin')) {
                $messages[] = 'Kwoty powyżej 10 000 zł wymagają konta pracownika.';
            }
        }
        elseif ($amount > 50000) {
            if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
                $messages[] = 'Kwoty powyżej 50 000 zł wymagają konta administratora.';
            }
        }
    }

    if (empty($messages)) {
        if (!isset($_SESSION['role']) || $_SESSION['role'] == '') {
            if ($interest < 9) {
                $messages[] = 'Gość może wybrać oprocentowanie minimum 9%.';
            }
        }
        elseif ($_SESSION['role'] == 'user') {
            if ($interest < 6) {
                $messages[] = 'Pracownik może ustawić oprocentowanie od 6% wzwyż.';
            }
        }
        elseif ($_SESSION['role'] == 'admin') {
            if ($interest < 1) {
                $messages[] = 'Administrator może ustawić oprocentowanie od 1% wzwyż.';
            }
        }
    }
}

if (empty($messages)) {
    $monthlyRate = $interest / 100 / 12;
    if ($monthlyRate > 0) {
        $result = $amount * ($monthlyRate * pow(1 + $monthlyRate, $installments)) / (pow(1 + $monthlyRate, $installments) - 1);
    } else {
        $result = $amount / $installments;
    }
}

include _ROOT_PATH . '/app/kredyt_view.php';
