<?php

require_once '../auth.php';

class AuthController {

    public static function login($username, $password) {
        login($username, $password);
    }

    public static function logout() {
        logout();
    }
}

?>
