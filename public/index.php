<?php
require '../vendor/autoload.php';

use Provaphp\ProvaPhpEntrevista\Repository\ColorsRepository;
use Provaphp\ProvaPhpEntrevista\Repository\UserRepository;

$userRepo = new UserRepository();
$colorRepo = new ColorsRepository();

$users  = $userRepo->getAll();
$colors = $colorRepo->getAll();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Entrevista PHP</title>
</head>
<body>
    <nav class="navbar bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo realpath('../index.php'); ?>">Home</a>
        </div>
    </nav>
    <!-- Button trigger modal -->
    <div class="container mt-2 mb-2">
    
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newUser">
            Novo Usuário
        </button>
    </div>
    <hr>
    <!-- Modal -->
    <div class="modal fade" id="newUser" tabindex="-1" aria-labelledby="label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="label">Novo Usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success" hidden id="msg"></div>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="txtUserName">Nome:</label>
                            <input type="text" name="userName" id="txtUserName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="txtUserEmail">Email:</label>
                            <input type="text" name="userEmail" id="txtUserEmail" class="form-control">
                        </div>
                        <h6 class="mt-2 mb-2">Vincular Cores</h6>

                        <?php 
                            foreach($colors as $color) {
                        ?>
                            <div class="form-check">
                                <input class="form-check-input" name="colors[]" type="checkbox" value="<?php echo $color['id'] ?>" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <?php echo $color['name']; ?>
                                </label>
                            </div>
                        <?php } ?>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button id="btnSave" type="submit" onclick="return saveUser();" class="btn btn-outline-primary mt-2" >Cadastrar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <h2 class=" mt-3 mb-2">Lista de usuários</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user){ ?>
                    <tr>
                    <th scope="row"><?php echo $user['id']; ?></th>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
            
                        <a class="btn btn-outline-success" href="../requests/getUser.php?action=details&id=<?= $user['id'];?>">
                            <span class="material-symbols-outlined">
                                visibility
                            </span>
                        </a> |
                        <a class="btn btn-outline-warning" href="../requests/getUser.php?action=edit&id=<?= $user['id'];?>">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                        </a> | 
                        <a class="btn btn-outline-danger" href="../requests/getUser.php?action=delete&id=<?= $user['id'];?>">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </a> 
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table> 
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="js/functions.js"></script>
<script>

</script>
</body>
</html>