<?php
class Banco{

    private $host = "localhost";
    private $username = "root";
    private $password = "123456";
    private $database = "fetnlix";
    private $conexao = null; 

    public function __construct()
    {          
        $this->conect();
    }

    public function getConection()
    {
        return $this->conexao;
    }

    private function conect() 
    {
        $this->conexao = mysqli_connect(
                  $this->host, 
                  $this->username, 
                  $this->password, 
                  $this->database);
    }

}
?>