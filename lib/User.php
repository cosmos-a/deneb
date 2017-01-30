<?php
require 'UserData.php';
require 'UserUtils.php';

class User {
    private $userData;
    private $id;
    private $pw;
    private $email;

    public function __constructor($id) {
        $this->userData = new UserData($id);
        $this->id = $id;
    }
    
    public function login($pw) {
        $userData = $this->userData;
        if (UserUtils::has($this->id)) {
            if ($userData->isAvailable()) {
                if ($userData->getPassword() === $pw) {
                    $userData->set('ip', $_SERVER['REMOTE_ADDR']);
                    echo 'Login successful!#' . $userData->getUserCode();
                } else {
                    echo 'Error: The password is incorrect.';
                }
            } else {
                echo 'Error: This ID is not accepted.';
            }
        } else {
            echo 'Error: This ID is not signed up the server.';
        }
    }
    public function signUp($pw, $email) {
        $userData = $this->userData;
        if ($userData->has($this->id)) {
            echo 'Error: This ID is already used.';
        } else {
            $userData->set('available', false);
            $userData->set('since', date('Y.m.d H:i:s'));
            $userData->set('id', $this->id);
            $userData->set('password', $password);
            $userData->set('email', $email);
            $userData->set('user_code', md5($this->id . mt_rand(0, 99)));
            $userData->set('ip', $_SERVER['REMOTE_ADDR']);
            echo 'Success! You can use this ID after the permission of the admin.';
        }
    }
}
?>