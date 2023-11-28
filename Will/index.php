<?php

include_once('Backend/testlogin.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistema Secretaria</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styleslogin.css">

</head>
<body>

<div class="center-container">
        <div class="login-container">
            <div class="left-section">
                
                <h2>Bem-vindo ao Sistema de Gestão de Documentos da FET</h2>
                <p>Submeta e monitore o estado dos documentos</p>
            </div>
            <div class="right-section">
                
                <form method="post" action="">
        <h1>Acesso ao Sistema</h1>

        <?php if (isset($erro)) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erro; ?>
            </div>
        <?php } ?>

        <div class="form-group">
            <input type="text" name="usuario" placeholder="Usuário" required>
        </div>

        <div class="form-group">
            <input type="password" name="senha" placeholder="Senha" required>
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>

            </div>
        </div>
    </div>
<div class="login-form">
    
</div>

</body>
</html>
