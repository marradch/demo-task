<?php

namespace Database;

use Config\MainConfig;

class DatabaseConnection
{
    private $connection;
    private static $connectionObj;

    private function __construct($connection)
    {
        $this->connection = $connection;
    }

    public static function createConnection()
    {
        if (!isset(self::$connectionObj)) {
            $config = MainConfig::CONFIG['database'];

            $conn = new \mysqli($config['host'], $config['user'], $config['password'], $config['database']);

            if ($conn->connect_error) {
                throw new Exception("Connection failed");
            }

            self::$connectionObj = new DatabaseConnection($conn);
        }

        return self::$connectionObj;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}