<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'db.php';

// Cria uma nova instância da classe Database e estabelece a conexão
$database = new Database();
$database->connect();
$pdo = $database->getConnection();

// Verifica se a variável 'id' foi passada na URL
if (isset($_GET['id'])) {
    // Obtém o ID do aluno a ser deletado da URL
    $id = $_GET['id'];
    
    // Prepara uma instrução SQL para deletar o aluno com o ID especificado
    $stmt = $pdo->prepare("DELETE FROM alunos WHERE id = ?");
    
    // Executa a instrução SQL com o ID do aluno
    $stmt->execute([$id]);

    // Redireciona o usuário de volta para a página principal após a exclusão
    header("Location: index.php");
    exit(); // Termina a execução do script após o redirecionamento
}
?>
