<?php

session_start();
include_once('conexao.php');


class Filemanager
{

    private $conexao;

    public function __construct($conexao)
    {

        $this->conexao = $conexao;

    }


    public function getTotalArquivos()
    {

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

    public function getallArquivos($id)
    {

        $totalArquivosQuery = $this->conexao->query("SELECT * FROM ficheiros WHERE id = $id") or die($this->conexao->error);

        if ($totalArquivosQuery->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Remetente</th>
                        <th scope="col">Contacto</th>
                        <th scope="col">Assunto</th>
                        <th scope="col">Prioridade</th>
                        <th scope="col">Observações</th>
                        <th scope="col">Arquivo</th>
                        <th scope="col">Tramitador</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Data de Submissão</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Destinatario</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>';

            while ($file = $totalArquivosQuery->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$file['id']}</td>";
                echo "<td>{$file['remetente']}</td>";
                echo "<td>{$file['contacto']}</td>";
                echo "<td>{$file['assunto']}</td>";
                echo "<td>{$file['prioridade']}</td>";
                echo "<td>{$file['observacoes']}</td>";
                echo "<td>{$file['arquivo']}</td>";
                echo "<td>{$file['tramitador']}</td>";
                echo "<td>{$file['categoria']}</td>";
                echo "<td>{$file['data_submissao']}</td>";
                echo "<td>{$file['estado']}</td>";
                echo "<td>{$file['destinatario']}</td>";
                echo "<td>{$file['categoria']}</td>";
                echo "</tr>";
            }



            echo '</table>';
        } else {
            echo "Nenhum arquivo encontrado.";
        }

        
    }

    public function getArquivos()
    {

        $totalArquivos = $this->conexao->query("SELECT * FROM ficheiros") or die($this->conexao->error);

        if ($totalArquivos->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Proprietario</th>
                        <th scope="col">Assunto</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Prioridade</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>';

            while ($file = $totalArquivos->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$file['id']}</td>";
                echo "<td>{$file['remetente']}</td>";
                echo "<td>{$file['assunto']}</td>";
                echo "<td>{$file['categoria']}</td>";
                echo "<td>{$file['prioridade']}</td>";
                echo "<td>{$file['estado']}</td>";
                echo "<td><a href='Backend/detalhes_arquivo.php?id={$file['id']}'><button>Selecionar</button></a></td>";
                echo "</tr>";
            }

            echo '</table>';
        } else {
            echo "Nenhum arquivo encontrado.";
        }
    }


    public function getbyId() {

        $totalArquivos = $this->conexao->query("SELECT * FROM ficheiros") or die($this->conexao->error);

        if ($totalArquivos->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Proprietario</th>
                        <th scope="col">Assunto</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Prioridade</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>';

            while ($file = $totalArquivos->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$file['id']}</td>";
                echo "<td>{$file['remetente']}</td>";
                echo "<td>{$file['assunto']}</td>";
                echo "<td>{$file['categoria']}</td>";
                echo "<td>{$file['prioridade']}</td>";
                echo "<td>{$file['estado']}</td>";
                echo "<td><button>Selecionar</button></a></td>";
                echo "</tr>";
            }

            echo '</table>';
        } else {
            echo "Nenhum arquivo encontrado.";
        }

    }

    public function getnotreguralized() {

        
        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE estado = 'Em Processamento'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0; 
        }
    }

    public function getreguralized() {

        
        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE estado = 'Processado'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0; 
        }
    }

    public function gettotal() {

        
        $query = "SELECT COUNT(*) as count FROM ficheiros";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0; 
        }
    }


    }


?>