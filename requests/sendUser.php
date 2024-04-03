<?php

require '../vendor/autoload.php';

use Provaphp\ProvaPhpEntrevista\Repository\UserColorsRepository;
use Provaphp\ProvaPhpEntrevista\Repository\UserRepository;
use Provaphp\ProvaPhpEntrevista\Vo\UserVo;

$data = file_get_contents("php://input");

$user = json_decode($data, true);

if(!isset($user['nome']) || $user['nome'] == ""){
    exit();
}

if(!isset($user['email']) || $user['email'] == ""){
    exit();
}

$userVo = new UserVo($user['nome'], $user['email']);

$name = $userVo->returnUserName();
$email = $userVo->returnUserEmail();

$userRepo = new UserRepository();

$lastInsertId = $userRepo->create($name, $email);

$userColorsRepo = new UserColorsRepository();
foreach($user['colors[]'] as $key => $color){
    $userColorsRepo->create($lastInsertId, $color);
    
}