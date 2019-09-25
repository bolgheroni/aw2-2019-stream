<?php
    require_once('../model/Usuario.php');
    require_once('../Banco.php');

    class UsuarioDAO{
        private $db;
        public function __construct(){
            $this->$db = new Banco();
        }
        
        function adicionarUsuario($usuario){
            $username = $usuario->getUsername();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $ehAdm = $usuario->getEhAdm();

            $query = "INSERT INTO Usuario (Username, email, senha, ehAdm) VALUES (?,?,?,?)";
            $stmt = mysqli_prepare($this->db->getConection(), $query);
            mysqli_stmt_bind_param($stmt,'sssi', $username, $email, $senha, $ehAdm);
            mysqli_stmt_execute($stmt); 
            mysqli_stmt_close($stmt);
        }

        function listarUsuarios(){
            $query = "SELECT * FROM Usuario";
            $stmt = mysqli_prepare($this->db->getConection(), $query);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt,$usuarios);
            mysqli_stmt_fecth($stmt);

            return json_encode($usuarios);
        }

        function buscarUsuarioPorId($id){
            $query = "SELECT * FROM Usuario WHERE id=?";
            $stmt = mysqli_prepare($this->db->getConection(), $query);
            mysqli_stmt_bind_param($stmt,"s",$id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt,$usuario);
            mysqli_stmt_fecth($stmt);

            return json_encode($usuario);
        }

        function editarUsuario($usuario){
            $id = $usuario->getId();
            $username = $usuario->getUsername();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $ehAdm = $usuario->getEhAdm();

            $query = "UPDATE Usuario SET username =?, email=?, senha=?, ehAdm=? WHERE id=?";
            $stmt = mysqli_prepare($this->db->getConection(), $query);
            mysqli_stmt_bind_param($stmt,'sssis', $username, $email, $senha, $ehAdm, $id);
            mysqli_stmt_execute($stmt); 
            mysqli_stmt_close($stmt);
        }

        function removerUsuario($id){
            $query = "DELETE FROM Usuario WHERE id =?";
            $stmt = mysqli_prepare($this->db->getConection(), $query);
            mysqli_stmt_bind_param($stmt,'s', $id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_fecth($stmt);
        }

        function buscarUsuarioPorEmail($email){
            $query = "SELECT * FROM Usuario WHERE email=?";
            $stmt = mysqli_prepare($this->db->getConection(), $query);
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt,$usuario);
            mysqli_stmt_fecth($stmt);

            return json_encode($usuario);
        }


        function autenticarUsuario(){

        }
    }
?>