<?php
require_once dirname(__FILE__) . '/../config.php';

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

    if ($amount < 5000) {
        $messages[] = 'Minimalna kwota kredytu to 5000 zł.';
    }

    if ($interest < 2) {
        $messages[] = 'Minimalne oprocentowanie to 2%.';
    }

    if ($installments <= 0 || $amount <= 0) {
        $messages[] = 'Podaj dodatnie wartości.';
    }

    if (empty($messages)) {
        $monthlyRate = $interest / 100 / 12;

        if ($monthlyRate > 0) {
            $result =
                $amount * ($monthlyRate * pow(1 + $monthlyRate, $installments)) /
                (pow(1 + $monthlyRate, $installments) - 1);
        } else {
            $result = $amount / $installments;
        }
    }
}

include 'calc_view.php';
