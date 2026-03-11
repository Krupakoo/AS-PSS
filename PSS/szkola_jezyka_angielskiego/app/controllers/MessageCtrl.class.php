<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;

class MessageCtrl {
    private $messages;
    private $receivers;
   public function action_messageList() {
    $id_user = SessionUtils::load('user_id', true);
    if (!$id_user) { App::getRouter()->forwardTo('loginShow'); return; }

    try {
        $sql = "SELECT w.id_wiadomosci, w.temat, w.tresc, w.data_wyslania, u.imie, u.nazwisko 
                FROM wiadomosc w
                JOIN uzytkownik u ON w.nadawca_id = u.id_uzytkownika 
                WHERE w.odbiorca_id = :id 
                ORDER BY w.data_wyslania DESC";
        
        $this->messages = App::getDB()->query($sql, [":id" => $id_user])->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        Utils::addErrorMessage("Błąd podczas pobierania wiadomości.");
        $this->messages = []; 
    }
    App::getSmarty()->assign('messages', $this->messages);
    

    App::getSmarty()->display('MessageListView.tpl');
}

 public function action_messageNew() {

    $id_user = \core\SessionUtils::load('user_id', true);
    $role = \core\SessionUtils::load('role', true);

    try {
   
        if ($role == 'admin' || $role == 'lektor') {
            
            $this->receivers = App::getDB()->select("uzytkownik", [
                "id_uzytkownika", "imie", "nazwisko", "rola"
            ], [
                "id_uzytkownika[!]" => $id_user
            ]);
        } else if ($role == 'kursant') {

    $sql = "SELECT DISTINCT u.id_uzytkownika, u.imie, u.nazwisko, u.rola 
            FROM uzytkownik u
            JOIN kurs k ON u.id_uzytkownika = k.lektor_id
            JOIN zapis_na_kurs z ON k.id_kursu = z.kurs_id
            WHERE z.kursant_id = :id_studenta";
    
    $this->receivers = App::getDB()->query($sql, [":id_studenta" => $id_user])->fetchAll(\PDO::FETCH_ASSOC);
}


        if (empty($this->receivers)) {
            $this->receivers = App::getDB()->select("uzytkownik", [
                "id_uzytkownika", "imie", "nazwisko", "rola"
            ], [
                "id_uzytkownika[!]" => $id_user
            ]);
        }

    } catch (\Exception $e) {
        \core\Utils::addErrorMessage("Błąd pobierania danych: " . $e->getMessage());
    }

    App::getSmarty()->assign('receivers', $this->receivers);
    App::getSmarty()->display('MessageNewView.tpl');
}


    public function action_messageSend() {
        $id_nadawca = SessionUtils::load('user_id', true);
        $id_odbiorca = ParamUtils::getFromRequest('id_odbiorca');
        $temat = ParamUtils::getFromRequest('temat');
        $tresc = ParamUtils::getFromRequest('tresc');

        if (empty($id_odbiorca) || empty($tresc)) {
            Utils::addErrorMessage("Odbiorca i treść nie mogą być puste.");
            $this->action_messageNew();
            return;
        }

        try {
            App::getDB()->insert("wiadomosc", [
                "nadawca_id" => $id_nadawca,
                "odbiorca_id" => $id_odbiorca,
                "temat" => $temat,
                "tresc" => $tresc,
                "data_wyslania" => date("Y-m-d H:i:s")
            ]);
            Utils::addInfoMessage("Wiadomość została wysłana!");
        } catch (\Exception $e) {
            Utils::addErrorMessage("Błąd wysyłania: " . $e->getMessage());
        }
        
        App::getRouter()->forwardTo('messageList');
    }
}