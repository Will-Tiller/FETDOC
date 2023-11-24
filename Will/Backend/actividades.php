<?php

session_start();
include_once('conexao.php');

class Actividades
{
    private $conexao;
    private $usuario;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
        $this->usuario = $_SESSION['usuario'];
    }

    function adicionarAtividade($atividade) {
        global $conexao;

        $nomeUsuario = $this->usuario['nome'];

        $sql = "INSERT INTO actividades (nome_usuario, atividade) VALUES ('$nomeUsuario', '$atividade')";

        if ($conexao->query($sql) === TRUE) {
            echo "Atividade adicionada com sucesso.";
        } else {
            echo "Erro ao adicionar atividade: " . $conexao->error;
        }
    }

}
?>
