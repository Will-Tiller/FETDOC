<?php

session_start();
include_once('conexao.php');

class Adicionarprofile
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function insertUserFromModal($nome, $email, $cargo, $nivel, $senha)
    {

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }


        $sql = "INSERT INTO users  (nome, email, cargo, nivel, nivel)VALUES ('$nome', '$email', '$cargo', '$nivel', '$senha')";

        if ($this->conexao->query($sql) === TRUE) {
            echo "Arquivo registrado com sucesso!";
        } else {
            echo "Erro ao registrar o arquivo: " . $this->conexao->error;
        }

    }

}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('conexao.php');
    $adicionar = new Adicionarprofile($conexao);

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];
    $nivel = $_POST['nivel'];
    $senha = $_POST['senha'];

    $adicionar->insertUserFromModal($nome, $email, $cargo, $nivel, $senha);
}

?>