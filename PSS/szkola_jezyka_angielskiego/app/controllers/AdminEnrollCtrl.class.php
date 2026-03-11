<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;

class AdminEnrollCtrl {
    private $enrollments;

    public function action_enrollManage() {
        RoleUtils::requireRole('admin', 'loginShow');

        $searchName = ParamUtils::getFromRequest('sf_nazwisko') ?? "";

        try {
            $sql = "SELECT znk.id_zapisu, u.imie, u.nazwisko, k.nazwa AS kurs_nazwa, znk.data_zapisu, znk.tryb, znk.status 
                    FROM zapis_na_kurs znk
                    JOIN uzytkownik u ON znk.kursant_id = u.id_uzytkownika
                    JOIN kurs k ON znk.kurs_id = k.id_kursu";
            
            $params = [];
            if (strlen($searchName) > 0) {
                $sql .= " WHERE u.nazwisko LIKE :nazwisko";
                $params[':nazwisko'] = $searchName . '%';
            }

            $sql .= " ORDER BY znk.data_zapisu DESC";
            
            $this->enrollments = App::getDB()->query($sql, $params)->fetchAll(\PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd bazy danych: ' . $e->getMessage());
        }

        App::getSmarty()->assign('searchName', $searchName);
        App::getSmarty()->assign('enrollments', $this->enrollments);
        App::getSmarty()->display('AdminEnrollView.tpl');
    }

    public function action_enrollAccept() {
        RoleUtils::requireRole('admin', 'loginShow');
        $id = ParamUtils::getFromCleanURL(1);

        if (isset($id)) {
            try {
                App::getDB()->update("zapis_na_kurs", [
                    "status" => "aktywny"
                ], [
                    "id_zapisu" => $id
                ]);
                Utils::addInfoMessage('Zapis został pomyślnie zatwierdzony.');
            } catch (\Exception $e) {
                Utils::addErrorMessage('Błąd podczas zatwierdzania: ' . $e->getMessage());
            }
        }
        App::getRouter()->forwardTo('enrollManage');
    }

    public function action_enrollDelete() {
        RoleUtils::requireRole('admin', 'loginShow');
        $id = ParamUtils::getFromCleanURL(1);

        if (isset($id)) {
            try {
                App::getDB()->delete("zapis_na_kurs", ["id_zapisu" => $id]);
                Utils::addInfoMessage('Pomyślnie usunięto zapis.');
            } catch (\PDOException $e) {
                if ($e->getCode() == '23000') {
                    Utils::addErrorMessage('Nie można usunąć, rekord jest powiązany z innymi danymi.');
                } else {
                    Utils::addErrorMessage('Błąd bazy danych.');
                }
            }
        }
        App::getRouter()->forwardTo('enrollManage');
    }
}