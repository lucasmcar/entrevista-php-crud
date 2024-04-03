<?php

namespace Provaphp\ProvaPhpEntrevista\Repository;

use Provaphp\ProvaPhpEntrevista\Dao\UserColorsDao;

class UserColorsRepository
{
    private $dao;

    public function __construct()
    {
        $this->dao = new UserColorsDao();
    }

    public function create($userId, $colorsId)
    {
        return $this->dao->insert($userId, $colorsId);
    }

    public function getAllById($id)
    {
        return $this->dao->selectAllById($id);
    }

    public function getUserColors($id)
    {
        return $this->dao->selectUserColors($id);
    }

    public function update($id, $id_color)
    {
        return $this->dao->update($id, $id_color);
    }
}