<?php
    
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "fetdoc";

        $conexao = new mysqli($servername, $username, $password, $dbname);
        if ($conexao->connect_error) {

                die("Erro de conexão: " . $conexao->connect_error);
                
        }

?>
