<?php

session_start();
include_once('conexao.php');


class Filemanager {

    private $conexao;

    public function __construct($conexao) {

        $this->conexao = $conexao;

    }


    public function getTotalArquivos() {
        
        $totalArquivosQuery = $this->conexao->query("SELECT * FROM ficheiros") or die($this->conexao->error);

        if ($totalArquivosQuery->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead>
                    <tr>
                        <th scope="col">Proprietário</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Assunto</th>
                        <th scope="col">Data de Entrada</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>';

            while ($file = $totalArquivosQuery->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$file['remetente']}</td>";
                echo "<td>{$file['categoria']}</td>";
                echo "<td>{$file['assunto']}</td>";
                echo "<td>{$file['data_submissao']}</td>";
                echo "<td>{$file['estado']}</td>";
                echo "</tr>";
            }

            echo '</table>';
        } else {
            echo "Nenhum arquivo encontrado.";
        }
    }

}


?>