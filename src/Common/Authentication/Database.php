<?php

namespace Common\Authentication;

class Database {
	private $username;
	private $password;

    public function __construct($username, $password) {
		$this->username = $username;
		$this->password = $password;
    }

    public function authenticate() {
        //users 'admin', 'george'
        //password is 'a'

        try {
            $conn = new \PDO("mysql:host=localhost;dbname=mydb", 'mike', 'a');
            // set the PDO error mode to exception
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT username FROM users WHERE username = '$this->username' AND password = '$this->password'"); 
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!empty($result)) {
                return "You have successfully logged into the 'mydb' database!"; 
            } else {
                return "Invalid credentials for 'mydb' database!"; 
            }
        }
        catch(PDOException $e){
            return "Connection to 'mydb' failed: " . $e->getMessage();
        }
    }
}
