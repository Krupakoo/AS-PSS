<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;

class GradeCtrl {
    private $students;
    private $courses;
    private $grades;

   
    public function action_gradeAdd() {
    $id_user = SessionUtils::load('user_id', true);
    $role = $_SESSION['role'];

    try {
      
        if ($role == 'admin') {
            $this->courses = App::getDB()->select("kurs", ["id_kursu", "nazwa"]);
        } else {
            $this->courses = App::getDB()->select("kurs", ["id_kursu", "nazwa"], ["lektor_id" => $id_user]);
        }
        $sql = "SELECT DISTINCT u.id_uzytkownika, u.imie, u.nazwisko 
                FROM uzytkownik u
                JOIN zapis_na_kurs znk ON u.id_uzytkownika = znk.kursant_id
                WHERE znk.status = 'aktywny' AND u.rola = 'kursant'";
        
        $this->students = App::getDB()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

    } catch (\Exception $e) {
        Utils::addErrorMessage("Błąd podczas przygotowania formularza.");
    }

    App::getSmarty()->assign('courses', $this->courses);
    App::getSmarty()->assign('students', $this->students);
    App::getSmarty()->display('GradeAddView.tpl');
}

   public function action_gradeSave() {
    $id_kursant = ParamUtils::getFromRequest('id_kursant');
    $id_kursu = ParamUtils::getFromRequest('id_kursu');
    $ocena = ParamUtils::getFromRequest('ocena');
    $id_lektor = SessionUtils::load('user_id', true);

    $is_enrolled = App::getDB()->has("zapis_na_kurs", [
        "kursant_id" => $id_kursant,
        "kurs_id" => $id_kursu,
        "status" => "aktywny"
    ]);

    if (!$is_enrolled) {
        Utils::addErrorMessage("Błąd: Ten kursant nie jest zapisany na wybrany kurs!");
        App::getRouter()->forwardTo('gradeAdd');
        return;
    }
    App::getDB()->insert("ocena", [
        "kursant_id" => $id_kursant,
        "kurs_id" => $id_kursu,
        "lektor_id" => $id_lektor,
        "wartosc" => $ocena,
        "data_wystawienia" => date("Y-m-d")
    ]);

    Utils::addInfoMessage("Ocena została wystawiona pomyślnie.");
    App::getRouter()->redirectTo('myGrades');
}
  public function action_myGrades() {
    $id_user = SessionUtils::load('user_id', true);
    $role = $_SESSION['role'];
    $this->grades = [];

    try {
        if ($role == 'admin') {
            $sql = "SELECT k.nazwa, o.wartosc, o.data_wystawienia, 
                           u_s.imie AS student_imie, u_s.nazwisko AS student_nazwisko,
                           u_l.imie AS lektor_imie, u_l.nazwisko AS lektor_nazwisko
                    FROM ocena o
                    JOIN kurs k ON o.kurs_id = k.id_kursu
                    JOIN uzytkownik u_s ON o.kursant_id = u_s.id_uzytkownika
                    JOIN uzytkownik u_l ON o.lektor_id = u_l.id_uzytkownika
                    ORDER BY o.data_wystawienia DESC";
            $this->grades = App::getDB()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        } 
        else if ($role == 'lektor') {
            $sql = "SELECT k.nazwa, o.wartosc, o.data_wystawienia, 
                           u.imie AS student_imie, u.nazwisko AS student_nazwisko
                    FROM ocena o
                    JOIN kurs k ON o.kurs_id = k.id_kursu
                    JOIN uzytkownik u ON o.kursant_id = u.id_uzytkownika
                    WHERE o.lektor_id = :id
                    ORDER BY o.data_wystawienia DESC";
            $this->grades = App::getDB()->query($sql, [":id" => $id_user])->fetchAll(\PDO::FETCH_ASSOC);
        } 
        else {
            $sql = "SELECT k.nazwa, o.wartosc, o.data_wystawienia, 
                           u.imie AS lektor_imie, u.nazwisko AS lektor_nazwisko
                    FROM ocena o
                    JOIN kurs k ON o.kurs_id = k.id_kursu
                    JOIN uzytkownik u ON o.lektor_id = u.id_uzytkownika
                    WHERE o.kursant_id = :id
                    ORDER BY o.data_wystawienia DESC";
            $this->grades = App::getDB()->query($sql, [":id" => $id_user])->fetchAll(\PDO::FETCH_ASSOC);
        }
    } catch (\Exception $e) {
        Utils::addErrorMessage("Błąd pobierania danych.");
    }

    App::getSmarty()->assign('grades', $this->grades);
    App::getSmarty()->display('MyGradesView.tpl');
}
}