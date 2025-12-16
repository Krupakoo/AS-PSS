<?php
require_once 'init.php';

getRouter()->setDefaultRoute('loginShow'); 
getRouter()->setLoginRoute('login'); 

getRouter()->addRoute('loginShow', 'LoginCtrl');
getRouter()->addRoute('login', 'LoginCtrl');
getRouter()->addRoute('logout', 'LoginCtrl');

getRouter()->addRoute('calcShow', 'CalcCtrl', ['user', 'admin']); 
getRouter()->addRoute('calcCompute', 'CalcCtrl', ['user', 'admin']); 
getRouter()->addRoute('calcHistory', 'CalcCtrl', ['user', 'admin']); 

getRouter()->go();