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
              <canvas id="docs-per-status"></canvas>
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
    
    <h2>Últimos Documentos Processados</h2>
  
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Data</th>
          <th>Tipo</th>
          <th>Setor Atual</th>
          <th>Status</th>  
        </tr>
      </thead>
  
      <tbody>
        <tr>
          <td>1</td>
          <td>01/01/2023</td>
          <td>Memorando</td>
          <td>Reitoria</td>
          <td>Concluído</td>
        </tr>
      </tbody>
    </table>
  
  </div>

  <script src="assets/app.js"></script>

</body>
</html>