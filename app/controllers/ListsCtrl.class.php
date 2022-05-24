<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\RoleUtils;
use core\Utils;

class ListsCtrl {
    
    public function action_lists() {
        
        $lists = App::getDB()->select("todos", "*", [ //todo
            "login" => $login
        ]);
        if(RoleUtils::inRole("user")) {
            $r = "Użytkownik";
        } elseif(RoleUtils::inRole("admin")) {
            $r = "Administrator";
        }
        App::getSmarty()->assign("rola", $r);
        App::getSmarty()->display("Lists.tpl");
        
    }
    
}
