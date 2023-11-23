<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Sistema Secretaria FET</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/styleperfil.css">
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

    <h2>Meu Perfil</h2>
  
    <div class="profile">
  
      <div class="left">
        <img src="foto.png">
  
        <button>Alterar Foto</button>
      </div>
  
      <div class="right">
  
        <form>
        
          <div class="form-group">
            <label>Nome</label>
            <input type="text" value="Maria Silva"> 
          </div>
  
          <div class="form-group">
            <label>Email</label>    
            <input type="email" value="maria@email.com">
          </div>
  
          <div class="form-group">
            <label>Perfil</label>  
            <select>
              <option>Administrador</option>
              <option selected>Secretaria</option>
            </select>
          </div>
  
          <button class="btn">Salvar</button>
        
        </form>
  
      </div>
  
    </div>
  
  </div>

  <script src="assets/app.js"></script>

</body>
</html>