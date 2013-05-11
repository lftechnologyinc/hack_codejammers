<?php
class session {

    public static function set($key, $val) {
        self::start();
        $_SESSION[$key] = $val;
    }

    public static function check($key) {
        self::start();
        if (isset($_SESSION[$key])) {
            return true;
        }

        return false;
    }

    public static function get($key) {
        self::start();

        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return false;
    }

    public static function delete($key) {
        self::start();
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public static function flush() {
        self::start();
        session_destroy();
    }

    public static function start() {
       // @session_start();
    }

}
