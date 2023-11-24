<?php

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

    function adicionarAtividade($atividade)
    {
        global $conexao;

        $nomeUsuario = $this->usuario['nome'];

        $sql = "INSERT INTO actividades (nome, actividade) VALUES ('$nomeUsuario', '$atividade')";

        if ($conexao->query($sql) === TRUE) {
            echo "Atividade adicionada com sucesso.";
        } else {
            echo "Erro ao adicionar atividade: " . $conexao->error;
        }
    }

    public function mostraractividades()
    {
        $nomeUsuario = $this->usuario['nome'];

        $result = $this->conexao->query("SELECT * FROM actividades WHERE nome = '$nomeUsuario'") or die($this->conexao->error);

        if ($result->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Atividade</th>
                    <th scope="col">Hora</th>
                </tr>
            </thead>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['nome'] . '</td>';
                echo '<td>' . $row['actividade'] . '</td>';
                echo '<td>' . $row['hora'] . '</td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo 'Não há atividades registradas para este usuário.';
        }
    }


}
?>