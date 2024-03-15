<!doctype html>

<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/meucss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    <title>Bootstrap</title>

</head>

<body>
    <?php
        include_once("../modelo/vagas.php");
        session_start();
        $idVaga = unserialize($_SESSION['obj_vaga'])->getIdVaga();
        $descricao = unserialize($_SESSION['obj_vaga'])->getDescricao();
        $info = unserialize($_SESSION['obj_vaga'])->getInfo();
        $email = unserialize($_SESSION['obj_vaga'])->getEmail();
    ?>
    <div id="container">

        <form method="post" action="../controle/controller_vagas.php">
            <div class="form-group">
                <div class="col-12 col-sm-6">
                    <label for="descricao" class="form-label">Descricao</label>
                    <input type="descricao" class="form-control" id="descricao" name="descricao" value="<?php echo $descricao?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-12 col-sm-6">
                    <label for="info" class="form-label">Info</label>
                    <input type="info" class="form-control" id="info" name="info" value="<?php echo $info?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-12 col-sm-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-12">
                    <input type='hidden' name='idVaga' value="<?php echo $idVaga?>" />
                    <input type="submit" name="salvar_alteracao" value="Salvar Alteração" class="btn btn-success mr-2">
                    <input type='submit' name='bt_listar' value='Listar todos' class='btn btn-primary'>
                    <a href='../visao/index.php' class='btn btn-warning mr-2' role='button'>Home Page</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>