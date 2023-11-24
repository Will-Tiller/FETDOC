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

  <div class="content" style="max-height: 850px; overflow-y: auto;">

    <div class="jumbotron">
      <h1>Estatísticas</h1>
      <p>Visão geral de documentos, entradas e status</p>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Documentos por Mês</h5>
            <canvas id="docs-per-month"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Documentos por Status</h5>

            <h2>
              <?php echo $file->getnotreguralized(); ?>
            </h2>
            <p>Arquivos Em Processamento</p>

            <h2>
              <?php echo $file->getreguralized(); ?>
            </h2>
            <p>Arquivos Processados</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Média de Tempo por Setor</h5>
            <canvas id="avg-time-sector"></canvas>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Últimos Documentos
          </div>
          <div class="card-body table-responsive" style="max-height: 400px; overflow-y: auto;">

            <?php


            $file = new Filemanager($conexao);

            $file->getpercategoria();

            ?>

          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            Estatística Gráfica
          </div>
          <div class="card-body table-responsive" style="max-height: 400px; overflow-y: auto;">
            <?php
            $myArray = array(
              array("label" => "Arquivos Em Processamento", "y" => $file->getnotreguralized()),
              array("label" => "Arquivos Processados", "y" => $file->getreguralized())
            );
            ?>

            <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js">
            </script>
            <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js">
            </script>

            <script>
              $(document).ready(function () {


                var passedArray = <?php echo json_encode($myArray); ?>;

                $("#btnID").click(function () {

                  var chart = new CanvasJS.Chart("chartID", {
                    title: {
                      text: "Gráfico Circular Estatísco"
                    },
                    data: [{
                      type: "pie",
                      animationEnabled: true,
                      indexLabelFontSize: 18,
                      fillOpacity: .7,
                      toolTipContent: "<i>{label}</i>: <b>{y}</b>",
                      radius: "80%",
                      startAngle: 75,
                      indexLabel: "{label} - {y}",
                      yValueFormatString: "##\"\"",
                      dataPoints: passedArray
                    }]

                  });
                  chart.render();

                });
              }); 
            </script>

              <div style="text-align:center">
                
                  <button id="btnID">
                    Mostrar Gráfico
                  </button>
                  <br>
                    <div id="chartID" style="height:400px;  
                max-width:950px;  
                margin:0px auto;">
                    </div>

              </div>

          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="assets/app.js"></script>

</body>

</html>