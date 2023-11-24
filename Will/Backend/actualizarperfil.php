<?php

session_start();
include_once('conexao.php');

class Actualizarperfil
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function actulizar($nome, $email, $cargo, $nomeantigo)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        // Use UPDATE em vez de INSERT
        $sql = "UPDATE users SET nome='$nome', email='$email', cargo='$cargo' WHERE nome='$nomeantigo'";

        if ($this->conexao->query($sql) === TRUE) {

            header('Location: ../perfil.php');
            exit();

        } else {
            echo "Erro ao atualizar o perfil: " . $this->conexao->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('conexao.php');

    $adicionar = new Actualizarperfil($conexao);

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];
    $nomeantigo = $_POST['nomee'];

    $adicionar->actulizar($nome, $email, $cargo, $nomeantigo);
}

?>