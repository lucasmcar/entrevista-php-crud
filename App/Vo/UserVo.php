<?php

namespace Provaphp\ProvaPhpEntrevista\Vo;

use Provaphp\ProvaPhpEntrevista\Vo\ColorsVo;

class UserVo
{
    private $user;
    private $email;

    public function __construct($user, $email)
    {
        $this->user = $user;
        $this->email = $email;        
    }

    public function returnUserName()
    {
        return $this->user;
    }

    public function returnUserEmail()
    {
        return $this->email;
    }

}