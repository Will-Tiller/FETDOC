<?php

include_once('Backend/conexao.php');
include_once('Backend/Profile.php');
$profile = new Profile($conexao);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sistema Secretaria FET</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styleperfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha384-ez0wmMyiM8ip9Q4zpoxH4Tsd83e7UFegjRr8RbF9w3jvCWsDxmBAKc83d4tQQZWO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="logo.png" width="30" height="30" class="d-inline-block align-top">
                    <span>Sistema da Secretaria da FET</span>
                </a>
            </div>
        </nav>
    </header>

    <div class="sidebar">
        <h3><a href="index1.php">FET</a></h3>
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

    <div class="content" style="max-height: 800px; overflow-y: auto;">

        <section style="background-color: #eee;">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="assets/avatar2.png" style="width: 150px;">
                                <?php

                                $profile->dados();

                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                
                                <?php $profile->actualizardados(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form action="Backend/adicionarprofile.php" method="post">
                        <div class="form-group">
                            <label for="nome">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="cargo">Cargo</label>
                            <input type="text" class="form-control" name="cargo" id="cargo"
                                placeholder="Cargo a ocupar">
                        </div>
                        <div class="form-group">
                            <label for="nivel">Nivel</label>
                            <select class="form-control" id="nivel" name="nivel">
                                <option value="Pedido">Normal</option>
                                <option value="Aviso">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha"
                                placeholder="Senha Administrativa">
                        </div>

                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </form>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>

            </div>
        </div>
    </div>


    <script src="assets/app.js"></script>
    <!-- Adicionando os scripts necessários do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-s0Qsh5Zl5zgSLA5SjKrSnRv6FPaMCqUz3x2JMY/TwF5i3g5VWQfiBbFRTt8+9Ot3"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WygBSVBUoZZi5cuWfzI8ez4g1igFMXfUCj"
        crossorigin="anonymous"></script>


</body>

</html>