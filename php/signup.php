<?php

// includes & init
error_reporting(E_ERROR | E_PARSE);

include_once('../data/vars.php');
include_once('./classes/users.php');

$data = json_decode(file_get_contents('php://input'), true);

$username = $data["username"];
$password = $data["password"];
$gender = $data["gender"];
$age = $data["age"];
$hair_color = $data["hair_color"];

// data validation
if ($username == '' || $password == '' || $gender == '' || $age == '' || $hair_color == '') {
    header("HTTP/1.1 400 Bad Request");
    die('{}');
}

// insert user into db
$usersManager = new UsersManager();
$id = $usersManager->Insert($username, $password, $gender, $age, $hair_color);

// return id
die('{"id": '.$id.'}');

?>