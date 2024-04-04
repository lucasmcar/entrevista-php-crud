<?php

namespace Provaphp\ProvaPhpEntrevista\Dao;

use Provaphp\ProvaPhpEntrevista\Connection\Connection;

class UserColorsDao
{

    private $con;

    public function __construct()
    {
        $this->con = new Connection();
    }

    public function insert($userId, $colorId)
    {
        $query = "INSERT INTO user_colors (user_id, color_id) VALUES (:user_id, :color_id)";
        $stmt = $this->con->getConnection()->prepare($query);
        $stmt->bindParam(':user_id', $userId, \PDO::PARAM_INT);
        $stmt->bindParam(':color_id', $colorId, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function selectAllById($id) 
    {
        $query = "SELECT user_id, color_id FROM user_colors
        WHERE user_id = :id";
        $stmt = $this->con->getConnection()->query($query);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $colors = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $colors;
    }

    public function delete($id)
    {
        $query = "DELETE FROM user_colors WHERE user_id = :id";
        $stmt = $this->con->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function selectUserColors($id)
    {
        $query = "select u.name as user_name, u.email, uc.color_id, c.name as color_name from user_colors uc
        inner JOIN users u on uc.user_id = u.id 
        inner join colors c on uc.color_id = c.id
        where uc.user_id = :id";
        $stmt = $this->con->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $userColors = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $userColors;
    }

    public function update($id, $id_color)
    {
        $query = "UPDATE user_colors SET color_id = :id_color  WHERE user_id = :user_id";
        $stmt = $this->con->getConnection()->prepare($query);
        $stmt->bindParam(':user_id', $id, \PDO::PARAM_INT);
        $stmt->bindParam(':id_color', $id_color, \PDO::PARAM_INT);
        return $stmt->execute();
    }
}