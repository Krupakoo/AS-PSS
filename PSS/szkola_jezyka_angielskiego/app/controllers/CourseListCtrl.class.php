<?php
namespace app\controllers;

use core\App;
use core\Utils;
use core\SessionUtils;
use core\ParamUtils;

class CourseListCtrl {

    private $schedule;
    private $courses;
    private $opinions;

    public function action_courseList() {
        $id_user = SessionUtils::load('user_id', true);
        $search_name = ParamUtils::getFromRequest('sf_nazwa');
        $where = [];

        if ($id_user) {
            try {
                $user_course_ids = App::getDB()->select("zapis_na_kurs", "kurs_id", [
                    "kursant_id" => $id_user
                ]);
                if (!empty($user_course_ids)) {
                    $where["id_kursu[!]"] = $user_course_ids;
                }
            } catch (\Exception $e) { }
        }

        if (isset($search_name) && strlen($search_name) > 0) {
            $where['nazwa[~]'] = $search_name;
        }

        $this->courses = App::getDB()->select("kurs", ["id_kursu", "nazwa"], $where);

        App::getSmarty()->assign('search_name', $search_name);
        App::getSmarty()->assign('courses', $this->courses);
        App::getSmarty()->display('CourseList.tpl');
    }

    public function action_myCourses() {
        $id_user = SessionUtils::load('user_id', true);
        $role = SessionUtils::load('role', true);

        if ($id_user) {
            try {
                if ($role == 'kursant') {
                    $sql = "SELECT k.id_kursu, k.nazwa, z.id_zapisu, z.status 
                            FROM kurs k
                            JOIN zapis_na_kurs z ON k.id_kursu = z.kurs_id
                            WHERE z.kursant_id = :id_user AND z.status = 'aktywny'";
                    $this->courses = App::getDB()->query($sql, [":id_user" => $id_user])->fetchAll(\PDO::FETCH_ASSOC);
                } 
                else if ($role == 'lektor') {
                    $sql = "SELECT id_kursu, nazwa, 'prowadzący' as status 
                            FROM kurs 
                            WHERE lektor_id = :id_user";
                    $this->courses = App::getDB()->query($sql, [":id_user" => $id_user])->fetchAll(\PDO::FETCH_ASSOC);
                } 
                else if ($role == 'admin') {
                    $sql = "SELECT id_kursu, nazwa, 'system' as status FROM kurs";
                    $this->courses = App::getDB()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
                }

                App::getSmarty()->assign('courses', $this->courses);
            } catch (\Exception $e) {
                Utils::addErrorMessage("Błąd podczas pobierania kursów: " . $e->getMessage());
            }
        }

        App::getSmarty()->display('MyCoursesView.tpl');
    }

    public function action_materialSave() {
        $id_kursu = ParamUtils::getFromRequest('id_kursu');
        $tytul = ParamUtils::getFromRequest('tytul');
        $opis = ParamUtils::getFromRequest('opis');
        $url = ParamUtils::getFromRequest('url_pliku');

        if ($id_kursu && $tytul && $url) {
            try {
                App::getDB()->insert("material_edukacyjny", [
                    "kurs_id" => $id_kursu,
                    "tytul" => $tytul,    
                    "opis" => $opis,
                    "url_pliku" => $url,   
                    "typ_materialu" => "link",
                    "data_dodania" => date("Y-m-d H:i:s")
                ]);
                Utils::addInfoMessage("Materiał został pomyślnie dodany.");
            } catch (\Exception $e) {
                Utils::addErrorMessage("Błąd podczas zapisu: " . $e->getMessage());
            }
        } else {
            Utils::addErrorMessage("Wypełnij wymagane pola (tytuł i link).");
        }
        App::getRouter()->forwardTo('myCourses');
    }

    public function action_completedCourses() {
        $id_user = SessionUtils::load('user_id', true);
        if (!$id_user) { 
            App::getRouter()->forwardTo('loginShow'); 
            return; 
        }

        try {
            $sql = "SELECT k.id_kursu, k.nazwa, znk.status 
                    FROM zapis_na_kurs znk
                    JOIN kurs k ON znk.kurs_id = k.id_kursu 
                    WHERE znk.kursant_id = :id AND znk.status = 'zakończony'";
            
            $this->courses = App::getDB()->query($sql, [":id" => $id_user])->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            Utils::addErrorMessage("Błąd bazy danych: " . $e->getMessage());
            $this->courses = [];
        }

        App::getSmarty()->assign('courses', $this->courses);
        App::getSmarty()->display('CompletedCoursesView.tpl');
    }

    public function action_addOpinion() {
        $id_user = SessionUtils::load('user_id', true);
        $id_kursu = ParamUtils::getFromRequest('id_kursu');
        $tresc = ParamUtils::getFromRequest('tresc_opinii');

        if ($id_user && $id_kursu && strlen($tresc) > 5) {
            App::getDB()->insert("opinia_kursu", [
                "kursant_id" => $id_user,
                "kurs_id" => $id_kursu,
                "tresc_opinii" => $tresc,
                "data_utworzenia" => date("Y-m-d H:i:s")
            ]);
            Utils::addInfoMessage("Opinia została zapisana.");
        }
        App::getRouter()->forwardTo('completedCourses');
    }

