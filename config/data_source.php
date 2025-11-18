<?php
class DataSource {
    private static $connection = null;
    private static $host = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $database = "pdcDb";

    public static function connect() {

        if(!isset(self::$connection) || self::$connection == null) {
            self::$connection = new mysqli(self::$host, self::$username, self::$password, self::$database);

            if(self::$connection->connect_error) {
                die('Error de conexión: '. self::$connection->connect_error);
            }
        }

        return self::$connection;
    }
}