<?php 

session_start();
include_once('conexao.php');

class Profile 
{
    private $conexao;
    private $usuario;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
        $this->usuario = $_SESSION['usuario'];
    }

    public function dados() 
    {
        $nomeUsuario = $this->usuario['nome'];

        $resultado = $this->conexao->query("SELECT nome, email, cargo, senha, nivel FROM users WHERE nome = '$nomeUsuario'") or die($this->conexao->error);

        // Verifica se há dados antes de tentar acessar
        // Verifica se há dados antes de tentar acessar
        if ($resultado->num_rows > 0) {
            $dadosUsuario = $resultado->fetch_assoc();
            echo '<h5 class="my-3">Nome: ' . $dadosUsuario['nome'] . '</h5>';
            echo '<p class="text-muted mb-1">Email: ' . $dadosUsuario['email'] . '</p>';
            echo '<p class="text-muted mb-1">Cargo: ' . $dadosUsuario['cargo'] . '</p>';
            echo '<p class="text-muted mb-1">Senha: ' . str_repeat('*', strlen($dadosUsuario['senha'])) . '</p>';
            
            // Verifica o nível do usuário
            if ($dadosUsuario['nivel'] == 2) {
                echo '<p class="text-muted mb-1">Nível: Admin</p>';
            } else {
                echo '<p class="text-muted mb-1">Nível: Normal</p>';
            }

        } else {
            echo 'Usuário não encontrado ou sem dados.';
        }
    }

    public function todosusers() 
    {
        $resultado = $this->conexao->query("SELECT * FROM users") or die($this->conexao->error);
    
        if ($resultado->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Senha</th>
                    </tr>
                </thead>';
    
            while ($file = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$file['id']}</td>";
                echo "<td>{$file['nome']}</td>";
                echo "<td>{$file['email']}</td>";
                echo "<td>{$file['cargo']}</td>";
                echo "<td>" . str_repeat('*', strlen($file['senha'])) . "</td>";
                
                echo "</tr>";
            }
    
            echo '</table>';
        }
    }
    
}
?>
