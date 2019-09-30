<?php
    require_once($_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream/back/model/Video.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream/back/Banco.php");

    class VideoDAO{
        private $db;
        public function __construct(){
            $this->db = new Banco();
        }
        
        function adicionarVideo(Video $video){
            $nome = $video->getNome();
            $link = $video->getLink();
            $visualizacoes = $video->getVisualizacoes();
            $categoria = $video->getCategoria();

            $idCategoria = $categoria->getId();

            $this->db->conect();
            $cmd = "INSERT INTO video(nome,link,visualizacoes,idCategoria) ".
            "VALUES('".$nome."', '".$link."', '".$visualizacoes."', '".$idCategoria."')";
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

        function listarVideos(){
            $this->db->conect();
            $cmd = "SELECT * from video;";
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

        function buscarVideoPorId($id){
            $this->db->conect();
            $cmd = "SELECT * from video WHERE id=".$id.";";
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


        function editarVideo($video){
            $id = $video->getId();
            $nome = $video->getNome();
            $link = $video->getLink();
            $visualizacoes = $video->getVisualizacoes();
            $categoria = $video->getCategoria();

            $idCategoria = $categoria->getId();

            $this->db->conect();
            $cmd = 'UPDATE video SET nome=\''.$nome.'\', link=\''.$link.'\', visualizacoes=\''.$visualizacoes.'\', idCategoria='.$idCategoria.
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
        }

        function removerVideo($id){
            $this->db->conect();
            $cmd = 'DELETE from video WHERE id='.$id.';';
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

        function videosPorCategoria($idCategoria){
            $this->db->conect();
            $cmd = "SELECT * from video WHERE idCategoria=".$idCategoria.";";
            $query = mysqli_query($this->db->getConection(), $cmd);
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);;
            if ($query) {
                $this->db->disconect();
                return $result;
            } else {
                $err = mysqli_error($this->db->getConection());
                $this->db->disconect();
                return $err;
            }
        }

        function adicionarVisualizacao($idVideo){
            $video = buscarVideoPorId($idVideo);

            $visualizacoes = $video ->getVisualizacoes();
            $visualizacoes++;

            $this->db->conect();
            $cmd = 'UPDATE video SET visualizacoes=\''.$visualizacoes.'\' WHERE id='.$idVideo.';';
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

    }
?>