<?php
$GLOBALS['caminhoFavoritos'] = $_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream" . "/back/model/". "favoritos.csv";

$GLOBALS['adicionarFavorito'] = function($ar){
    $f = fopen($GLOBALS['caminhoFavoritos'], 'a');
    fputcsv($f, $ar);
    fclose($f);
    return true;
};
$GLOBALS['adicionarFavoritos'] = function($ar){
    $f = fopen($GLOBALS['caminhoFavoritos'], 'a');
    foreach($ar as $favorito){
        fputcsv($f, $favorito);
    }
    fclose($f);
    return true;
};

$GLOBALS['limparFavoritos'] = function(){
    $f = fopen($GLOBALS['caminhoFavoritos'], 'w');
    $campos = array("id", 'fk_usuario', 'fk_video');
    fputcsv($f, $campos);
    fclose($f);
    return true;
};

$GLOBALS['listarFavoritos'] = function(){
    $f = fopen($GLOBALS['caminhoFavoritos'], 'r');
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

function ultimoIdFavorito(){
    if(!file_exists($GLOBALS['caminhoFavoritos'])){
        return "0";
    }else{
        $ultimoId = "0";
        foreach(listarFavoritos() as $favorito){
            $id = $favorito['id'];
            if($id>$ultimoId){
                $ultimoId = $id; 
            }
        }
        return $ultimoId;
    }
}

function adicionarFavorito($fk_usuario, $fk_video){
    if(file_exists($GLOBALS['caminhoFavoritos'])){
        $register_exists = buscarFavorito($fk_usuario, $fk_video) != null;
        if(!$register_exists){
            $id =  ultimoIdFavorito() +1;
            return $GLOBALS['adicionarFavorito'](array($id, $fk_usuario, $fk_video));
        }else{
            return false;
        }
    }else{
        $f = fopen($GLOBALS['caminhoFavoritos'], 'a');
        fclose($f);
        $campos = array("id", 'fk_usuario', 'fk_video');
        $GLOBALS['adicionarFavorito']($campos);
        return $GLOBALS['adicionarFavorito'](array('1', $fk_usuario, $fk_video));
    }
}


function buscarFavorito($fk_usuario, $fk_video){
    if(file_exists($GLOBALS['caminhoFavoritos'])){
        foreach(listarFavoritos() as $favorito){
            if($favorito['fk_usuario'] ==$fk_usuario && $favorito['fk_video'] == $fk_video){
                return $favorito;
            }
        }
        return false;
    }else{
        return false;
    }
}
function buscarFavoritoPorId($id){
    if(file_exists($GLOBALS['caminhoFavoritos'])){
        foreach(listarFavoritos() as $favorito){
            if($favorito['id'] == $id){
                return $favorito;
            }
        }
        return false;
    }else{
        return false;
    }
}

function listarFavoritos(){
    if(file_exists($GLOBALS['caminhoFavoritos'])){
        $retorno = array();
        foreach($GLOBALS['listarFavoritos']() as $linha){
            $retorno[] = array("id" => $linha[0], "fk_usuario" => $linha[1],"fk_video" => $linha[2]);
        }
        return $retorno;
    }else{
        return false;
    }
}
function removerFavorito($id){
    if(file_exists($GLOBALS['caminhoFavoritos'])){
        $registros = $GLOBALS['listarFavoritos']();
        foreach($registros as $indice => $linha){
            if($linha[0] == $id){
                \array_splice($registros, $indice, 1);
                $GLOBALS['limparFavoritos']();
                return $GLOBALS['adicionarFavoritos']($registros);
            }
        }
        return false;
    }else{
        return false;
    }
}

function editarFavorito($id, $fk_usuario, $fk_video){
    if(file_exists($GLOBALS['caminhoFavoritos'])){
        $registros = $GLOBALS['listarFavoritos']();
        foreach($registros as $indice => $linha){
            if($linha[0] == $id){
                $registro = array($id, $fk_usuario, $fk_video);
                $registros[$indice] = $registro;
                $GLOBALS['limparFavoritos']();
                $GLOBALS['adicionarFavoritos']($registros);
                return true;
            }
        }
        return false;
    }else{
        return false;
    }
}

return [
    'adicionarFavorito' => 'adicionarFavorito',
    'listarFavoritos' => 'listarFavoritos', 
    'buscarFavorito' => 'buscarFavorito',
    'buscarFavoritoPorId' => 'buscarFavoritoPorId',
    'removerFavorito' => 'removerFavorito',
    'editarFavorito' => 'editarFavorito',
]
?>