<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\RoleUtils;
use core\Utils;
use core\Validator;

class LogoutCtrl {
    
    public function action_logout() {

        session_destroy();
        
        App::getRouter()->redirectTo("main");
        
    }
    
}
