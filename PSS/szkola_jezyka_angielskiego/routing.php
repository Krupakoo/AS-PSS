<?php

use core\App;
use core\Utils;

 
Utils::addRoute('', 'CourseListCtrl', 'action_courseList');


Utils::addRoute('mainPage', 'MainPageCtrl');


Utils::addRoute('courseList', 'CourseListCtrl');


Utils::addRoute('courseEnroll', 'CourseListCtrl');


Utils::addRoute('mySchedule', 'CourseListCtrl');


Utils::addRoute('loginShow', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl');


Utils::addRoute('registerShow', 'RegisterCtrl');
Utils::addRoute('registerSave', 'RegisterCtrl');

Utils::addRoute('profileShow', 'ProfileCtrl');

Utils::addRoute('scheduleManage', 'ScheduleEditCtrl', ['lektor', 'admin']);
Utils::addRoute('scheduleSave',   'ScheduleEditCtrl', ['lektor', 'admin']);
Utils::addRoute('scheduleDelete', 'ScheduleEditCtrl', ['lektor', 'admin']);

\core\Utils::addRoute('myCourses', 'CourseListCtrl', ['kursant', 'admin', 'lektor']);


Utils::addRoute('enrollManage', 'AdminEnrollCtrl', ['admin']);
Utils::addRoute('enrollDelete', 'AdminEnrollCtrl', ['admin']);
Utils::addRoute('enrollAccept', 'AdminEnrollCtrl', ['admin']);


App::getRouter()->addRoute('addOpinion', 'CourseListCtrl');
App::getRouter()->addRoute('courseMaterials', 'CourseListCtrl');
Utils::addRoute('completedCourses', 'CourseListCtrl');

Utils::addRoute('messageList', 'MessageCtrl', ['kursant', 'lektor', 'admin']);
Utils::addRoute('messageNew',  'MessageCtrl', ['kursant', 'lektor', 'admin']);
Utils::addRoute('messageSend', 'MessageCtrl', ['kursant', 'lektor', 'admin']);


Utils::addRoute('myGrades', 'GradeCtrl', ['kursant', 'lektor', 'admin']);
Utils::addRoute('gradeAdd',  'GradeCtrl', ['lektor', 'admin']);
Utils::addRoute('gradeSave', 'GradeCtrl', ['lektor', 'admin']);


App::getRouter()->addRoute('courseEdit', 'CourseEditCtrl', ['admin']);
App::getRouter()->addRoute('courseSave', 'CourseEditCtrl', ['admin']);

Utils::addRoute('materialAdd', 'MaterialEditCtrl', ['lektor', 'admin']);
Utils::addRoute('materialSave', 'MaterialEditCtrl', ['lektor', 'admin']);

\core\App::getRouter()->addRoute('courseFinish', 'CourseListCtrl', ['kursant', 'admin']);
\core\App::getRouter()->addRoute('completedCourses', 'CourseListCtrl', ['kursant', 'admin']);

App::getRouter()->addRoute('courseOpinions', 'CourseListCtrl', ['lektor', 'admin']);
App::getRouter()->addRoute('opinionDelete', 'CourseListCtrl', ['admin']);