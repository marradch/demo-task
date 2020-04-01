<?php

namespace Models;

use Database\DatabaseConnection;

abstract class AbstractModel
{
    protected $dbConnection;

    public function __construct()
    {
        $this->dbConnection = DatabaseConnection::createConnection();
    }
}