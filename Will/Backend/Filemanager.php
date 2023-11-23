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


    public function getbyId()
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
                echo "<td><button>Selecionar</button></a></td>";
                echo "</tr>";
            }

            echo '</table>';
        } else {
            echo "Nenhum arquivo encontrado.";
        }

    }

    public function getnotreguralized()
    {


        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE estado = 'Em Processamento'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }
    }

    public function getreguralized()
    {


        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE estado = 'Processado'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }
    }

    public function gettotal()
    {


        $query = "SELECT COUNT(*) as count FROM ficheiros";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }
    }

    public function getpercategoria()
    {

        $totalArquivos = $this->conexao->query("SELECT * FROM ficheiros ORDER BY data_submissao DESC LIMIT 5") or die($this->conexao->error);


        if ($totalArquivos->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead>
                    <tr>
                        <th scope="col">Categoria</th>
                        <th scope="col">Arquivo</th>
                        <th scope="col">Tramitador</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Data de Submissão</th>
                        <th scope="col">Destinatário</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>';

            while ($file = $totalArquivos->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$file['categoria']}</td>";
                echo "<td>{$file['arquivo']}</td>";
                echo "<td>{$file['tramitador']}</td>";
                echo "<td>{$file['estado']}</td>";
                echo "<td>{$file['data_submissao']}</td>";
                echo "<td>{$file['destinatario']}</td>";
                echo "<td><a href='Backend/detalhes_arquivo.php?id={$file['id']}'><button>Selecionar</button></a></td>";
                echo "</tr>";
            }

            echo '</table>';
        } else {
            echo "Nenhum arquivo encontrado.";
        }


    }

    public function contmemorandos()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Memorandos'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contconvintes()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Convintes'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contpedidos()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Pedidos'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contInformes()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Informes'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contProcessos()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Processos'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contContratos()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Contratos e convênios'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contEditais()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Editais'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contActas()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Actas'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contRelatorios()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Relatórios'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contRequerimentos()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Requerimentos e declarações'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contDocumentosrh()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Documentos de RH'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contfiscais()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Notas fiscais e facturas'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contCorrespondencias()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Correspondências diversas'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contTodos()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contavisos()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Avisos'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contDespacho()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Despacho'";
        $result = $this->conexao->query($query);

        if ($result) {
            $row = $result->fetch_assoc();

            return $row['count'];

        } else {

            return 0;
        }

    }

    public function contf()
    {

        $query = "SELECT COUNT(*) as count FROM ficheiros WHERE categoria = 'Memorandos'";
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