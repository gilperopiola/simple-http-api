<?php

if (file_exists('data/vars.php')) {
  include_once('data/vars.php');
}

if (file_exists('../../data/vars.php')) {
  include_once('../../data/vars.php');
}

class DBHandler {
	public function Connect(){
		global $data;

        $servername = $data["db_servername"];
        $username = $data["db_username"];
        $password = $data["db_password"];
        $database = $data["db_name"];

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error)
            die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);

        return $conn;
    }
}
?>