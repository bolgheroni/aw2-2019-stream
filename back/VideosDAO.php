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

function adicionarVideo($id, $nome, $link, $visualizacoes, $idCategoria){
    if(file_exists($GLOBALS['caminhoVideos'])){
        $register_exists = buscarVideoPorId($id) != null;
        if(!$register_exists){
            return $GLOBALS['adicionarVideo'](array($id, $nome, $link, $visualizacoes, $idCategoria));
        }else{
            return false;
        }
    }else{
        $f = fopen($GLOBALS['caminhoVideos'], 'a');
        fclose($f);
        $campos = array("id", 'nome', 'link', 'visualizacoes', 'idCategoria');
        $GLOBALS['adicionarVideo']($campos);
        return $GLOBALS['adicionarVideo'](array($id, $nome, $link, $visualizacoes, $idCategoria));
    }
}


function buscarVideoPorId($id){
    if(file_exists($GLOBALS['caminhoVideos'])){
        foreach($GLOBALS['listarVideos']() as $linha){
            if($linha[0] == $id){
                $idCategoria = $linha[4];
                $nomeCategoria = $GLOBALS['categorias']['buscarCategoriaPorId']($idCategoria);
                if($nomeCategoria){
                    return array("id" => $linha[0], "nome" => $linha[1], "link" => $linha[2], "visualizacoes" => $linha[3], "nomeCategoria" => $nomeCategoria );
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