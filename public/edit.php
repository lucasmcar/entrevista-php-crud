<?php
    
    $action = filter_input(INPUT_GET, 'action');
    $id = filter_input(INPUT_GET, 'id');

   if(!isset($action) && !isset($id)){
    header("location: ../index.php");
   }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Entrevista PHP</title>
</head>
<body>
    <nav class="navbar bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../public/index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../public/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2>Editar Usuário:</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="txtUserName">Nome:</label>
                <input type="text" name="userName" id="txtUserNameEdit" class="form-control" value="<?php echo $user['name']; ?>">
            </div>
            <input type="hidden" name="txtIdUserEdit" value="<?= $user['id']; ?>">
            <div class="form-group">
                <label for="txtUserEmail">Email:</label>
                <input type="text" name="userEmail" id="txtUserEmailEdit" class="form-control" value="<?php echo $user['email']; ?>">
            </div>
            <h6 class="mt-2 mb-2">Alterar cor:</h6>
            <?php  
            
            for($i = 0; $i < count($colors); $i++) { 
                $checked = "";
                if($userColors[$i]['color_id'] == $colors[$i]['id']){
                    $checked = "checked";
            ?>
                
                <div class="form-check">
                    <input class="form-check-input" <?= $checked; ?> name="colorsEdit[]" type="checkbox" value="<?php echo $colors[$i]['id']; ?>" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <?php echo $colors[$i]['name']; ?>
                    </label>
                </div>
            <?php  } else {  
                ?>
                <div class="form-check">
                    
                    <input class="form-check-input" <?= $checked; ?> name="colorsEdit[]" type="checkbox" value="<?php echo $colors[$i]['id']; ?>" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <?php echo $colors[$i]['name']; ?>
                    </label>
                </div>
            <?php } }?>

            <button class="btn btn-outline-primary" onclick="updateUser();">Salvar</button>
           
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./../public/js/functions.js"></script>
</body>
</html>