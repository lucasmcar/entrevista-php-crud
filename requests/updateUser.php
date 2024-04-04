<?php 

require '../vendor/autoload.php';

use Provaphp\ProvaPhpEntrevista\Repository\ColorsRepository;
use Provaphp\ProvaPhpEntrevista\Repository\UserColorsRepository;
use Provaphp\ProvaPhpEntrevista\Repository\UserRepository;


$data = file_get_contents("php://input");

$user = json_decode($data, true);

var_dump($user);

$name = $user['nome'];
$email = $user['email'];
$id = $user['id'];


$userRepo = new UserRepository();

$userRepo->update($id, $name, $email);

$userColorsRepo = new UserColorsRepository();
foreach($user['ckValues'] as $key => $color){
    $userColorsRepo->update($color);
    
}
