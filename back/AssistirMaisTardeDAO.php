<?php
$GLOBALS['caminhoAssistirMaisTarde'] = $_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream" . "/back/model/". "assistirMaisTarde.csv";

$GLOBALS['adicionarAssistirMaisTarde'] = function($ar){
    $f = fopen($GLOBALS['caminhoAssistirMaisTarde'], 'a');
    fputcsv($f, $ar);
    fclose($f);
    return true;
};
$GLOBALS['adicionarVetorAssistirMaisTarde'] = function($ar){
    $f = fopen($GLOBALS['caminhoAssistirMaisTarde'], 'a');
    foreach($ar as $assistirMaisTarde){
        fputcsv($f, $assistirMaisTarde);
    }
    fclose($f);
    return true;
};

$GLOBALS['limparAssistirMaisTarde'] = function(){
    $f = fopen($GLOBALS['caminhoAssistirMaisTarde'], 'w');
    $campos = array("id", 'fk_usuario', 'fk_video');
    fputcsv($f, $campos);
    fclose($f);
    return true;
};

$GLOBALS['listarAssistirMaisTarde'] = function(){
    $f = fopen($GLOBALS['caminhoAssistirMaisTarde'], 'r');
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

function ultimoIdAssistirMaisTarde(){
    if(!file_exists($GLOBALS['caminhoAssistirMaisTarde'])){
        return "0";
    }else{
        $ultimoId = "0";
        foreach(listarAssistirMaisTarde() as $assistirMaisTarde){
            $id = $assistirMaisTarde['id'];
            if($id>$ultimoId){
                $ultimoId = $id; 
            }
        }
        return $ultimoId;
    }
}

function adicionarAssistirMaisTarde($fk_usuario, $fk_video){
    if(file_exists($GLOBALS['caminhoAssistirMaisTarde'])){
        $register_exists = buscarAssistirMaisTarde($fk_usuario, $fk_video) != null;
        if(!$register_exists){
            $id =  ultimoIdAssistirMaisTarde() +1;
            return $GLOBALS['adicionarAssistirMaisTarde'](array($id, $fk_usuario, $fk_video));
        }else{
            return false;
        }
    }else{
        $f = fopen($GLOBALS['caminhoAssistirMaisTarde'], 'a');
        fclose($f);
        $campos = array("id", 'fk_usuario', 'fk_video');
        $GLOBALS['adicionarAssistirMaisTarde']($campos);
        return $GLOBALS['adicionarAssistirMaisTarde'](array('1', $fk_usuario, $fk_video));
    }
}


function buscarAssistirMaisTarde($fk_usuario, $fk_video){
    if(file_exists($GLOBALS['caminhoAssistirMaisTarde'])){
        foreach(listarAssistirMaisTarde() as $assistirMaisTarde){
            if($assistirMaisTarde['fk_usuario'] ==$fk_usuario && $assistirMaisTarde['fk_video'] == $fk_video){
                return $assistirMaisTarde;
            }
        }
        return false;
    }else{
        return false;
    }
}
function buscarAssistirMaisTardePorId($id){
    if(file_exists($GLOBALS['caminhoAssistirMaisTarde'])){
        foreach(listarAssistirMaisTarde() as $assistirMaisTarde){
            if($assistirMaisTarde['id'] == $id){
                return $assistirMaisTarde;
            }
        }
        return false;
    }else{
        return false;
    }
}

function listarAssistirMaisTarde(){
    if(file_exists($GLOBALS['caminhoAssistirMaisTarde'])){
        $retorno = array();
        foreach($GLOBALS['listarAssistirMaisTarde']() as $linha){
            $retorno[] = array("id" => $linha[0], "fk_usuario" => $linha[1],"fk_video" => $linha[2]);
        }
        return $retorno;
    }else{
        return false;
    }
}
function removerAssistirMaisTarde($id){
    if(file_exists($GLOBALS['caminhoAssistirMaisTarde'])){
        $registros = $GLOBALS['listarAssistirMaisTarde']();
        foreach($registros as $indice => $linha){
            if($linha[0] == $id){
                \array_splice($registros, $indice, 1);
                $GLOBALS['limparAssistirMaisTarde']();
                return $GLOBALS['adicionarVetorAssistirMaisTarde']($registros);
            }
        }
        return false;
    }else{
        return false;
    }
}

function editarAssistirMaisTarde($id, $fk_usuario, $fk_video){
    if(file_exists($GLOBALS['caminhoAssistirMaisTarde'])){
        $registros = $GLOBALS['listarAssistirMaisTarde']();
        foreach($registros as $indice => $linha){
            if($linha[0] == $id){
                $registro = array($id, $fk_usuario, $fk_video);
                $registros[$indice] = $registro;
                $GLOBALS['limparAssistirMaisTarde']();
                $GLOBALS['adicionarVetorAssistirMaisTarde']($registros);
                return true;
            }
        }
        return false;
    }else{
        return false;
    }
}

return [
    'adicionarAssistirMaisTarde' => 'adicionarAssistirMaisTarde',
    'listarAssistirMaisTarde' => 'listarAssistirMaisTarde', 
    'buscarAssistirMaisTarde' => 'buscarAssistirMaisTarde',
    'buscarAssistirMaisTardePorId' => 'buscarAssistirMaisTardePorId',
    'removerAssistirMaisTarde' => 'removerAssistirMaisTarde',
    'editarAssistirMaisTarde' => 'editarAssistirMaisTarde',
]
?>