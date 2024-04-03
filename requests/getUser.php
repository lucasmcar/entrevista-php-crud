<?php

require '../vendor/autoload.php';

use Provaphp\ProvaPhpEntrevista\Repository\ColorsRepository;
use Provaphp\ProvaPhpEntrevista\Repository\UserColorsRepository;
use Provaphp\ProvaPhpEntrevista\Repository\UserRepository;


$colorRepo = new ColorsRepository();
$colors = $colorRepo->getAll();

$action = filter_input(INPUT_GET, 'action');
$id = filter_input(INPUT_GET, 'id');


if($action == 'delete'){
    $repo = new UserRepository();
    $repo->destroy($id);
    header('location: ../public/index.php');
}

if($action == 'edit'){
    $repo = new UserRepository();
    $userColorsRepo = new UserColorsRepository();
    $user = $repo->getOne($id);
    $userColors = $userColorsRepo->getAllById($id);
    require '../public/edit.php';
    exit;
}

if($action == 'details')
    $userColorsRepo = new UserColorsRepository();
    $uColors = $userColorsRepo->getUserColors($id);
    require '../public/details.php';
    exit;
?>

