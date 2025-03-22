<?php 

require_once __DIR__ . '/../../config/database.php';


class getDatabase {

    private $db;

    public function __construct()
    {
        $db = new Database();
        $this->db = $db->getConnection();
    }
    
    public function listAllUser(){
            $stmt = $this->db->prepare("SELECT * FROM users");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
}

?>