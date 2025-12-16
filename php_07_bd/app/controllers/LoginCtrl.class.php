<?php
namespace app\controllers;

use app\forms\LoginForm;

class LoginCtrl {

    private $form;

    public function __construct(){
        $this->form = new LoginForm();
    }
    
    public function validate() {
        $this->form->login = getFromRequest('login');
        $this->form->pass = getFromRequest('pass');

        if (! (isset($this->form->login) && isset($this->form->pass))) {
            return false;
        }

        if (empty($this->form->login)) {
            getMessages()->addError('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            getMessages()->addError('Nie podano hasła');
        }

        if (getMessages()->isError()) return false;

        if ($this->form->login == "admin" && $this->form->pass == "admin") {
            \getConf()->roles [] = 'admin';
        } else if ($this->form->login == "user" && $this->form->pass == "user") {
            \getConf()->roles [] = 'user';
        } else {
            getMessages()->addError('Niepoprawny login lub hasło');
        }
        
        return ! getMessages()->isError();
    }
    
    public function action_login(){
        if ($this->validate()){
            
            
            $_SESSION['_roles'] = serialize(\getConf()->roles);
            
          
            \getConf()->roles = isset($_SESSION['_roles']) ? unserialize($_SESSION['_roles']) : array(); 
            
            
            session_write_close(); 
            
          
            header("Location: " . \getConf()->action_url . "calcShow");
            exit; 
        } else {
            $this->generateView(); 
        }
    }
    
    public function action_logout(){
        session_destroy();

        \getConf()->roles = array();

        header("Location: " . \getConf()->action_url . "loginShow");
        exit;
    }

    public function action_loginShow(){
        $this->generateView();
    }

    public function generateView(){
        \getSmarty()->assign('page_title','Strona logowania');
        \getSmarty()->assign('form',$this->form);
        \getSmarty()->display('LoginView.tpl');
    }
}