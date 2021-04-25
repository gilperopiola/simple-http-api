<?php

include_once "dbhandler.php";

class UsersManager {

    public $db;
    public $error;

    function UsersManager(){
        $this->db = new DBHandler();
    }

    function Insert($username, $password, $gender, $age, $hair_color) {
    	$conn = $this->db->Connect();
        $last_id = 0;

        $name = addslashes($name);

    	$conn->query("INSERT INTO test.users
    					(username, password, gender, age, hair_color) VALUES
    					('$username', '$password', '$gender', '$age', '$hair_color')");

        if ($conn->error) {
            var_dump($conn->error);
        }

        $this->error = $conn->error;
        if (!$this->error) {
            $last_id = $conn->insert_id;
        }
        
        $conn->close();

        return $last_id;
    }

    function Search($string){
        $conn = $this->db->Connect();

        $string = strtolower($string);

        $result = $conn->query("SELECT * FROM test.users WHERE 
                                username LIKE '%$string%' 
                                ORDER BY id DESC");

        $conn->close();

        $array = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }

        return $array;
    }
}