<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class LoginCtrl {

    private $form;

    public function __construct() {
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        if (!isset($this->form->login) || empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        if (App::getMessages()->isError()) return false;

        try {
            $user = App::getDB()->get("uzytkownik", [
                "id_uzytkownika",
                "haslo_hash",
                "rola",
                "imie"
            ], [
                "OR" => [
                    "login" => $this->form->login,
                    "email" => $this->form->login
                ]
            ]);

            if ($user && ($this->form->pass == $user['haslo_hash'] || password_verify($this->form->pass, $user['haslo_hash']))) {
                
                if (isset($_SESSION['_core_roles'])) {
                    unset($_SESSION['_core_roles']);
                }
                
                RoleUtils::addRole($user['rola']);
                
                $_SESSION['user_id'] = $user['id_uzytkownika'];
                $_SESSION['user_name'] = $user['imie'];
                $_SESSION['role'] = $user['rola'];
                
            } else {
                Utils::addErrorMessage('Niepoprawny login lub hasło');
            }
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd bazy danych');
        }

        return !App::getMessages()->isError();
    }

    public function action_loginShow() {
        $this->generateView();
    }

    public function action_login() {
        if ($this->validate()) {
            Utils::addInfoMessage('Witaj ' . $_SESSION['user_name'] . '! Zostałeś poprawnie zalogowany.');
            App::getRouter()->redirectTo("mainPage");
        } else {
            $this->generateView();
        }
    }

    public function action_logout() {
        session_destroy();
        Utils::addInfoMessage('Poprawnie wylogowano z systemu');
        App::getRouter()->redirectTo('mainPage');
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->display('LoginView.tpl');
    }
}