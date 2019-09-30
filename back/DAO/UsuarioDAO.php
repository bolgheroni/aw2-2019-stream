<?php
    require_once($_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream/back/model/Usuario.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream/back/Banco.php");

    class UsuarioDAO{
        private $db;
        public function __construct(){
            $this->db = new Banco();
        }
        
        function adicionarUsuario(Usuario $usuario){
            $username = $usuario->getUsername();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $ehAdm = $usuario->getEhAdm();
            $this->db->conect();
            $cmd = "INSERT INTO usuario(username, email, senha, ehAdm) ".
            "VALUES('".$username."', '".$email."', '".$senha."', '".$ehAdm."')";
            $result = mysqli_query($this->db->getConection(), $cmd);
            if ($result == true) {
                echo"Inserção com sucesso!";
                $this->db->disconect();
                return true;
            } else {
                $err = mysqli_error($this->db->getConection());
                echo "Falha na inserção! Erro: .".$err;
                $this->db->disconect();
                return false;
            }
            // $query = "INSERT INTO usuario (username, email, senha, ehAdm) VALUES (?,?,?,?)";
            // $stmt = mysqli_prepare($this->db->getConection(), $query);
            // echo 'a'.$stmt.'b';
            // mysqli_stmt_bind_param($stmt,'sssi', $username, $email, $senha, $ehAdm);
            // mysqli_stmt_execute($stmt); 
            // mysqli_stmt_close($stmt);
            
        }

        function listarUsuarios(){
            $this->db->conect();
            $cmd = "SELECT * from usuario;";
            $query = mysqli_query($this->db->getConection(), $cmd);
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            if ($query) {
                $this->db->disconect();
                return $result;
            } else {
                $err = mysqli_error($$this->db->getConection());
                $this->db->disconect();
                return $err;
            }
            //
            // $query = "SELECT * FROM usuario";
            // $stmt = mysqli_prepare($this->db->getConection(), $query);
            // mysqli_stmt_execute($stmt);
            // mysqli_stmt_bind_result($stmt,$usuarios );
            // mysqli_stmt_fetch_array($stmt);
        }

        function buscarUsuarioPorId($id){
            $this->db->conect();
            $cmd = "SELECT * from usuario WHERE id=".$id.";";
            $query = mysqli_query($this->db->getConection(), $cmd);
            $result = mysqli_fetch_assoc($query);
            if ($query) {
                $this->db->disconect();
                return $result;
            } else {
                $err = mysqli_error($$this->db->getConection());
                $this->db->disconect();
                return $err;
            }
            // $query = "SELECT * FROM usuario WHERE id=?";
            // $stmt = mysqli_prepare($this->$db->getConection(), $query);
            // mysqli_stmt_bind_param($stmt,"s",$id);
            // mysqli_stmt_execute($stmt);
            // mysqli_stmt_bind_result($stmt,$usuario);
            // mysqli_stmt_fecth($stmt);

            // return json_encode($usuario);
        }
        function buscarUsuarioPorEmail($email){
            $this->db->conect();
            $cmd = "SELECT * from usuario WHERE email=" . "'" .$email. "'" . ";";
            $query = mysqli_query($this->db->getConection(), $cmd);
            $result = mysqli_fetch_assoc($query);
            if ($query) {
                $this->db->disconect();
                return $result;
            } else {
                $err = mysqli_error($this->db->getConection());
                $this->db->disconect();
                return $err;
            }
            // $query = "SELECT * FROM usuario WHERE email=?";
            // $stmt = mysqli_prepare($this->$db->getConection(), $query);
            // mysqli_stmt_bind_param($stmt,"s",$email);
            // mysqli_stmt_execute($stmt);
            // mysqli_stmt_bind_result($stmt,$usuario);
            // mysqli_stmt_fecth($stmt);

            // return json_encode($usuario);
        }

        function editarUsuario($usuario){
            $id = $usuario->getId();
            $username = $usuario->getUsername();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $ehAdm = $usuario->getEhAdm();
            $this->db->conect();
            $cmd = 'UPDATE usuario SET username=\''.$username.'\', email=\''.$email.'\', senha=\''.$senha.'\', ehAdm='.$ehAdm.
                ' WHERE id='.$id.';';
            $result = mysqli_query($this->db->getConection(), $cmd);
            if ($result == true) {
                echo"Atualizado com sucesso!";
                $this->db->disconect();
                return true;
            } else {
                $err = mysqli_error($this->db->getConection());
                echo "Falha na atualizacao! Erro: .".$err;
                $this->db->disconect();
                return false;
            }
            // $query = "UPDATE usuario SET username =?, email=?, senha=?, ehAdm=? WHERE id=?";
            // $stmt = mysqli_prepare($this->$db->getConection(), $query);
            // mysqli_stmt_bind_param($stmt,'sssis', $username, $email, $senha, $ehAdm, $id);
            // mysqli_stmt_execute($stmt); 
            // mysqli_stmt_close($stmt);
        }

        function removerUsuario($id){
            $this->db->conect();
            $cmd = 'DELETE from usuario WHERE id='.$id.';';
            $result = mysqli_query($this->db->getConection(), $cmd);
            if ($result == true) {
                echo"Removido com sucesso!";
                $this->db->disconect();
                return true;
            } else {
                $err = mysqli_error($this->db->getConection());
                echo "Falha na remocao! Erro: .".$err;
                $this->db->disconect();
                return false;
            }
            // $query = "DELETE FROM usuario WHERE id =?";
            // $stmt = mysqli_prepare($this->$db->getConection(), $query);
            // mysqli_stmt_bind_param($stmt,'s', $id);
            // mysqli_stmt_execute($stmt);
            // mysqli_stmt_fecth($stmt);
        }

        


        function autenticarUsuario($username, $senha){
            $this->db->conect();
            $cmd = 'SELECT * from usuario WHERE username=\''.$username .'\' AND senha=\''.$senha.'\';';
            $query = mysqli_query($this->db->getConection(), $cmd);
            $result = mysqli_fetch_assoc($query);
            if ($query) {
                $this->db->disconect();
                return true;
            } else {
                $err = mysqli_error($this->db->getConection());
                $this->db->disconect();
                return $err;
            }
        }
    }
?>