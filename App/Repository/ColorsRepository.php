<?php

namespace Provaphp\ProvaPhpEntrevista\Repository;

use Provaphp\ProvaPhpEntrevista\Dao\ColorsDao;
use Provaphp\ProvaPhpEntrevista\Vo\ColorsVo;

class ColorsRepository
{
    private $dao;

    public function  __construct()
    {
        $this->dao = new ColorsDao();
    }

    public function create(ColorsVo $user)
    {
        return $this->dao->insert($user);
    }

    public function getAll()
    {
        return $this->dao->select();
    }

    /*public function getOne($id)
    {
        return $this->dao->selectOne($id);
    }*/

    public function destroy($id)
    {
        return $this->dao->delete($id);
    }

}