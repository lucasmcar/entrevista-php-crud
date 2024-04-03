<?php

namespace Provaphp\ProvaPhpEntrevista\Repository;

use Provaphp\ProvaPhpEntrevista\Dao\UsersDao;

class UserRepository
{
    private $dao;

    public function  __construct()
    {
        $this->dao = new UsersDao();
    }

    public function create($name, $email)
    {
        return $this->dao->insert($name, $email);
    }

    public function getAll()
    {
        return $this->dao->select();
    }

    public function getOne($id)
    {
        return $this->dao->selectOne($id);
    }

    public function destroy($id)
    {
        return $this->dao->delete($id);
    }

    public function update($id, $name, $email)
    {
        return $this->dao->update($id, $name, $email);
    }
}