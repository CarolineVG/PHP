<?php

class Database {
    private static $conn;

    public static function connection() {
        if(!defined('__ROOT__')){
            define('__ROOT__', dirname(dirname(__FILE__)));
        }
        if( self::$conn == null ){
            // make new connection
            self::$conn = new PDO("mysql:host=localhost; dbname=io", "root", "");
            return self::$conn;
        } else {
            // return existing connection
            return self::$conn;
        }
    }
}
