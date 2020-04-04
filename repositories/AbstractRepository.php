<?php

namespace Repositories;

use Database\DatabaseConnection;

abstract class AbstractRepository
{
    protected $dbConnection;

    public function __construct()
    {
        $this->dbConnection = DatabaseConnection::createConnection();
    }
}