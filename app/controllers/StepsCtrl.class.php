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
                "position" => empty($id) ? 1 : $id + 1,
                "priority" => 0,
                "completion" => 0
            ]);

            $steps = App::getDB()->select("steps", "*", [
                "task_id" => $task_id,
                "id" => App::getDB()->id()
            ]);

            echo json_encode($steps);
        }
    }

    public function action_deletestep() {
        $step_id = ParamUtils::getFromPost("id", true, "Błąd");

        $taskId = App::getDB()->select("steps", "task_id", [
            "id" => $step_id
        ])[0];

        $todoId = App::getDB()->select("tasks", "todo_id", [
            "id" => $taskId
        ])[0];

        $userId = App::getDB()->select("todos", "user_id", [
            "id" => $todoId
        ])[0];

        if($userId !== $_SESSION["_todo_app_id"]) {
            echo 0;
            return;
        }

        App::getDB()->delete("steps", [
            "id" => $step_id
        ]);

        $steps = App::getDB()->select("steps", "*", [
            "task_id" => $taskId,

            "ORDER" => [
                "position" => "ASC"
            ]
        ]);

        $i = 1;
        foreach($steps as $step) {
            App::getDB()->update("steps", [
                "position" => $i
            ], [
                "id" => $step["id"]
            ]);

            $i++;
        }

        echo 1;
    }

    public function action_renamestep() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");
        $value = ParamUtils::getFromPost("value", true, "Błąd");
        
        $taskId = App::getDB()->select("steps", "task_id", [
            "id" => $id
        ])[0];

        $todoId = App::getDB()->select("tasks", "todo_id", [
            "id" => $taskId
        ])[0];

        $userId = App::getDB()->select("todos", "user_id", [
            "id" => $todoId
        ])[0];

        if($userId !== $_SESSION["_todo_app_id"]) {
            echo 0;
            return;
        }

        App::getDB()->update("steps", [
            "name" => $value
        ], [
            "id" => $id
        ]);

        echo 1;
    }

    public function action_redescriptionstep() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");
        $value = ParamUtils::getFromPost("value", true, "Błąd");
        
        $taskId = App::getDB()->select("steps", "task_id", [
            "id" => $id
        ])[0];

        $todoId = App::getDB()->select("tasks", "todo_id", [
            "id" => $taskId
        ])[0];

        $userId = App::getDB()->select("todos", "user_id", [
            "id" => $todoId
        ])[0];

        if($userId !== $_SESSION["_todo_app_id"]) {
            echo 0;
            return;
        }

        App::getDB()->update("steps", [
            "description" => $value
        ], [
            "id" => $id
        ]);

        echo 1;
    }

    public function action_reprioritizestep() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");

        $v = new Validator();

        $value = $v->validateFromPost("value", [
            'int' => true,
            'min' => 0
        ]);

        if($v->isLastOk()) {
            $taskId = App::getDB()->select("steps", "task_id", [
                "id" => $id
            ])[0];

            $todoId = App::getDB()->select("tasks", "todo_id", [
                "id" => $taskId
            ])[0];

            $userId = App::getDB()->select("todos", "user_id", [
                "id" => $todoId
            ])[0];

            if($userId !== $_SESSION["_todo_app_id"]) {
                echo 0;
                return;
            }
    
            App::getDB()->update("steps", [
                "priority" => $value
            ], [
                "id" => $id
            ]);
    
            echo 1;
        } else {
            echo 0;
        }
    }

    public function action_completestep() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");

        $v = new Validator();

        $value = $v->validateFromPost("value", [
            'int' => true,
            'min' => 0,
            'max' => 1
        ]);

        if($v->isLastOk()) {
            $taskId = App::getDB()->select("steps", "task_id", [
                "id" => $id
            ])[0];

            $todoId = App::getDB()->select("tasks", "todo_id", [
                "id" => $taskId
            ])[0];

            $userId = App::getDB()->select("todos", "user_id", [
                "id" => $todoId
            ])[0];

            if($userId !== $_SESSION["_todo_app_id"]) {
                echo 0;
                return;
            }
    
            App::getDB()->update("steps", [
                "completion" => $value
            ], [
                "id" => $id
            ]);
    
            echo 1;
        } else {
            echo 0;
        }
    }

    public function action_movestep() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");

        $newPos = ParamUtils::getFromPost("newPos", true, "Błąd");
        $oldPos = ParamUtils::getFromPost("oldPos", true, "Błąd");

        $taskId = App::getDB()->select("steps", "task_id", [
            "id" => $id
        ])[0];

        $todoId = App::getDB()->select("tasks", "todo_id", [
            "id" => $taskId
        ])[0];

        $userId = App::getDB()->select("todos", "user_id", [
            "id" => $todoId
        ])[0];

        if($userId !== $_SESSION["_todo_app_id"]) {
            echo 0;
            return;
        }

        if($oldPos < $newPos) {
            App::getDB()->update("steps", [
                "position[-]" => 1
            ], [
                "task_id" => $taskId,
                "position[>]" => $oldPos,
                "position[<=]" => $newPos
            ]);
        } elseif($oldPos > $newPos) {
            App::getDB()->update("steps", [
                "position[+]" => 1
            ], [
                "task_id" => $taskId,
                "position[<]" => $oldPos,
                "position[>=]" => $newPos
            ]);
        }
            
        App::getDB()->update("steps", [
            "position" => $newPos
        ], [
            "id" => $id
        ]);

        echo 1;
    }
}