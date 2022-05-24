<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\Validator;

class RegisterCtrl {
    
    public function action_register() {

        App::getSmarty()->display("Register.tpl");
        
    }

    public function action_registeruser() {

        if(isset($_POST["login"])) {
            $v = new Validator();
            $login = $v->validateFromPost("login", [
                'trim' => true,
                'required' => true,
                'required_message' => "Login jest wymagany do rejestracji.",
                'min_length' => 4,
                'max_length' => 64,
                'validator_message' => "Dane są niepoprawne."
            ]);
            if($v->isLastOk()) {
                $pass = $v->validateFromPost("pass", [
                    'required' => true,
                    'required_message' => "Hasło jest wymagane do rejestracji.",
                    'min_length' => 8,
                    'max_length' => 128,
                    'validator_message' => "Dane są niepoprawne."
                ]);
                if($v->isLastOk()) {
                    $conf = $v->validateFromPost("conf", [
                        'required' => true,
                        'required_message' => "Hasło należy potwórzyć.",
                        'min_length' => 8,
                        'max_length' => 128,
                        'validator_message' => "Dane są niepoprawne."
                    ]);
                    if($v->isLastOk()) {
                        if($pass == $conf) {
                            App::getDB()->insert("users", [
                                "login" => $login,
                                "pass" => password_hash($pass, PASSWORD_DEFAULT),
                                "role" => 0
                            ]);
                            App::getMessages()->addMessage(new \core\Message("Poprawnie stworzono użytkownika.", \core\Message::INFO));
                        } else {
                            App::getMessages()->addMessage(new \core\Message("Podane hasła nie są takie same.", \core\Message::ERROR));
                        }
                    }
                }
            }
        }

        App::getSmarty()->display("Register.tpl");

    }
    
}
