<?php

namespace Common\Authentication;

class InMemory {
	private $username;
	private $password;

    public function __construct($username, $password) {
		$this->username = $username;
		$this->password = $password;
    }

    public function authenticate() {
        //users 'admin', 'bob', 'george'
        //password is 'a'

        $users = array("admin", "bob", "george");
        if ($this->username !== '' && in_array($this->username, $users)) {
            if ($this->password !== '' && $this->password == 'a') {
                return 'Login successful.  Welcome ' . $this->username.PHP_EOL;
            }
        }
        
        return 'Invalid credentials'.PHP_EOL;
    }
}
