
<?php
class Usuario {
    private $id;
    private $username;
    private $email;
    private $senha;
    private $ehAdm;

    function __construct($id, $username, $email, $senha, $ehAdm){
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->senha = $senha;
        $this->ehAdm = $ehAdm;
    }

    public function getId(){
        return $this->id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getEhAdm(){
        return $this->ehAdm;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setEhAdm($ehAdm){
        $this->ehAdm =$ehAdm;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    
}

?>