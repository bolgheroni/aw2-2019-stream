<?php
    require_once($_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream/back/model/Favorito.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream/back/Banco.php");

    class FavoritoDAO{
        private $db;
        public function __construct(){
            $this->db = new Banco();
        }
        
        function adicionarFavorito(Favorito $favorito){
            $usuario = $favorito->getUsuario();
            $video = $favorito->getVideo();

            $idUsuario = $usuario->getId();
            $idVideo = $video->getId();

            $this->db->conect();
            $cmd = "INSERT INTO favorito(idVideo,idUsuario) ".
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

        function listarFavoritos(){
            $this->db->conect();
            $cmd = "SELECT * from favorito;";
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

        function buscarFavoritoId($id){
            $this->db->conect();
            $cmd = "SELECT * from favorito WHERE id=".$id.";";
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

        function buscarFavorito($favorito){
            $usuario = $favorito->getUsuario();
            $video = $favorito->getVideo();

            $idUsuario = $usuario->getId();
            $idVideo = $video->getId();

            $this->db->conect();
            $cmd = "SELECT * from favorito WHERE idVideo=" . "'" .$idVideo. "'" . " AND idUsuario=" . "'" .$idUsuario. "'" . ";";
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

        function editarUsuario($favorito){
            $id = $favorito->getId();
            $usuario = $favorito->getUsuario();
            $video = $favorito->getVideo();

            $idUsuario = $usuario->getId();
            $idVideo = $video->getId();

            $this->db->conect();
            $cmd = 'UPDATE favorito SET idVideo=\''.$idVideo.'\', idUsuario=\''.$idUsuario.' WHERE id='.$id.';';
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
            $cmd = 'DELETE from favorito WHERE id='.$id.';';
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