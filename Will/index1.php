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

  <div class="content">

    <h1>Dashboard</h1>

    <div class="row">

      <div class="col-md-3">
        <div class="card bg-primary text-white">
          <div class="card-body">
            <h2>
              <?php echo $file->gettotal(); ?>
            </h2>
            <p>Total de Arquivos</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card bg-success  text-white">
          <div class="card-body">
            <h2>
              <?php echo $file->getreguralized(); ?>
            </h2>
            <p>Arquivos Processados</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card bg-warning  text-white">
          <div class="card-body">
            <h2>
              <?php echo $file->getnotreguralized(); ?>
            </h2>
            <p>Arquivos Em Processamento</p>
          </div>
        </div>
      </div>

    </div><br>

    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Últimos Documentos
          </div>
          <div class="card-body table-responsive" style="max-height: 500px; overflow-y: auto;">

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
            Documentos por Tipo
          </div>
          <div class="card-body table-responsive" style="max-height: 800px; overflow-y: auto;">
            <div class="doc-types">

              <div class="row">

                <div class="col">

                  <h4><a href="">Memorandos:</a>
                    <?php echo $file->contmemorandos(); ?>
                  </h4>

                </div>

                <div class="col">

                  <h4><a href="">Convintes:</a>
                    <?php echo $file->contconvintes(); ?>
                  </h4>

                </div>

              </div>

            </div>
            <div class="doc-types">

              <div class="row">

                <div class="col">

                  <h4><a href="">Pedidos:</a>
                    <?php echo $file->contpedidos(); ?>
                  </h4>

                </div>

                <div class="col">

                  <h4><a href="">Informes:</a>
                    <?php echo $file->contInformes(); ?>
                  </h4>

                </div>

              </div>

            </div>
            <div class="doc-types">

              <div class="row">

                <div class="col">

                  <h4><a href="">Processos Acadêmicos:</a>
                    <?php echo $file->contProcessos(); ?>
                  </h4>

                </div>

                <div class="col">

                  <h4><a href="">Contratos e convênios:</a>
                    <?php echo $file->contContratos(); ?>
                  </h4>

                </div>

              </div>

            </div>
            <div class="doc-types">

              <div class="row">

                <div class="col">

                  <h4><a href="">Editais:</a>
                    <?php echo $file->contEditais(); ?>
                  </h4>

                </div>

                <div class="col">

                  <h4><a href="">Actas:</a>
                    <?php echo $file->contActas(); ?>
                  </h4>

                </div>

              </div>

            </div>
            <div class="doc-types">

              <div class="row">

                <div class="col">

                  <h4><a href="">Relatórios:</a>
                    <?php echo $file->contRelatorios(); ?>
                  </h4>

                </div>

                <div class="col">

                  <h4><a href="">Requerimentos e declarações:</a>
                    <?php echo $file->contRequerimentos(); ?>
                  </h4>

                </div>

              </div>

            </div>

            <div class="doc-types">

              <div class="row">

                <div class="col">

                  <h4><a href="">Avisos:</a>
                    <?php echo $file->contavisos(); ?>
                  </h4>

                </div>

                <div class="col">

                  <h4><a href="">Despacho:</a>
                    <?php echo $file->contDespacho(); ?>
                  </h4>

                </div>

              </div>

            </div>

            <div class="doc-types">

              <div class="row">

                <div class="col">

                  <h4><a href="">Documentos de RH:</a>
                    <?php echo $file->contDocumentosrh(); ?>
                  </h4>

                </div>

                <div class="col">

                  <h4><a href="">Notas fiscais e facturas:</a>
                    <?php echo $file->contfiscais(); ?>
                  </h4>

                </div>

              </div>

            </div>

            <div class="doc-types">

              <div class="row">

                <div class="col">

                  <h4><a href="">Correspondências diversa:</a>
                    <?php echo $file->contCorrespondencias(); ?>
                  </h4>

                </div>

                <div class="col">

                  <h4><a href="">Todos:</a>
                    <?php echo $file->contTodos(); ?>
                  </h4>

                </div>

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