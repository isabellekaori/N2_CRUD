<?php
class vagasDAO
{
    function inserir($descricao,$info,$email)
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=crud', "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare('INSERT INTO vagas (descricao, info, email) VALUES(:descricao, :info, :email)');
            $stmt->execute(array(
                ':descricao' => "$descricao", ':info' => "$info", ':email' => "$email"
            ));
            echo "<script>alert('Vaga cadastrada com sucesso!');
            window.location = '../visao/index.php';
            </script>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    function inserir2($descricao,$info,$email)
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=crud', "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $inserir = $pdo->prepare("INSERT INTO cliente (descricao, info, email) VALUES('$descricao', '$info',' $email')");
            $inserir->execute();

            echo "<script>alert('Vaga cadastrada com sucesso!');
            window.location = '../visao/index.php';
            </script>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function listar()
    {

        $pdo = new PDO('mysql:host=localhost;dbname=crud', "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = $pdo->query("SELECT idVaga,descricao, info, email FROM vagas");
        echo " <!doctype html>";
        echo "<html lang='pt-br'>";
        echo "<head>";
        echo " <meta charset='utf-8'>";
        echo " <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>";
        echo "<title>Clientes</title>";
        echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css'>";
        echo "</head>";
        echo "<body class='container'>";
        echo "<h2>Lista de clientes</h2>";
        echo "<table class='table table-striped mt-3'>";
        echo "<tr>
          <th>IdVaga</th>
          <th>Descricao</th>
          <th>Info</th>
          <th>Email</th>
          <th>Ações</th>
          </tr>";
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $linha['idVaga'] . "</td>";
            echo "<td>" . $linha['descricao'] . "</td>";
            echo "<td>" . $linha['info'] . "</td>";
            echo "<td>" . $linha['email'] . "</td>";

            echo "<td> <form method='post' action='../controle/controller_vagas.php'> "
                . "<input class='btn btn-outline-primary mr-3' type='submit' name='botao_editar' value='Editar'>"
                . "<input class='btn btn-outline-danger' type='submit' name='botao_excluir' value='Excluir'>"
                . " <input type='hidden' name='idVaga' value = '" . $linha['idVaga'] . "'/></form> </td>";
                echo "</tr>";
        }
        echo " </table>";
        echo "<form action='../controle/controller_vagas.php' method='POST'>";
        echo "<div class='form-group form-check-inline'>";
        echo "<div class='col'>";
        echo "<a href='../visao/consulta.php' class='btn btn-primary mr-3' role='button' aria-pressed='true'>Voltar</a>";
        echo "<a href='../visao/index.php' class='btn btn-success mr-3' role='button' aria-pressed='true'>Nova vaga</a>";
        echo "</div></div></form>";
        echo "</body></html>";
    }


    function buscarVaga($idVaga)
    {
        include_once("../visao/consulta.php");
        include_once("../modelo/vagas.php");

        $pdo  = new PDO("mysql:host=localhost;dbname=crud", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $consulta = $pdo->query("SELECT idVaga, descricao, info, email FROM vagas WHERE idVaga = '$idVaga'");
        $total_retornado = $consulta->rowCount();


        if ($total_retornado  === 0) {
            echo "<script>alert('Vaga não econtrada')</script>";
        } else {
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $vaga = new Vagas($linha['idVaga'], $linha['descricao'], $linha['info'], $linha['email']);

                echo "<table class='table table-striped mt-3'>";
                echo "<tr>
          <th>Id</th>
          <th>Descricao</th>
          <th>Info</th>
          <th>Email</th>
          <th>Ações</th>
          </tr>";
                echo "<tr>";
                echo "<td>" . $vaga->getIdVaga() . "</td>";
                echo "<td>" . $vaga ->getDescricao() . "</td>";
                echo "<td>" . $vaga ->getEmail() . "</td>";
                echo "<td>" . $vaga ->getInfo() . "</td>";
                echo "<td> <form method='post' action='../controle/controller_vagas.php'> "
                    . "<input class='btn btn-outline-primary mr-3' type='submit' name='botao_editar' value='Editar'>"
                    . "<input class='btn btn-outline-danger' type='submit' name='botao_excluir' value='Excluir'>"
                    . " <input type='hidden' name='idVaga' value = '" . $linha['idVaga'] . "'/></form> </td>";
                    echo " </table>";
            }
        }
    }

    
    function excluir($idVaga)
    {
        try {
            $pdo  = new PDO("mysql:host=localhost;dbname=crud", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $delete =  $pdo->prepare("DELETE FROM vagas WHERE idVaga = '$idVaga'");
            $delete->execute();

            echo "<script>alert('" .  $delete->rowCount() .
                " Vaga deletada com sucesso!');" .
                " window.location = '../visao/consulta.php';</script>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function Editar($idVaga) {
        try {
        $pdo  = new PDO("mysql:host=localhost;dbname=crud", "root", "");
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $consulta = $pdo->query("SELECT idVaga, descricao, info, email FROM vagas WHERE idVaga = '$idVaga'");
     
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
           session_start();
           include_once("../modelo/vagas.php");
           $vaga = new Vagas($linha['idVaga'], $linha['descricao'], $linha['email'],$linha['info']);
           $_SESSION['obj_vaga'] = serialize($vaga);
     header("location:../visao/editar.php");
         }
           } catch (PDOException $e) {
               echo 'Error: ' . $e->getMessage();
             } }
    

    function SalvarEdicao($idVaga,$descricao,$info,$email){
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=crud", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $editar = $pdo->query("UPDATE vagas SET descricao ='$descricao',info ='$info',email='$email' WHERE idVaga = '$idVaga'");
        $editar->execute();
        echo "<script>alert('Vaga alterada com sucesso!');</script>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
}
          
}
