<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\ParamUtils;
use core\RoleUtils;
use core\Utils;
use core\Validator;

class StepsCtrl {
    public function action_addstep() {
        $task_id = ParamUtils::getFromCleanURL(1, true, "Błędny link");

        $listId = App::getDB()->select("tasks", "todo_id", [
            "id" => $task_id
        ])[0];

        $userId = App::getDB()->select("todos", "user_id", [
            "id" => $listId
        ])[0];

        if($userId !== $_SESSION["_todo_app_id"] && !RoleUtils::inRole("admin")) {
            App::getMessages()->addMessage(new \core\Message("Nie masz uprawnień do tego.", \core\Message::ERROR));
        } else {
            $id = App::getDB()->max("steps", "position", [
                "task_id" => $task_id
            ]);

            App::getDB()->insert("steps", [
                "task_id" => $task_id,
                "name" => "Nowy krok",
                "description" => "Opis nowego kroku",
                "position" => $id,
                "priority" => 0,
                "completion" => 0
            ]);

            $steps = App::getDB()->select("steps", "*", [
                "task_id", $task_id,
                "id" => App::getDB()->id()
            ]);

            echo json_encode($steps);
        }
    }
}