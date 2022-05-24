<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\RoleUtils;
use core\Utils;
use core\Validator;

class LoginCtrl {
    
    public function action_login() {

        App::getSmarty()->display("Login.tpl");
        
    }

    public function action_loginuser() {

        if(isset($_POST["login"])) {
            $v = new Validator();
            $login = $v->validateFromPost("login", [
                'trim' => true,
                'required' => true,
                'required_message' => "Login jest wymagany do zalogowania.",
                'min_length' => 4,
                'max_length' => 64,
                'validator_message' => "Dane są niepoprawne."
            ]);
            if($v->isLastOk()) {
                $pass = $v->validateFromPost("pass", [
                    'required' => true,
                    'required_message' => "Hasło jest wymagane do zalogowania.",
                    'min_length' => 8,
                    'max_length' => 128,
                    'validator_message' => "Dane są niepoprawne."
                ]);
                if($v->isLastOk()) {
                    $record = App::getDB()->select("users", "*", [
                        "login" => $login
                    ]);
                    if(password_verify($pass, $record[0]["pass"])) {
                        switch($record[0]["role"]) {
                            case 0:
                                $role = "user";
                                break;

                            case 1:
                                $role = "admin";
                                break;

                            default:
                                $role = "user";
                                break;
                        }
                        $_SESSION["_todo_app_nick"] = $record[0]["login"];
                        RoleUtils::addRole($role);
                        App::getRouter()->redirectTo("profile");
                    } else {
                        App::getMessages()->addMessage(new \core\Message("Dane są niepoprawne.", \core\Message::ERROR));
                    }
                }
            }
        }

        App::getSmarty()->display("Login.tpl");
        
    }
    
}
