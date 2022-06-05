<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\ParamUtils;
use core\RoleUtils;
use core\Utils;
use core\Validator;

class SettingsCtrl {
    public function action_settings() {
        
        if(RoleUtils::inRole("user")) {
            $r = "Użytkownik";
        } elseif(RoleUtils::inRole("admin")) {
            $r = "Administrator";
        }
        App::getSmarty()->assign("role", $r);
        App::getSmarty()->display("Settings.tpl");

    }

    public function action_deleteaccount() {
        $user_id = $_SESSION["_todo_app_id"];

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

        session_destroy();
        
        App::getRouter()->redirectTo("main");

        return 1;
    }
}