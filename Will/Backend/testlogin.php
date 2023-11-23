<?php

session_start();
include_once('conexao.php');

class LoginController {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function autenticar($usuario, $senha) {

        $sql = "SELECT * FROM users WHERE nome = '$usuario' AND senha = '$senha'";

        $result = $this->conexao->query($sql);

        if ($result->num_rows > 0) {

            header("Location: dashboard.php");
            exit();
        } else {

            $erro = "Credenciais incorretas. Tente novamente.";
            return $erro;
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include_once('Backend/conexao.php');
    $loginController = new LoginController($conexao);

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $erro = $loginController->autenticar($usuario, $senha);
}

?>
