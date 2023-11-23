<?php

include_once('Backend/conexao.php');
include_once('Backend/Filemanager.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Sistema Secretaria FET</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/styleacompanhar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-ez0wmMyiM8ip9Q4zpoxH4Tsd83e7UFegjRr8RbF9w3jvCWsDxmBAKc83d4tQQZWO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="logo.png" width="30" height="30" class="d-inline-block align-top" />
                    <span>Sistema da Secretaria da FET</span>
                </a>
            </div>
        </nav>
    </header>

    <div class="sidebar">
        <h3><a href="index.html">FET</a></h3>
        <ul>
            <li>
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li>
            <li>
                <a href="">Tramitação </a>
            </li>
            <ul>
                <li><a href="acompanhar.php">Acompanhar Progresso</a></li>
                <li><a href="registrar.php">Registrar Arquivo</a></li>
            </ul>
            </li>
            <li>
                <a href="arquivos.php">Arquivos</a>
            </li>
            <li>
                <a href="estatistica.php">Estatísticas </a>
            </li>
            <li>
                <a href="perfil.php">
                    <img src="user.png" width="20" />
                    Meu Perfil
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <img src="logout.png" width="20" />
                    Sair
                </a>
            </li>
        </ul>
    </div>

    <div class="content">

        <h1>Acompanhar Progresso dos Arquivos</h1>

        <div class="row">

            <div class="col-6">

                <div class="card">
                    <div class="card-body">
                        <div class="input-group mb-3 col-md-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="search-icon"><i class="fas fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Pesquisar arquivos"
                                aria-describedby="search-icon">
                        </div>

                        <div class="file table-responsive" style="max-height: 500px; overflow-y: auto;">

                            <?php


                            $file = new Filemanager($conexao); // Passar a conexão do banco de dados
                            $file->getArquivos();

                            ?>


                        </div>
                    </div>
                </div>

            </div>

            <div class="col-6">

                <div class="card">
                    <div class="card-body " style="max-height: 500px; overflow-y: auto;">

                        <h3>Selecione Um Arquivo</h3>

                        <div class="file">
                            

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <script src="assets/app.js"></script>
</body>

</html>