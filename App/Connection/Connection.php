<?php

namespace Provaphp\ProvaPhpEntrevista\Connection;

class Connection
{

    private $databaseFile;
    private $connection;


    public function __construct()
    {
        $this->databaseFile = realpath("../database/db.sqlite");
        $this->connect();

    }

    private function connect()
    {
        $this->connection = new \PDO("sqlite:{$this->databaseFile}");
        $this->connection->setAttribute(\PDO::ERRMODE_EXCEPTION, \PDO::ATTR_ERRMODE);
        return $this->connection; 
    }

    public function getConnection()
    {
        try {
            return $this->connection ?: $this->connection = $this->connect();
        } catch(\PDOException $ex) {
            echo $ex->getMessage();
        }
        
    }

    public function query($query)
    {
        $result      = $this->getConnection()->query($query);

        $result->setFetchMode(\PDO::FETCH_INTO, new \stdClass);

        return $result;
    }


}