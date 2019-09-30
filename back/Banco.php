<?php
class Banco{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "dbfetnlix";
    private $conexao = null; 

    public function __construct()
    {          
        $this->conect();
    }

    public function getConection()
    {
        return $this->conexao;
    }

    public function conect() 
    {
        $this->conexao = mysqli_connect(
                  $this->host, 
                  $this->username, 
                  $this->password, 
                  $this->database);
        if(!$this->conexao){
            die('Connect Error: ' . mysqli_connect_error());
        }else{
            echo 'Connected!';
        }
    }
    public function disconect() 
    {
        mysqli_close($this->conexao);
    }

}
?>