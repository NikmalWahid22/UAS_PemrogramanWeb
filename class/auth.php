<?php
class Auth {
    public static function login($username,$password) {
        $db = new Database();
        $user = $db->fetch("SELECT * FROM users WHERE username='$username'");
        if ($user && password_verify($password,$user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }

    public static function check() {
        return isset($_SESSION['user']);
    }

    public static function role() {
        return $_SESSION['user']['role'] ?? null;
    }

    public static function logout() {
        session_destroy();
    }
}
