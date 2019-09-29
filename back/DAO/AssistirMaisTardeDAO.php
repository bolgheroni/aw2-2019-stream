<?php
    require_once($_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream/back/model/AssistirMaisTarde.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream/back/Banco.php");

    class AssistirMaisTardeDAO{
        private $db;
        public function __construct(){
            $this->db = new Banco();
        }
        
        function adicionarAssistirMaisTarde(AssistirMaisTarde $assistirMaisTarde){
            $usuario = $assistirMaisTarde->getUsuario();
            $video = $assistirMaisTarde->getVideo();

            $idUsuario = $usuario->getId();
            $idVideo = $video->getId();

            $this->db->conect();
            $cmd = "INSERT INTO assistirmaistarde(idVideo,idUsuario) ".
            "VALUES('".$idVideo."', '".$idUsuario."')";
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
            
        }

        function listarAssistirMaisTarde(){
            $this->db->conect();
            $cmd = "SELECT * from assistirmaistarde;";
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
            
        }

        function buscarAssistirMaisTardePorId($id){
            $this->db->conect();
            $cmd = "SELECT * from assistirmaistarde WHERE id=".$id.";";
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
        }

        function buscarAssistirMaisTarde($assistirMaisTarde){
            $usuario = $assistirMaisTarde->getUsuario();
            $video = $assistirMaisTarde->getVideo();

            $idUsuario = $usuario->getId();
            $idVideo = $video->getId();

            $this->db->conect();
            $cmd = "SELECT * from assistirmaistarde WHERE idVideo=" . "'" .$idVideo. "'" . " AND idUsuario=" . "'" .$idUsuario. "'" . ";";
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
        }

        function editarUsuario($assistirMaisTarde){
            $id = $assistirMaisTarde->getId();
            $usuario = $assistirMaisTarde->getUsuario();
            $video = $assistirMaisTarde->getVideo();

            $idUsuario = $usuario->getId();
            $idVideo = $video->getId();

            $this->db->conect();
            $cmd = 'UPDATE assistirmaistarde SET idVideo=\''.$idVideo.'\', idUsuario=\''.$idUsuario.' WHERE id='.$id.';';
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
        }

        function removerAssistirMaisTarde($id){
            $this->db->conect();
            $cmd = 'DELETE from assistirmaistarde WHERE id='.$id.';';
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
        }

    }
?>