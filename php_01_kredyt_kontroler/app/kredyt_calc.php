<?php
// KONTROLER kalkulatora kredytowego
require_once dirname(__FILE__) . '/../config.php';

// 1. Inicjalizacja zmiennych
$messages = [];
$amount = $_REQUEST['amount'] ?? null;
$installments = $_REQUEST['installments'] ?? null;
$interest = $_REQUEST['interest'] ?? null;

// 2. Walidacja danych
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

// 3. Obliczenia
if (empty($messages)) {
    $amount = floatval($amount);
    $installments = intval($installments);
    $interest = floatval($interest);

    // 🔹 Walidacja: minimalna kwota kredytu 5000 zł
    if ($amount < 5000) {
        $messages[] = 'Minimalna kwota kredytu to 5000 zł.';
    }

    // 🔹 Walidacja: minimalne oprocentowanie 2%
    if ($interest < 2) {
        $messages[] = 'Minimalne oprocentowanie to 2%.';
    }

    if ($amount <= 0 || $installments <= 0 || $interest < 0) {
        $messages[] = 'Podaj dodatnie wartości.';
    }

    // Jeśli brak błędów, wykonaj obliczenia
    if (empty($messages)) {
        $monthlyRate = $interest / 100 / 12;

        if ($monthlyRate > 0) {
            $result = $amount * ($monthlyRate * pow(1 + $monthlyRate, $installments)) / (pow(1 + $monthlyRate, $installments) - 1);
        } else {
            $result = $amount / $installments; // oprocentowanie = 0
        }
    }
}

// 4. Wywołanie widoku
include 'kredyt_view.php';
