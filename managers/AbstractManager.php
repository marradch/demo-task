<?php

namespace Managers;

use Database\DatabaseConnection;

abstract class AbstractManager
{
    protected $dbConnection;

    public function __construct()
    {
        $this->dbConnection = DatabaseConnection::createConnection();
    }
}