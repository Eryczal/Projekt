<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\ParamUtils;
use core\RoleUtils;
use core\Utils;
use core\Validator;

class ListsCtrl {
    
    public function action_lists() {
        $v = new Validator();
        
        $page = $v->validateFromCleanURL(1, [
            'int' => true
        ]);

        if(empty($page)) {
            $page = 1;
        }

        $offset = ($page - 1) * 15;

        $listnum = App::getDB()->count("todos", [
            "user_id" => $_SESSION["_todo_app_id"]
        ]);

        $lists = App::getDB()->select("todos", "*", [
            "user_id" => $_SESSION["_todo_app_id"],
            "LIMIT" => [$offset, 15]
        ]);

        if(RoleUtils::inRole("user")) {
            $r = "Użytkownik";
        } elseif(RoleUtils::inRole("admin")) {
            $r = "Administrator";
        }

        usort($lists, function($a, $b) {
            return $a["position"] <=> $b["position"];
        });
        App::getSmarty()->assign("role", $r);
        App::getSmarty()->assign("lists", $lists);
        App::getSmarty()->assign("listnum", $listnum);
        App::getSmarty()->display("Lists.tpl");
    }

    public function action_list() {
        $list_id = ParamUtils::getFromCleanURL(1,true,"Błędny link");

        $list = App::getDB()->select("todos", "*", [
            "id" => $list_id
        ]);

        if(empty($list)) {
            App::getMessages()->addMessage(new \core\Message("Nie masz uprawnień do przeglądania tej listy.", \core\Message::ERROR));
            $list = "error";
        } else if($list[0]["user_id"] !== $_SESSION["_todo_app_id"] && !RoleUtils::inRole("admin")) {
            App::getMessages()->addMessage(new \core\Message("Nie masz uprawnień do przeglądania tej listy.", \core\Message::ERROR));
            $list = "error";
        } else {
            $tasks = App::getDB()->select("tasks", "*", [
                "todo_id" => $list_id
            ]);
                
            usort($tasks, function($a, $b) {
                return $a["position"] <=> $b["position"];
            });
            
            $steps = [];
            foreach($tasks as $key=>$task) {
                $task_id = $task["id"];
                
                $steps[$key] = App::getDB()->select("steps", "*", [
                    "task_id" => $task_id
                ]);
                
                usort($steps[$key], function($a, $b) {
                    return $a["position"] <=> $b["position"];
                });
            }
            
            App::getSmarty()->assign("tasks", $tasks);
            App::getSmarty()->assign("steps", $steps);
        }

        if(RoleUtils::inRole("user")) {
            $r = "Użytkownik";
        } elseif(RoleUtils::inRole("admin")) {
            $r = "Administrator";
        }

        App::getSmarty()->assign("list", $list);
        App::getSmarty()->assign("role", $r);
        App::getSmarty()->display("List.tpl");
    }

    public function action_addlist() {
        $id = App::getDB()->max("todos", "position", [
            "user_id" => $_SESSION["_todo_app_id"]
        ]);

        App::getDB()->insert("todos", [
            "user_id" => $_SESSION["_todo_app_id"],
            "name" => "Nowa lista",
            "description" => "Opis nowej listy",
            "position" => empty($id) ? 1 : $id + 1,
            "priority" => 0
        ]);

        $list = App::getDB()->select("todos", "*", [
            "user_id" => $_SESSION["_todo_app_id"],
            "id" => App::getDB()->id()
        ]);

        echo json_encode($list);
    }

    public function action_deletelist() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");
        
        $uid = App::getDB()->select("todos", "user_id", [
            "id" => $id
        ])[0];

        if(RoleUtils::inRole("admin") || $uid == $_SESSION["_todo_app_id"]) {
            $tasks = App::getDB()->select("tasks", "id", [
                "todo_id" => $id
            ]);

            foreach($tasks as $task) {
                App::getDB()->delete("steps", [
                    "task_id" => $task
                ]);
            }

            App::getDB()->delete("tasks", [
                "todo_id" => $id
            ]);

            App::getDB()->delete("todos", [
                "id" => $id
            ]);

            $todos = App::getDB()->select("todos", "*", [
                "user_id" => $uid,
    
                "ORDER" => [
                    "position" => "ASC"
                ]
            ]);
    
            $i = 1;
            foreach($todos as $todo) {
                App::getDB()->update("todos", [
                    "position" => $i
                ], [
                    "id" => $todo["id"]
                ]);
    
                $i++;
            }

            echo 1;
        } else {
            echo 0;
        }
    }

    public function action_movelist() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");

        $newPos = ParamUtils::getFromPost("newPos", true, "Błąd");
        $oldPos = ParamUtils::getFromPost("oldPos", true, "Błąd");

        $userId = $_SESSION["_todo_app_id"];

        if($oldPos < $newPos) {
            App::getDB()->update("todos", [
                "position[-]" => 1
            ], [
                "user_id" => $userId,
                "position[>]" => $oldPos,
                "position[<=]" => $newPos
            ]);
        } elseif($oldPos > $newPos) {
            App::getDB()->update("todos", [
                "position[+]" => 1
            ], [
                "user_id" => $userId,
                "position[<]" => $oldPos,
                "position[>=]" => $newPos
            ]);
        }
            
        App::getDB()->update("todos", [
            "position" => $newPos
        ], [
            "user_id" => $userId,
            "id" => $id
        ]);

        echo 1;
    }

    public function action_renamelist() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");
        $value = ParamUtils::getFromPost("value", true, "Błąd");

        $userId = $_SESSION["_todo_app_id"];

        App::getDB()->update("todos", [
            "name" => $value
        ], [
            "id" => $id,
            "user_id" => $userId
        ]);

        echo 1;
    }

    public function action_redescriptionlist() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");
        $value = ParamUtils::getFromPost("value", true, "Błąd");

        $userId = $_SESSION["_todo_app_id"];

        App::getDB()->update("todos", [
            "description" => $value
        ], [
            "id" => $id,
            "user_id" => $userId
        ]);

        echo 1;
    }

    public function action_reprioritizelist() {
        $id = ParamUtils::getFromPost("id", true, "Błąd");

        $v = new Validator();

        $value = $v->validateFromPost("value", [
            'int' => true,
            'min' => 0
        ]);

        if($v->isLastOk()) {
            $userId = $_SESSION["_todo_app_id"];

            App::getDB()->update("todos", [
                "priority" => $value
            ], [
                "id" => $id,
                "user_id" => $userId
            ]);

            echo 1; 
        } else {
            echo 0;
        }
    }
}