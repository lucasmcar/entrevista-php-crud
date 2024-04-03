<?php

namespace Provaphp\ProvaPhpEntrevista\Vo;

class ColorsVo
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function returnColorName()
    {
        return $this->name;
    }
}