    public function action_courseMaterials() {
        $id_kursu = ParamUtils::getFromCleanURL(1);
        $materials = App::getDB()->select("material_edukacyjny", "*", ["kurs_id" => $id_kursu]);
        $course_info = App::getDB()->get("kurs", ["nazwa"], ["id_kursu" => $id_kursu]);

        App::getSmarty()->assign('materials', $materials);
        App::getSmarty()->assign('course_info', $course_info);
        App::getSmarty()->display('MaterialsView.tpl');
    }

    public function action_mySchedule() {
        $user_id = SessionUtils::load('user_id', true);
        if (!$user_id) { App::getRouter()->forwardTo('loginShow'); return; }

        $sql = "SELECT k.nazwa, z.data_czas, z.temat, z.link_do_spotkania, z.tryb, z.miejsce, u.imie, u.nazwisko 
                FROM zajecia z
                JOIN kurs k ON z.kurs_id = k.id_kursu 
                JOIN zapis_na_kurs znk ON z.kurs_id = znk.kurs_id 
                JOIN uzytkownik u ON z.lektor_id = u.id_uzytkownika 
                WHERE znk.kursant_id = :id_user 
                ORDER BY z.data_czas ASC";

        $this->schedule = App::getDB()->query($sql, ["id_user" => $user_id])->fetchAll(\PDO::FETCH_ASSOC);
        App::getSmarty()->assign('schedule', $this->schedule);
        App::getSmarty()->display('MyScheduleView.tpl');
    }

    public function action_courseEnroll() {
        $id_user = SessionUtils::load('user_id', true);
        $id_kurs = ParamUtils::getFromCleanURL(1);
        if ($id_user && $id_kurs) {
            App::getDB()->insert("zapis_na_kurs", [
                "kursant_id"  => $id_user,
                "kurs_id"     => $id_kurs,
                "tryb"        => "online",
                "status"      => "aktywny",
                "data_zapisu" => date("Y-m-d H:i:s")
            ]);
        }
        App::getRouter()->forwardTo('courseList');
    }

    public function action_courseFinish() {
        $id_user = SessionUtils::load('user_id', true);
        $id_zapisu = ParamUtils::getFromCleanURL(1);

        if ($id_zapisu) {
            try {
                App::getDB()->update("zapis_na_kurs", [
                    "status" => "zakończony"
                ], [
                    "AND" => [
                        "id_zapisu" => $id_zapisu,
                        "kursant_id" => $id_user
                    ]
                ]);

                Utils::addInfoMessage("Kurs został pomyślnie zakończony.");
            } catch (\Exception $e) {
                Utils::addErrorMessage("Wystąpił błąd: " . $e->getMessage());
            }
        } else {
            Utils::addErrorMessage("Niepoprawny numer zapisu.");
        }

        App::getRouter()->forwardTo("myCourses");
    }

    public function action_courseOpinions() {
        $id_kursu = ParamUtils::getFromCleanURL(1);
        
        if ($id_kursu) {
            try {
                $sql = "SELECT o.id_opinii, o.tresc_opinii, o.data_utworzenia, u.imie, u.nazwisko 
                        FROM opinia_kursu o
                        JOIN uzytkownik u ON o.kursant_id = u.id_uzytkownika
                        WHERE o.kurs_id = :id_kursu
                        ORDER BY o.data_utworzenia DESC";

                $this->opinions = App::getDB()->query($sql, [":id_kursu" => $id_kursu])->fetchAll(\PDO::FETCH_ASSOC);

                $sql_info = "SELECT nazwa, id_kursu FROM kurs WHERE id_kursu = :id";
                $course_info = App::getDB()->query($sql_info, [":id" => $id_kursu])->fetch(\PDO::FETCH_ASSOC);

                App::getSmarty()->assign('opinions', $this->opinions);
                App::getSmarty()->assign('course_info', $course_info);
            } catch (\Exception $e) {
                Utils::addErrorMessage("Błąd bazy danych: " . $e->getMessage());
            }
        }

        App::getSmarty()->display('CourseOpinionsView.tpl');
    }

    public function action_opinionDelete() {
        if (SessionUtils::load('role', true) != 'admin') {
            Utils::addErrorMessage("Brak uprawnień.");
            App::getRouter()->forwardTo('myCourses');
            return;
        }

        $id_opinii = ParamUtils::getFromCleanURL(1);
        $id_kursu = ParamUtils::getFromCleanURL(2);

        if ($id_opinii) {
            try {
                App::getDB()->delete("opinia_kursu", ["id_opinii" => $id_opinii]);
                Utils::addInfoMessage("Opinia została usunięta.");
            } catch (\Exception $e) {
                Utils::addErrorMessage("Błąd podczas usuwania.");
            }
        }
        App::getRouter()->forwardTo('courseOpinions/' . $id_kursu);
    }
}