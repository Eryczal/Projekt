<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\ParamUtils;
use core\RoleUtils;
use core\Utils;
use core\Validator;

class TasksCtrl {

    public function action_addtask() {
        $todo_id = ParamUtils::getFromCleanURL(1, true, "Błedny link");

        $task = App::getDB()->select("todos", "*", [
            "id" => $todo_id
        ]);

        if($task[0]["user_id"] !== $_SESSION["_todo_app_id"] && !RoleUtils::inRole("admin")) {
            App::getMessages()->addMessage(new \core\Message("Nie masz uprawnień do tego.", \core\Message::ERROR));
        } else {
            $id = App::getDB()->max("tasks", "position", [
                "todo_id" => $todo_id
            ]);
    
            App::getDB()->insert("tasks", [
                "todo_id" => $todo_id,
                "name" => "Nowe zadanie",
                "description" => "Opis nowego zadania",
                "position" => empty($id) ? 1 : $id + 1,
                "priority" => 0
            ]);
    
            $task = App::getDB()->select("tasks", "*", [
                "todo_id" => $todo_id,
                "id" => App::getDB()->id()
            ]);
    
            echo json_encode($task);
        }
    }

    public function action_renametask() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");
        $value = ParamUtils::getFromPost("value", true, "Błąd");
        
        $userId = $_SESSION["_todo_app_id"];

        $todoId = App::getDB()->select("tasks", "todo_id", [
            "id" => $id
        ])[0];

        $userFromList = App::getDB()->select("todos", "user_id", [
            "id" => $todoId
        ])[0];

        if($userFromList != $userId) {
            echo 0;
            return;
        }

        App::getDB()->update("tasks", [
            "name" => $value
        ], [
            "id" => $id
        ]);

        echo 1;
    }

    public function action_redescriptiontask() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");
        $value = ParamUtils::getFromPost("value", true, "Błąd");

        $userId = $_SESSION["_todo_app_id"];

        $todoId = App::getDB()->select("tasks", "todo_id", [
            "id" => $id
        ])[0];

        $userFromList = App::getDB()->select("todos", "user_id", [
            "id" => $todoId
        ])[0];

        if($userFromList != $userId) {
            echo 0;
            return;
        }
        App::getDB()->update("tasks", [
            "description" => $value
        ], [
            "id" => $id
        ]);

        echo 1;
    }

    public function action_reprioritizetask() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");

        $v = new Validator();

        $value = $v->validateFromPost("value", [
            'int' => true,
            'min' => 0
        ]);

        if($v->isLastOk()) {
            $userId = $_SESSION["_todo_app_id"];

            $listId = App::getDB()->select("tasks", "todo_id", [
                "id" => $id
            ])[0];

            $uid = App::getDB()->select("todos", "user_id", [
                "id" => $listId
            ])[0];

            if($userId != $uid) {
                echo 0;
                return;
            }
    
            App::getDB()->update("tasks", [
                "priority" => $value
            ], [
                "id" => $id
            ]);
    
            echo 1;
        } else {
            echo 0;
        }
    }
    
    public function action_deletetask() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");

        $listId = App::getDB()->select("tasks", "todo_id", [
            "id" => $id
        ])[0];

        $uid = App::getDB()->select("todos", "user_id", [
            "id" => $listId
        ])[0];

        if(RoleUtils::inRole("admin") || $uid == $_SESSION["_todo_app_id"]) {
            App::getDB()->delete("steps", [
                "task_id" => $id
            ]);

            App::getDB()->delete("tasks", [
                "id" => $id
            ]);

            $tasks = App::getDB()->select("tasks", "*", [
                "todo_id" => $listId,
    
                "ORDER" => [
                    "position" => "ASC"
                ]
            ]);
    
            $i = 1;
            foreach($tasks as $task) {
                App::getDB()->update("tasks", [
                    "position" => $i
                ], [
                    "id" => $task["id"]
                ]);
    
                $i++;
            }

            echo 1;
        } else {
            echo 0;
        }
    }

    public function action_movetask() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");

        $newPos = ParamUtils::getFromPost("newPos", true, "Błąd");
        $oldPos = ParamUtils::getFromPost("oldPos", true, "Błąd");

        $userId = $_SESSION["_todo_app_id"];

        $listId = App::getDB()->select("tasks", "todo_id", [
            "id" => $id
        ])[0];

        $userFromList = App::getDB()->select("todos", "user_id", [
            "id" => $listId
        ])[0];

        if($userFromList != $userId) {
            echo 0;
            return;
        }

        if($oldPos < $newPos) {
            App::getDB()->update("tasks", [
                "position[-]" => 1
            ], [
                "todo_id" => $listId,
                "position[>]" => $oldPos,
                "position[<=]" => $newPos
            ]);
        } elseif($oldPos > $newPos) {
            App::getDB()->update("tasks", [
                "position[+]" => 1
            ], [
                "todo_id" => $listId,
                "position[<]" => $oldPos,
                "position[>=]" => $newPos
            ]);
        }
            
        App::getDB()->update("tasks", [
            "position" => $newPos
        ], [
            "id" => $id
        ]);

        echo 1;
    }
}