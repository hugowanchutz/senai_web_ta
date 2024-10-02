<?php
class Database {
    // Propriedades privadas para configuração do banco de dados
    private $host = 'localhost'; // Endereço do servidor do banco de dados
    private $db = 'escola'; // Nome do banco de dados
    private $user = 'root'; // Usuário do banco de dados
    private $pass = ''; // Senha do banco de dados
    private $port = 3307; // Porta de conexão do banco de dados
    private $pdo; // Objeto PDO para conexão

    // Método para conectar ao banco de dados
    public function connect() {
        try {
            // Define a string de conexão usando DSN (Data Source Name)
            $dsn = "mysql:host=$this->host;port=$this->port;dbname=$this->db";
            // Cria uma nova instância de PDO para conectar ao banco de dados
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            // Configura o modo de erro do PDO para exceções
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Se ocorrer um erro, exibe uma mensagem de erro
            echo "Erro na conexão: " . $e->getMessage();
        }
    }

    // Método para obter a conexão PDO
    public function getConnection() {
        return $this->pdo; // Retorna o objeto PDO
    }
}
?>
