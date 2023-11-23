<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sistema Secretaria FET</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/styleacompanhar.css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="logo.png" width="30" height="30" class="d-inline-block align-top" />
                    <span>Sistema da Secretaria da FET</span>
                </a>
            </div>
        </nav>
    </header>

    <div class="sidebar">
        <h3><a href="index.php">FET</a></h3>
        <ul>
            <li>
                <a href="dashboard.php">Dashboard</a>
            </li>
            <li>
            <li>
                <a href="">Tramitação </a>
            </li>
            <ul>
                <li><a href="acompanhar.php">Acompanhar Progresso</a></li>
                <li><a href="registrar.php">Registrar Arquivo</a></li>
            </ul>
            </li>
            <li>
                <a href="arquivos.php">Arquivos</a>
            </li>
            <li>
                <a href="estatistica.php">Estatísticas </a>
            </li>
            <li>
                <a href="perfil.php">
                    <img src="user.png" width="20" />
                    Meu Perfil
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <img src="logout.png" width="20" />
                    Sair
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <h1>Registrar Entrada de Arquivos</h1>

        <form method="post" action="Backend/enviararquivo.php" enctype="multipart/form-data">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nomeRemetente">Nome do Remetente*</label>
                    <input type="text" class="form-control" id="nomeRemetente" name="nomeRemetente" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="contatoRemetente">Contato do Remetente</label>
                    <input type="text" class="form-control" id="contatoRemetente" name="contatoRemetente">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="assunto">Assunto</label>
                    <select class="form-control" id="assunto" name="assunto">
                        <option value="Pedido">Pedido</option>
                        <option value="Aviso">Aviso</option>
                        <option value="Convinte">Convinte</option>
                        <option value="Informe">Informe</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="prioridade">Prioridade</label>
                    <select class="form-control" id="prioridade" name="prioridade">
                        <option value="Urgente">Urgente</option>
                        <option value="Não Urgente">Não Urgente</option>
                        <option value="Sem Prioridade">Sem Prioridade</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="assunto">Categoria</label>
                    <select class="form-control" id="categoria" name="categoria">
                        <option value="Memorandos"> Memorandos</option>
                        <option value="Ofícios">Ofícios</option>
                        <option value="Processos"> Processos Acadêmicos</option>
                        <option value="Contratos e convênios">Contratos e convênios</option>
                        <option value="Editais"> Editais</option>
                        <option value="Actas">Actas</option>
                        <option value="Relatórios"> Relatórios</option>
                        <option value="Requerimentos e declarações"> Requerimentos e declarações </option>
                        <option value="Documentos de RH">Documentos de RH</option>
                        <option value="Notas fiscais e facturas"> Notas fiscais e facturas</option>
                        <option value="Correspondências diversa">Correspondências diversa</option>
                        <option value="Sem Categori"> Sem Categoria</option>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="prioridade">Destinatário</label>
                    <select class="form-control" id="destinatario" name="destinatario">
                        <option value="Coordenação dos Cursos">Coordenação dos Cursos</option>
                        <option value="Secretaria Acadêmica">Secretaria Acadêmica</option>
                        <option value="Secretaria Geral">Secretaria Geral</option>
                        <option value="Sector Financeiro">Sector Financeiro<option>
                        <option value="Direção da Faculdade">Direção da Faculdade</option>
                        <option value="Conselho Acadêmico"> Conselho Acadêmico</option>
                        <option value="Biblioteca">Biblioteca</option>
                        <option value="Laboratórios"> Laboratórios</option>
                        <option value="Coordenação de Estágios"> Coordenação de Estágios </option>
                        <option value="Documentos de RH">Documentos de RH</option>
                        <option value="Representantes Estudantis"> Representantes Estudantis</option>
                        <option value="Reitor">Reitor</option>
                        <option value="hefe da Secretaria"> Chefe da Secretaria</option>
                        <option value="Sem Destinatário"> Sem Destinatário</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="arquivo">Arquivo</label>
                <input type="file" class="form-control-file" id="arquivo" name="arquivo">
            </div>

            <div class="form-group">
                <label for="observacoes">Observações Adicionais</label>
                <textarea class="form-control" id="observacoes" name="observacoes" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>

    <script src="app.js"></script>
</body>

</html>