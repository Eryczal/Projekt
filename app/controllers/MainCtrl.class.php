<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

class MainCtrl {
    
    public function action_main() {

        App::getSmarty()->display("Main.tpl");
        
    }
    
}
