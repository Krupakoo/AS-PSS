<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;

class CourseEditCtrl {

    public function action_courseEdit() {
       
        $id = ParamUtils::getFromCleanURL(1);

        if (isset($id)) {
            try {
                $record = App::getDB()->get("kurs", "*", [
                    "id_kursu" => $id
                ]);

                App::getSmarty()->assign('form', $record);
            } catch (\Exception $e) {
                Utils::addErrorMessage("Błąd bazy danych: " . $e->getMessage());
            }
        }

        App::getSmarty()->display('CourseEditView.tpl');
    }

    public function action_courseSave() {
        Utils::addInfoMessage("Zmiany zostały zapisane.");
        App::getRouter()->forwardTo('myCourses');
    }
}