<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Cria uma nova instância da classe Database e estabelece a conexão
$database = new Database();
$database->connect();
$pdo = $database->getConnection();

// Verifica se o formulário foi enviado via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    // Prepara uma instrução SQL para inserir os dados no banco de dados
    $stmt = $pdo->prepare("INSERT INTO alunos (nome, idade, email, curso) VALUES (?, ?, ?, ?)");
    
    // Executa a instrução SQL com os dados do formulário
    $stmt->execute([$nome, $idade, $email, $curso]);

    // Redireciona o usuário de volta para a página principal
    header("Location: index.php");
    exit(); // Termina a execução do script após o redirecionamento
}
?>
