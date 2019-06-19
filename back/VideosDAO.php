<?php
$GLOBALS['categorias'] = require $_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream" . "/back/model/". "categorias.php";
$GLOBALS['caminhoVideos'] = $_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream" . "/back/model/". "videos.csv";

$GLOBALS['adicionarVideo'] = function($ar){
    $f = fopen($GLOBALS['caminhoVideos'], 'a');
    fputcsv($f, $ar);
    fclose($f);
    return true;
};

$GLOBALS['listarVideos'] = function(){
    $f = fopen($GLOBALS['caminhoVideos'], 'r');
    $retorno = array();
    $isLineOne = true;
    while (($linha = fgetcsv($f)) !== FALSE) {
        if($isLineOne){
            $isLineOne = false;
        }else{
            $retorno[]=$linha;
        }
    }
    fclose($f);
    return $retorno;
};

function adicionarVideo($nome, $link, $visualizacoes, $idCategoria){
    if(file_exists($GLOBALS['caminhoVideos'])){
        $register_exists = buscarVideoPorNome($nome) != null;
        if(!$register_exists){
            $id = sizeof(listarVideos()) +1;
            return $GLOBALS['adicionarVideo'](array($id, $nome, $link, $visualizacoes, $idCategoria));
        }else{
            return false;
        }
    }else{
        $f = fopen($GLOBALS['caminhoVideos'], 'a');
        fclose($f);
        $campos = array("id", 'nome', 'link', 'visualizacoes', 'idCategoria');
        $GLOBALS['adicionarVideo']($campos);
        return $GLOBALS['adicionarVideo'](array('1', $nome, $link, $visualizacoes, $idCategoria));
    }
}


function buscarVideoPorNome($nome){
    if(file_exists($GLOBALS['caminhoVideos'])){
        foreach(listarVideos() as $video){
            if($video['nome'] == $nome){
                $idCategoria = $video['idCategoria'];
                $nomeCategoria = $GLOBALS['categorias']['buscarCategoriaPorId']($idCategoria);
                if($nomeCategoria){
                    $video['nomeCategoria']= $nomeCategoria;
                    return $video;
                }
                return false;
            }
        }
        return false;
    }else{
        return false;
    }
}
function buscarVideoPorId($id){
    if(file_exists($GLOBALS['caminhoVideos'])){
        foreach(listarVideos() as $video){
            if($video['id'] == $id){
                $idCategoria = $video['idCategoria'];
                $nomeCategoria = $GLOBALS['categorias']['buscarCategoriaPorId']($idCategoria);
                if($nomeCategoria){
                    $video['nomeCategoria']= $nomeCategoria;
                    return $video;
                }
                return false;
            }
        }
        return false;
    }else{
        return false;
    }
}

function listarVideos(){
    if(file_exists($GLOBALS['caminhoVideos'])){
        $retorno = array();
        foreach($GLOBALS['listarVideos']() as $linha){
            // id,nome,link,visualizacoes,idCategoria
            $retorno[] = array("id" => $linha[0], "nome" => $linha[1],"link" => $linha[2], "visualizacoes" => $linha[3], "idCategoria" => $linha[4]);
        }
        return $retorno;
    }else{
        return false;
    }
}


return [
    'adicionarVideo' => 'adicionarVideo',
    'listarVideos' => 'listarVideos', 
    'buscarVideoPorId' => 'buscarVideoPorId'
]
?>