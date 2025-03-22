<?php 

require_once __DIR__ . '/configDataBase.php';


class Database {
    private $pdo;


    public function __construct()
    {
        try {
            $dns = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            $this->pdo = new PDO($dns, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Exibir erros
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::ERRMODE_EXCEPTION, // Formato de retorno
                PDO::ATTR_EMULATE_PREPARES => false // Evitar SQL Injection
            ]);
        } catch (PDOException $e){
            die("Erro na conexão " . $e->getMessage());
        }
    }

    public function getConnection(){
        return $this->pdo;
    }
}

?>