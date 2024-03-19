<?php

header('Content-type: json/application');

require 'connect.php';
require 'functions.php';

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params =  explode('/', $q);

$type = $params[0];
$id = $params[1];

$method = 'POST';

switch ($method) {
    case 'GET': {
        switch ($type) {
            //получение списка пользователей
            case 'users': {
                if (isset($id)) {
                    //конкретный пользователь
                    getUser($connect, $id);
                } else {
                    //все пользователи
                    getUsers($connect);
                }
            }

            //получение списка выполненных заданий и баланса конкретного пользователя
            case 'user': {
                if (isset($id)) {
                    getUserInfo($connect, $id);
                }
            }
            
        }
    }

    case 'POST': {
        switch ($type) {
            //создание пользователя
            case 'users': {
                addUser($connect, $_POST);
            }

            //создание задания
            case 'quest': {
                addQuest($connect, $_POST);
            }

            //пользователь выполнил задание
            case 'done': {
                done($connect, $_POST);
            }
            
        } 
    }
}
