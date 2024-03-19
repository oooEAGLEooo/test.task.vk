<?php

function getUsers($connect) {
    $users = mysqli_query($connect,"SELECT * FROM `User`");

    $usersList = [];

    while ($user = mysqli_fetch_assoc($users)) {
        $usersList[] = $user;
    }

    echo json_encode($usersList);
}

function getUser($connect, $id) {
    $user = mysqli_query($connect,"SELECT * FROM `User` WHERE `id` = '$id'");

    if (mysqli_num_rows($user) === 0) {
        http_response_code(404);
        $res = [
            "status"=> "false",
            "message"=> "User not found"
        ];

        echo json_encode($res);
    } else {
        $user = mysqli_fetch_assoc($user);
        echo json_encode($user);
    }
}

function addUser($connect, $data) {
    $name = $data['name'];
    $balance = $data['balance'];

    mysqli_query($connect,"INSERT INTO `User` (`id`, `name`, `balance`) VALUES (NULL, '$name', '$balance')");

    http_response_code(201);

    $res = [
        "status"=> "true",
        "user_id"=> mysqli_insert_id($connect)
    ];

    echo json_encode($res);
}

function addQuest($connect, $data) {
    $name = $data['name'];
    $cost = $data['cost'];

    mysqli_query($connect,"INSERT INTO `Quest` (`id`, `name`, `cost`) VALUES (NULL, '$name', '$cost') ");

    http_response_code(201);

    $res = [
        "status"=> "true",
        "quest_id"=> mysqli_insert_id($connect)
    ];

    echo json_encode($res);
}

function getUserInfo($connect, $id) {
    $userBalance = mysqli_query($connect,"SELECT `balance` FROM `User` WHERE `id` = '$id'");
    $userHistorys = mysqli_query($connect,"SELECT `Quest`.`name` FROM `Quest` JOIN `UserQuest` ON `Quest`.id=`UserQuest`.`quest_id` WHERE `UserQuest`.`user_id` = '$id'");

    if (mysqli_num_rows($userBalance) === 0) {
        http_response_code(404);
        $res = [
            "status"=> "false",
            "message"=> "User not found"
        ];

        echo json_encode($res);
    } else {
        $userBalance = mysqli_fetch_assoc($userBalance);
        $userHistoryList = [];
        while ($userHistory = mysqli_fetch_assoc($userHistorys)) {
            $userHistoryList['quests'][] = $userHistory;
        }
        $userHistoryList['balance'] = $userBalance;
        echo json_encode($userHistoryList);
    }
}

function done($connect, $data) {
    $user_id = $data['user_id'];
    $quest_id = $data['quest_id'];
    
    $user = mysqli_query($connect,"SELECT * FROM `User` WHERE `id` = '$user_id'");
    $quest = mysqli_query($connect,"SELECT * FROM `quest` WHERE `id` = '$quest_id'");

    if ((mysqli_num_rows($user) === 0) or (mysqli_num_rows($quest) === 0)) {
        http_response_code(404);
        $res = [
            "status"=> "false",
            "message"=> "User or quest not found"
        ];

        echo json_encode($res);
    } else {

        $userBalance = mysqli_query($connect,"SELECT `balance` FROM `User` WHERE `id` = '$user_id'");
        $questCost = mysqli_query($connect,"SELECT `cost` FROM `Quest` WHERE `id` = '$quest_id'");
        $userBalance = mysqli_fetch_assoc($userBalance);
        $questCost = mysqli_fetch_assoc($questCost);

        $newBalance = $userBalance['balance'] + $questCost['cost'];

        mysqli_query($connect,"INSERT INTO `UserQuest` (`id`, `user_id`, `quest_id`) VALUES (NULL, '$user_id', '$quest_id') ");
        mysqli_query($connect,"UPDATE `User` SET `balance`='$newBalance' WHERE id ='$user_id'");

        http_response_code(201);

        $res = [
            "status"=> "true",
            "user_quest_id"=> mysqli_insert_id($connect)
        ];

        echo json_encode($res);
    }   
}
