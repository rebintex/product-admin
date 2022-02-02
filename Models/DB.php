<?php

class DB
{
    private static PDO $db;

    public static function get(): PDO
    {
        if (isset(self::$db)) {
            return self::$db;
        }

        try {
            self::$db = new PDO("mysql:host=localhost;dbname=product_admin", 'root', '');
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$db;
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
}