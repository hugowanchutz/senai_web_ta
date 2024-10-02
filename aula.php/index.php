<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura a visualização responsiva para dispositivos móveis -->
    <title>Cadastro de Alunos</title> <!-- Título da página -->
    <link rel="stylesheet" href="css/style.css"> <!-- Link para o arquivo CSS de estilos -->
    <?php 
        // Inclui o arquivo de conexão com o banco de dados e estabelece a conexão
        require_once 'db.php';
        $database = new Database();
        $database->connect();
        $pdo = $database->getConnection();
    ?>
</head>
<body>
    <div class="box"> <!-- Div que contém o formulário de cadastro -->
        <h1>Cadastro de alunos</h1> <!-- Título do formulário -->
        
        <!-- Formulário de Cadastro -->
        <form action="cadastro.php" method="POST"> <!-- Define a ação do formulário para cadastro.php e o método POST -->
            <label for="nome">Nome:</label> <!-- Rótulo para o campo de nome -->
            <input type="text" id="nome" name="nome" required><br> <!-- Campo de entrada para o nome -->

            <label for="idade">Idade:</label> <!-- Rótulo para o campo de idade -->
            <input type="number" id="idade" name="idade" required><br> <!-- Campo de entrada para a idade -->

            <label for="email">Email:</label> <!-- Rótulo para o campo de email -->
            <input type="email" id="email" name="email" required><br> <!-- Campo de entrada para o email -->

            <label for="curso">Curso:</label> <!-- Rótulo para o campo de curso -->
            <input type="text" id="curso" name="curso" required><br> <!-- Campo de entrada para o curso -->

            <input type="submit" value="Cadastrar"> <!-- Botão para enviar o formulário -->
        </form>
    </div>

    <!-- Listagem de Alunos -->
    <h2>Alunos Cadastrados</h2> <!-- Título da seção de listagem -->
    <table border="1"> <!-- Início da tabela com borda -->
        <tr> <!-- Linha de cabeçalho da tabela -->
            <th>ID</th> <!-- Cabeçalho da coluna ID -->
            <th>Nome</th> <!-- Cabeçalho da coluna Nome -->
            <th>Idade</th> <!-- Cabeçalho da coluna Idade -->
            <th>Email</th> <!-- Cabeçalho da coluna Email -->
            <th>Curso</th> <!-- Cabeçalho da coluna Curso -->
            <th>Ação</th> <!-- Cabeçalho da coluna Ação -->
        </tr>
        <?php
        // Prepara e executa a consulta para selecionar todos os alunos
        $stmt = $pdo->prepare("SELECT * FROM alunos");
        $stmt->execute();
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtém todos os registros como um array associativo
        
        // Loop para exibir cada aluno na tabela
        foreach ($alunos as $aluno) {
            echo "<tr>"; // Início da linha da tabela
            echo "<td>" . $aluno['id'] . "</td>"; // Coluna ID
            ec
