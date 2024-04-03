<?php

namespace Provaphp\ProvaPhpEntrevista\Dao;

use Provaphp\ProvaPhpEntrevista\Connection\Connection;

class ColorsDao
{

    private $con;

    public function __construct()
    {
        $this->con = new Connection();
    }

    public function insert()
    {
        $query = "INSERT INTO colors (name) VALUES (:name)";
    }

    public function select()
    {
        $query = "SELECT * FROM colors";
        $stmt = $this->con->getConnection()->query($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {

    }

   
}