<?php

session_start();
include_once('actividades.php');
include_once('conexao.php');

class EnviarArquivo
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function registrarArquivo($nomeRemetente, $contatoRemetente, $assunto, $prioridade, $categoria, $destinatario, $observacoes, $arquivo)
    {
        // Configuração para salvar o arquivo na pasta
        $diretorioAlvo = "uploads/";
        $caminhoCompleto = $diretorioAlvo . basename($_FILES["arquivo"]["name"]);

        // Move o arquivo para o diretório de upload
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $caminhoCompleto)) {
            // Insere os dados na tabela de arquivos
            $sql = "INSERT INTO ficheiros (remetente, contacto, assunto, prioridade, categoria, destinatario, observacoes, arquivo, data_submissao, estado, caminho_ficheiro)
                    VALUES ('$nomeRemetente', '$contatoRemetente', '$assunto', '$prioridade', '$categoria', '$destinatario', '$observacoes', '$arquivo', NOW(), 'Em Processamento', '$caminhoCompleto')";

            if ($this->conexao->query($sql) === TRUE) {

                $atividadesController = new Actividades($this->conexao);
                $atividadesController->adicionarAtividade("Registou novo arquivo");

                header('Location: ../registrar.php');
                exit();
            } else {
                echo "Erro ao registrar o arquivo: " . $this->conexao->error;
            }
        } else {
            echo "Falha ao fazer upload do arquivo.";
        }
    }
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('conexao.php');
    $enviarArquivo = new EnviarArquivo($conexao);

    $nomeRemetente = $_POST["nomeRemetente"];
    $contatoRemetente = $_POST["contatoRemetente"];
    $assunto = $_POST["assunto"];
    $prioridade = $_POST["prioridade"];
    $categoria = $_POST["categoria"];
    $destinatario = $_POST["destinatario"];
    $observacoes = $_POST["observacoes"];

    $enviarArquivo->registrarArquivo($nomeRemetente, $contatoRemetente, $assunto, $prioridade, $categoria, $destinatario, $observacoes, $_FILES["arquivo"]["name"]);
}

?>