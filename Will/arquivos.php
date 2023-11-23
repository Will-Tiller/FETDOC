<?php

include_once('Backend/conexao.php');
include_once('Backend/Filemanager.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sistema Secretaria FET - Arquivos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/stylearquivo.css" />
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
    <h3><a href="index.php">FET</a></h3>
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
    <h1>Arquivos Disponíveis</h1><br>

    <div class="doc-types">

      <div class="row">

        <div class="col">
          <i class="fas fa-folder"></i>
        </div>

        <div class="col">
          <i class="fas fa-folder"></i>
        </div>

        <div class="col">
          <i class="fas fa-folder"></i>
        </div>

        <div class="col">
          <i class="fas fa-folder"></i>
        </div>

        <div class="col">
          <i class="fas fa-folder"></i>
        </div>

        <div class="col">
          <i class="fas fa-folder"></i>
        </div>

      </div>

      <div class="row">

        <div class="col">
          <a href="">Memorandos</a>
        </div>

        <div class="col">
          <a href="">Ofícios</a>
        </div>

        <div class="col">
          <a href="">Processos Acadêmicos</a>
        </div>

        <div class="col">
          <a href="">Contratos e convênios</a>
        </div>

        <div class="col">
          <a href="">Editais</a>
        </div>

        <div class="col">
          <a href="">Actas</a>
        </div>

      </div>

    </div>

    <br><br>

    <div class="doc-types">

      <div class="row">

        <div class="col">
          <i class="fas fa-folder"></i>
        </div>

        <div class="col">
          <i class="fas fa-folder"></i>
        </div>

        <div class="col">
          <i class="fas fa-folder"></i>
        </div>

        <div class="col">
          <i class="fas fa-folder"></i>
        </div>

        <div class="col">
          <i class="fas fa-folder"></i>
        </div>

        <div class="col">
          <i class="fas fa-folder"></i>
        </div>

      </div>

      <div class="row">

        <div class="col">
          <a href="">Relatórios</a>
        </div>

        <div class="col">
          <a href="">Requerimentos e declarações</a>
        </div>

        <div class="col">
          <a href="">Documentos de RH</a>
        </div>

        <div class="col">
          <a href="">Notas fiscais e facturas</a>
        </div>

        <div class="col">
          <a href="">Correspondências diversa</a>
        </div>

        <div class="col">
          <a href="">Todos</a>
        </div>

      </div>

    </div>

    <br><br>

    <div class="input-group mb-3 col-md-6">
      <div class="input-group-prepend">
        <span class="input-group-text" id="search-icon"><i class="fas fa-search"></i></span>
      </div>
      <input type="text" class="form-control" placeholder="Pesquisar arquivos" aria-describedby="search-icon">
    </div>

    <?php


    $file = new Filemanager($conexao); // Passar a conexão do banco de dados
    $file->getTotalArquivos();

    ?>
  </div>


  <script src="assets/app.js"></script>
</body>

</html>