<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\ParamUtils;
use core\RoleUtils;
use core\Utils;
use core\Validator;

class AdminCtrl {
    public function action_adminpanel() {
        if(!RoleUtils::inRole("admin")) {
            App::getRouter()->redirectTo("/main");
            return;
        }

        $v = new Validator();
        
        $page = $v->validateFromCleanURL(1, [
            'int' => true
        ]);

        if(empty($page)) {
            $page = 1;
        }

        $offset = ($page - 1) * 15;

        $usernum = App::getDB()->count("users");

        $users = App::getDB()->select("users", "*", [
            "LIMIT" => [$offset, 15]
        ]);

        App::getSmarty()->assign("role", "Administrator");
        App::getSmarty()->assign("users", $users);
        App::getSmarty()->assign("usernum", $usernum);
        App::getSmarty()->display("AdminPanel.tpl");
    }

    
    public function action_deleteuser() {
        if(!RoleUtils::inRole("admin")) {
            App::getRouter()->redirectTo("/main");
            return;
        }

        $user_id = ParamUtils::getFromPost("id", true, "Błedny link");

        $todos = App::getDB()->select("todos", "id", [
            "user_id" => $user_id
        ]);

        foreach($todos as $todoId) {
            $tasks = App::getDB()->select("tasks", "id", [
                "todo_id" => $todoId
            ]);

            foreach($tasks as $taskId) {
                App::getDB()->delete("steps", [
                    "task_id" => $taskId
                ]);
            }

            App::getDB()->delete("tasks", [
                "todo_id" => $todoId
            ]);
        }

        App::getDB()->delete("todos", [
            "user_id" => $user_id
        ]);

        App::getDB()->delete("users", [
            "id" => $user_id
        ]);

        echo 1;
    }

    public function action_changerole() {
        if(!RoleUtils::inRole("admin")) {
            App::getRouter()->redirectTo("/main");
            return;
        }

        $user_id = ParamUtils::getFromPost("id", true, "Błedny link");

        $v = new Validator();

        $role = $v->validateFromPost("role", [
            "int" => true,
            "min" => 0,
            "max" => 1
        ]);

        App::getDB()->update("users", [
            "role" => $role
        ], [
            "id" => $user_id
        ]);

        echo 1;
    }
}