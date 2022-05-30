<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\RoleUtils;
use core\Utils;

class ProfileCtrl {
    
    public function action_profile() {

        if(RoleUtils::inRole("user")) {
            $r = "Użytkownik";
        } elseif(RoleUtils::inRole("admin")) {
            $r = "Administrator";
        }
        App::getSmarty()->assign("role", $r);
        App::getSmarty()->assign("nick", $_SESSION["_todo_app_nick"]);
        App::getSmarty()->display("Profile.tpl");
        
    }
    
}
