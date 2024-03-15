<!doctype html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="https://localhost/N2_CRUD/css/meucss.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    </head>

    <nav class="navbar navbar-dark bg-primary navbar-expand-sm fixed-top">

        <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="Navbar">

                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active "><a class="nav-link" href="https://localhost/N2_CRUD/visao/consulta.php">Buscar vaga por Id</a></li>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

<body class="jumbotron">

    <div class="container">

        <div class="row">

            <div class="col-4 col-sm-8">

                <h1>Cadastro de Vagas</h1>
                
                    <form method="post" action="../controle/controller_vagas.php">

                        <div class="form-group row">
                            <div class="col">
                                <label for="descricao" class="form-label">Descrição da vaga</label>
                                <input type="descricao" class="form-control" id="descricao" name="descricao">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col">
                                <label for="info" class="form-label">informações adicionais</label>
                                <input type="info" class="form-control" id="info" name="info">
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col">
                                <label for="email" class="form-label">E-mail para contato</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>

                        
                        <div class="form-group form-check-inline">
                            <div class="col">
                                <input type="submit" name="salvar" value="Salvar" class="btn btn-success">
                                <a href="../visao/consulta.php" class="btn btn-primary" role="button">Consultar</a>
                            </div>
                        </div>
                    </form>
            </div>

        </div>
    </div>

</body>

<footer class="footer navbar-fixed-bottom">
            <div class="row justify-content-center">

                <div class="col-auto ">

                    <p>© Copyright 2024</p>

                </div>

            </div>

        </div>

    </footer>
</html>