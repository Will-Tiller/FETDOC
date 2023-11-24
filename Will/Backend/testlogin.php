<?php

include_once('Backend/conexao.php');

class LoginController
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function autenticar($usuario, $senha)
    {

        session_start();

        $sql = "SELECT * FROM users WHERE nome = '$usuario' AND senha = '$senha'";
        $result = $this->conexao->query($sql);

        if ($result->num_rows > 0) {
            
            $dadosUsuario = $result->fetch_assoc();
            
            $_SESSION['usuario'] = $dadosUsuario;

            $sqll = "SELECT nivel FROM users WHERE nome = ?";
            $stmt = $this->conexao->prepare($sqll);
            $stmt->bind_param("s", $dadosUsuario['nome']);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $nivel = $row["nivel"];

                    if ($nivel == 1) {
                        $_SESSION['user'] = 'a';
                        header("Location: Location: ../login.php");
                    } elseif ($nivel == 2) {
                        $_SESSION['user'] = 'b';
                        header("Location: Dashboard.php");
                    } else {
                        header("Location: ../login.php");
                    }
                }

            
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