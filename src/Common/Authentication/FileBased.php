<?php

namespace Common\Authentication;

class FileBased {
	private $username;
	private $password;

    public function __construct($username, $password) {
		$this->username = $username;
		$this->password = $password;
    }

    public function authenticate() {
        //user 'admin'
        //password is 'a'

        $creds = fopen("../src/Common/File/credentials.txt", "r") or die("Unable to open file!");
        if ($this->username !== '' && $this->username == fgets($creds)) {
            if ($this->password !== '' && $this->password == 'a') {
                fclose($creds);
                return 'Login successful.  Welcome ' . $this->username.PHP_EOL;
            }
        }
        
        fclose($creds);
        return 'Invalid credentials'.PHP_EOL;
    }
}
