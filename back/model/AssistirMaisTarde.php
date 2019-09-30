
<?php
class AssistirMaisTarde {
    private $video;
    private $usuario;

    function __construct($id, $video, $usuario){
        $this->id = $id;
        $this->video = $video;
        $this->usuario = $usuario;
    }

    public function getId(){
        return $this->id;
    }
    public function getVideo(){
        return $this->video;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setVideo($video){
        $this->video = $video;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
}

?>