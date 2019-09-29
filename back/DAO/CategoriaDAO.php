<?php
    require_once($_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream/back/model/Categoria.php");
    require_once($_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream/back/Banco.php");

    class CategoriaDAO{
        private $db;
        public function __construct(){
            $this->db = new Banco();
        }
        
        function adicionarCategoria(Categoria $categoria){
            $nome = $categoria->getNome();
            $this->db->conect();
            $cmd = "INSERT INTO categoria(nome) ".
            "VALUES('".$nome."')";
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

        function listarCategorias(){
            $this->db->conect();
            $cmd = "SELECT * from categoria;";
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

        function buscarCategoriaPorId($id){
            $this->db->conect();
            $cmd = "SELECT * from categoria WHERE id=".$id.";";
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

        function editarCategoria($categoria){
            $id = $categoria->getId();
            $nome = $categoria->getNome();
            
            $this->db->conect();
            $cmd = 'UPDATE categoria SET nome=\''.$nome.' WHERE id='.$id.';';
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

        function removerCategoria($id){
            $this->db->conect();
            $cmd = 'DELETE from categoria WHERE id='.$id.';';
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