
<?php
class Video {
    private $id;
    private $nome;
    private $link;
    private $visualizacoes;
    private $categoria;

    function __construct($id, $nome, $link, $visualizacoes, $categoria){
        $this->$id = $id;
        $this->$nome = $nome;
        $this->$link = $link;
        $this->$visualizacoes = $visualizacoes;
        $this->$categoria = $categoria;
    }

    public function getId(){
        return $this->$id;
    }
    public function getNome(){
        return $this->$nome;
    }
    public function getLink(){
        return $this->$link;
    }
    public function getCategoria(){
        return $this->$categoria;
    }
    public function getVisualizacoes(){
        return $this->$visualizacoes;
    }
    public function setId($id){
        $this->$id = $id;
    }
    public function setNome($nome){
        $this->$nome = $nome;
    }
    public function setLink($link){
        $this->$link = $link;
    }
    public function setCategoria($categoria){
        $this->$categoria =$categoria;
    }
    public function setVisualizacoes($visualizacoes){
        $this->$visualizacoes = $visualizacoes;
    }
    
}

?>