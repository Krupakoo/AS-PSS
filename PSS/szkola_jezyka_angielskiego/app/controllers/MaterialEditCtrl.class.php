<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;

class MaterialEditCtrl {

    public function action_materialAdd() {
        $id_user = SessionUtils::load('user_id', true);
        $role = $_SESSION['role'];

        try {
            if ($role == 'admin') {
                $courses = App::getDB()->select("kurs", ["id_kursu", "nazwa"]);
            } else {
                $courses = App::getDB()->select("kurs", ["id_kursu", "nazwa"], ["lektor_id" => $id_user]);
            }
            App::getSmarty()->assign('courses', $courses);
        } catch (\Exception $e) {
            Utils::addErrorMessage("Błąd pobierania listy kursów.");
        }

        App::getSmarty()->display('MaterialAddView.tpl');
    }

    public function action_materialSave() {
        $id_kursu = ParamUtils::getFromRequest('id_kursu');
        $tytul = ParamUtils::getFromRequest('tytul');
        $opis = ParamUtils::getFromRequest('opis');
        $link = ParamUtils::getFromRequest('url_pliku');

        if (empty($tytul) || empty($id_kursu)) {
            Utils::addErrorMessage('Tytuł i wybór kursu są wymagane.');
            $this->action_materialAdd();
            return;
        }

        try {
            App::getDB()->insert("material_edukacyjny", [
                "kurs_id" => $id_kursu,
                "tytul"   => $tytul,
                "opis"    => $opis,
                "url_pliku" => $link
            ]);
            Utils::addInfoMessage("Materiał został dodany pomyślnie.");
        } catch (\Exception $e) {
            Utils::addErrorMessage("Wystąpił błąd podczas zapisu: " . $e->getMessage());
        }

        App::getRouter()->forwardTo('myCourses');
    }
}