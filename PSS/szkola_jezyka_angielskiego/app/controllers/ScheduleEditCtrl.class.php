<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\RoleUtils;

class ScheduleEditCtrl {
    private $schedule;


    private function checkAccess() {
        if (!RoleUtils::inRole('lektor') && !RoleUtils::inRole('admin')) {
            App::getRouter()->forwardTo('loginShow');
            exit(); 
        }
    }

    public function action_scheduleManage() {
        $this->checkAccess(); 

        try {
            $sql = "SELECT z.id_zajec, k.nazwa, z.data_czas, z.temat, z.link_do_spotkania, z.tryb 
                    FROM zajecia z 
                    JOIN kurs k ON z.kurs_id = k.id_kursu 
                    ORDER BY z.data_czas DESC";
            
            $this->schedule = App::getDB()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
            $courses = App::getDB()->select("kurs", ["id_kursu", "nazwa"]);

            App::getSmarty()->assign('courses', $courses);
            App::getSmarty()->assign('schedule', $this->schedule);
            App::getSmarty()->display('ScheduleManageView.tpl');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd bazy danych: ' . $e->getMessage());
        }
    }

    public function action_scheduleSave() {
    $this->checkAccess();

    $id_kurs = ParamUtils::getFromRequest('id_kurs');
    $tryb = ParamUtils::getFromRequest('tryb');
    $data_czas = ParamUtils::getFromRequest('data_czas');
    $temat = ParamUtils::getFromRequest('temat');
    
  
    if (empty($id_kurs) || empty($data_czas) || empty($temat)) {
        Utils::addErrorMessage('Wszystkie pola (kurs, data, temat) są wymagane!');
        $this->action_scheduleManage();
        return;
    }

 
    $now = new \DateTime();
    $inputDate = new \DateTime($data_czas);

    if ($inputDate < $now) {
        Utils::addErrorMessage('Nie możesz zaplanować zajęć w przeszłości!');
        $this->action_scheduleManage();
        return;
    }


    $link = ($tryb == 'online') ? ParamUtils::getFromRequest('link') : null;
    $miejsce = ($tryb == 'stacjonarne') ? ParamUtils::getFromRequest('miejsce') : null;
    

    if ($tryb == 'online' && empty($link)) {
        Utils::addErrorMessage('Dla zajęć online musisz podać link do spotkania!');
        $this->action_scheduleManage();
        return;
    }

    $id_lektor = $_SESSION['user_id']; //

    try {
        App::getDB()->insert("zajecia", [
            "kurs_id" => $id_kurs,
            "lektor_id" => $id_lektor,
            "data_czas" => $data_czas,
            "temat" => $temat,
            "link_do_spotkania" => $link,
            "miejsce" => $miejsce,
            "tryb" => $tryb
        ]);
        Utils::addInfoMessage('Zajęcia zostały pomyślnie dodane do harmonogramu.');
    } catch (\Exception $e) {
        Utils::addErrorMessage('Błąd zapisu: ' . $e->getMessage());
    }

    App::getRouter()->forwardTo('scheduleManage');
}

    public function action_scheduleDelete() {
    $this->checkAccess();
    
    $id = ParamUtils::getFromCleanURL(1);

    if (isset($id)) {
        try {
            App::getDB()->delete("zajecia", ["id_zajec" => $id]);
            Utils::addInfoMessage('Zajęcia zostały usunięte z harmonogramu.');
            
        } catch (\PDOException $e) {
            
            Utils::addErrorMessage('Nie można usunąć zajęć, ponieważ są do nich przypisani kursanci lub lista obecności.');
        }
    }
    
    App::getRouter()->forwardTo('scheduleManage');
}
}