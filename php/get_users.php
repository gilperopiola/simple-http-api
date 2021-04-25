<?php

// includes & init
error_reporting(E_ERROR | E_PARSE);

include_once('../data/vars.php');
include_once('./classes/users.php');

$id = $_GET["id"];
$username = $_GET["username"];

// data validation
if ($id == '') {
    header("HTTP/1.1 400 Bad Request");
    die('{}');
}

// search user
$usersManager = new UsersManager();
$users = $usersManager->Search($username);

// return json
echo json_encode($users);

?>