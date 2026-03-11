<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils; 

class MainPageCtrl {
    public function action_mainPage() {
        $stats = [];

        if (RoleUtils::inRole('lektor') || RoleUtils::inRole('admin')) {
            try {
                $stats['count_students'] = App::getDB()->count("kursant");
                
                $stats['count_courses'] = App::getDB()->count("kurs");
                
                $stats['last_enrolls'] = App::getDB()->count("zapis_na_kurs", [
                    "data_zapisu[>]" => date('Y-m-d', strtotime('-7 days'))
                ]);
            } catch (\Exception $e) {

            }
        }

        App::getSmarty()->assign('stats', $stats);
        App::getSmarty()->assign('page_title', 'English Hub - Strona Główna');
        App::getSmarty()->display('MainPageView.tpl');
    }
}