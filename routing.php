<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('main'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('main', 'MainCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('loginuser', 'LoginCtrl');
Utils::addRoute('register', 'RegisterCtrl');
Utils::addRoute('registeruser', 'RegisterCtrl');
Utils::addRoute('profile', 'ProfileCtrl', ["user", "admin"]);
Utils::addRoute('lists', 'ListsCtrl', ["user", "admin"]);
Utils::addRoute('settings', 'SettingsCtrl', ["user", "admin"]);
Utils::addRoute('logout', 'LogoutCtrl', ["user", "admin"]);