<?php

class dataBase{
    private $host = 'localhost';
    private $user = 'root'; 
    private $password = '';
    private $dbname= 'db_web';
    private $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            throw new Exception("Erro ao conectar ao banco de dados: " . $this->conn->connect_error);
        }
    }

    public function getConnection(){
        return $this->conn;
    }
        
}

?>