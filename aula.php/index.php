<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="stylesheet" href="css\style.css">
    <?php 
        require_once 'db.php';
        $database = new Database();
        $database->connect();
        $pdo = $database->getConnection();
    ?>
</head>
<body>
    <div class="box">
    <h1>Cadastro de alunos</h1>
    <!-- Formulário de Cadastro -->
    <form action="cadastro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="curso">Curso:</label>
        <input type="text" id="curso" name="curso" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</div>


    <!-- Listagem de Alunos -->
    <h2>Alunos Cadastrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Email</th>
            <th>Curso</th>
            <th>Ação</th>
        </tr>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM alunos");
        $stmt->execute();
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($alunos as $aluno) {
            echo "<tr>";
            echo "<td>" . $aluno['id'] . "</td>";
            echo "<td>" . $aluno['nome'] . "</td>";
            echo "<td>" . $aluno['idade'] . "</td>";
            echo "<td>" . $aluno['email'] . "</td>";
            echo "<td>" . $aluno['curso'] . "</td>";
            echo "<td><a href='deletar.php?id=" . $aluno['id'] . "'>Excluir</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>