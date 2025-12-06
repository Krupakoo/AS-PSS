<?php
require_once 'init.php';

getRouter()->addRouteEx('calcShow', 'app\\controllers', 'CalcCtrl', 'generateView', ['user','admin']);
getRouter()->addRouteEx('calcCompute', 'app\\controllers', 'CalcCtrl', 'process', ['user','admin']);
getRouter()->addRouteEx('login', 'app\\controllers', 'LoginCtrl', 'doLogin');
getRouter()->addRouteEx('logout', 'app\\controllers', 'LoginCtrl', 'doLogout', ['user','admin']);

getRouter()->setDefaultRoute('calcShow');
getRouter()->setLoginRoute('login');

getRouter()->go();