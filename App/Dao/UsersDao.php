<?php

namespace Provaphp\ProvaPhpEntrevista\Dao;

use Provaphp\ProvaPhpEntrevista\Connection\Connection;
use Provaphp\ProvaPhpEntrevista\Vo\UserVo;

class UsersDao
{

    private $con;

    public function __construct()
    {
        $this->con = new Connection();
    }

    public function insert($name, $email)
    {
        $query = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $stmt = $this->con->getConnection()->prepare($query);
        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        if($stmt->execute()){
            return $this->con->getConnection()->lastInsertId();
        }

    }

    public function selectOne($id)
    {
        $query = "SELECT id, name, email FROM users WHERE id = :id";
        $stmt = $this->con->getConnection()->query($query);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $user;
    }

    public function select()
    {
        $query = "SELECT * FROM users";
        $users = $this->con->getConnection()->query($query);
        return $users;
    }

    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $this->con->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($id)
    {
        $query = "UPDATE users SET name, email WHERE id = :id";
        $stmt = $this->con->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
}