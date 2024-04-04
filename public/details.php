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
            <a class="navbar-brand" href="../index.php">Home</a>
        </div>
    </nav>
    <div class="container">

    <h3 class="mt-2 mb-2">Detalhes</h3>
    <p>Nome: <?= !empty($uColors[0]['user_name']) ? $uColors[0]['user_name']: $userData['name']; ?></p>
    <p>Email: <?= !empty($uColors[0]['email']) ? $uColors[0]['email'] : $userData['name'] ; ?></p>

    <h4>Cores vinculadas</h4>
    
    <ul class="list-group">
        <?php if(!empty($uColors[0])) {  ?>
            <?php foreach($uColors as $key => $value) { ?>
                <li class="list-group-item" style="color: <?= $value['color_name'];?>;"><?= $value['color_name'];?></li>
            <?php }}  else {?>
                <div class="alert alert-warning">Não há cores vinculadas para este usuário!</div>    
            <?php } ?>
    </ul>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
'<script src="js/functions.js"></script>
</body>
</html>