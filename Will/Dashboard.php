<?php

include_once('Backend/conexao.php');
include_once('Backend/Filemanager.php');
$file = new Filemanager($conexao);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sistema Secretaria FET</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/style.css">
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

    <h1>Dashboard</h1>
    
    <div class="row">
  
      <div class="col-md-3">
        <div class="card bg-primary text-white">
          <div class="card-body">
          <h2><?php echo $file->gettotal(); ?></h2>
            <p>Total de Arquivos</p>
          </div>
        </div>
      </div>
  
      <div class="col-md-3">
        <div class="card bg-success  text-white">
          <div class="card-body">
          <h2><?php echo $file->getreguralized(); ?></h2> 
            <p>Arquivos Regularizados</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card bg-warning  text-white">
          <div class="card-body">
            <h2><?php echo $file->getnotreguralized(); ?></h2> 
            <p>Arquivos Pendentes</p>
          </div>
        </div>
      </div>
  
    </div><br>
  
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Documentos por Tipo
          </div>
          <div class="card-body">
            <canvas id="myChart"></canvas>
          </div>
        </div>
      </div>
  
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            Últimos Documentos
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Doc 1234 - Lorem</li>
              <li class="list-group-item">Doc 4567 - Ipsum</li>
            </ul>
          </div>  
        </div>    
      </div>
  
    </div>
    
  </div>

  <script src="assets/app.js"></script>

</body>
</html>