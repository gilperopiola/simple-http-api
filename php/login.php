<?php

// includes & init
error_reporting(E_ERROR | E_PARSE);
include_once('../data/vars.php');
include_once('./classes/users.php');

$data = json_decode(file_get_contents('php://input'), true);

$username = $data["username"];
$password = $data["password"];

// data validation
if ($username == '' || $password == '') {
    header("HTTP/1.1 400 Bad Request");
    die('{}');
}

// search user
$usersManager = new UsersManager();
$usersFound = $usersManager->Search($username);

foreach ($usersFound as $user) {
    if ($user['username'] == $username && $user['password'] == $password) {
        die('{"id": ' . $user['id'] . '}');
    }
}

// failure to find user
header("HTTP/1.1 400 Bad Request");
die('{}');

?>