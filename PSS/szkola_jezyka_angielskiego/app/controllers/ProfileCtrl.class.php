<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\SessionUtils;

class ProfileCtrl {
    private $userData;

    public function action_profileShow() {
        $id_user = SessionUtils::load('user_id', true);

        if (!$id_user) {
            App::getRouter()->forwardTo('loginShow');
            return;
        }

        try {
            $this->userData = App::getDB()->get("uzytkownik", [
                "[>]kursant" => ["id_uzytkownika" => "id_uzytkownika"]
            ], [
                "uzytkownik.imie",
                "uzytkownik.nazwisko",
                "uzytkownik.email",
                "uzytkownik.login",
                "uzytkownik.rola",
                "kursant.poziom_jezykowy"
            ], [
                "uzytkownik.id_uzytkownika" => $id_user
            ]);
        } catch (\TypeError | \Exception $e) {

            $sql = "SELECT u.imie, u.nazwisko, u.email, u.login, u.rola, k.poziom_jezykowy 
                    FROM uzytkownik u
                    LEFT JOIN kursant k ON u.id_uzytkownika = k.id_uzytkownika 
                    WHERE u.id_uzytkownika = :id";
            
            $this->userData = App::getDB()->query($sql, [":id" => $id_user])->fetch(\PDO::FETCH_ASSOC);
        }

        App::getSmarty()->assign('user', $this->userData);
        App::getSmarty()->assign('page_title', 'Mój Profil');
        App::getSmarty()->display('ProfileView.tpl');
    }
}