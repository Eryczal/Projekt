<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('main'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('main', 'MainCtrl');

Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('loginuser', 'LoginCtrl');
Utils::addRoute('logout', 'LogoutCtrl', ["user", "admin"]);

Utils::addRoute('register', 'RegisterCtrl');
Utils::addRoute('registeruser', 'RegisterCtrl');

Utils::addRoute('profile', 'ProfileCtrl', ["user", "admin"]);

Utils::addRoute('settings', 'SettingsCtrl', ["user", "admin"]);
Utils::addRoute('deleteaccount', 'SettingsCtrl', ["user", "admin"]);

Utils::addRoute('adminpanel', 'AdminCtrl', ["admin"]);
Utils::addRoute('deleteuser', 'AdminCtrl', ["admin"]);
Utils::addRoute('changerole', 'AdminCtrl', ["admin"]);

Utils::addRoute('lists', 'ListsCtrl', ["user", "admin"]);
Utils::addRoute('list', 'ListsCtrl', ["user", "admin"]);
Utils::addRoute('addlist', 'ListsCtrl', ["user", "admin"]);
Utils::addRoute('movelist', 'ListsCtrl', ["user", "admin"]);
Utils::addRoute('deletelist', 'ListsCtrl', ["user", "admin"]);
Utils::addRoute('renamelist', 'ListsCtrl', ["user", "admin"]);
Utils::addRoute('redescriptionlist', 'ListsCtrl', ["user", "admin"]);
Utils::addRoute('reprioritizelist', 'ListsCtrl', ["user", "admin"]);

Utils::addRoute('addtask', 'TasksCtrl', ["user", "admin"]);
Utils::addRoute('movetask', 'TasksCtrl', ["user", "admin"]);
Utils::addRoute('deletetask', 'TasksCtrl', ["user", "admin"]);
Utils::addRoute('renametask', 'TasksCtrl', ["user", "admin"]);
Utils::addRoute('redescriptiontask', 'TasksCtrl', ["user", "admin"]);
Utils::addRoute('reprioritizetask', 'TasksCtrl', ["user", "admin"]);

Utils::addRoute('addstep', 'StepsCtrl', ["user", "admin"]);
Utils::addRoute('movestep', 'StepsCtrl', ["user", "admin"]);
Utils::addRoute('deletestep', 'StepsCtrl', ["user", "admin"]);
Utils::addRoute('renamestep', 'StepsCtrl', ["user", "admin"]);
Utils::addRoute('redescriptionstep', 'StepsCtrl', ["user", "admin"]);
Utils::addRoute('reprioritizestep', 'StepsCtrl', ["user", "admin"]);
Utils::addRoute('completestep', 'StepsCtrl', ["user", "admin"]);