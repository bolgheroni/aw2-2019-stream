<?php
$GLOBALS['caminhoUsuarios'] = $_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream" . "/back/model/". "usuarios.csv";

$GLOBALS['adicionar'] = function($ar){
    $f = fopen($GLOBALS['caminhoUsuarios'], 'a');
    fputcsv($f, $ar);
    fclose($f);
    return true;
};

$GLOBALS['listar'] = function(){
    $f = fopen($GLOBALS['caminhoUsuarios'], 'r');
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

function adicionar($id, $username, $senha, $ehAdm){
    if(file_exists($GLOBALS['caminhoUsuarios'])){
        $register_exists = buscarPorId($id) != null;
        if(!$register_exists){
            return $GLOBALS['adicionar'](array($id, $username, $senha, $ehAdm));
        }else{
            return false;
        }
    }else{
        $f = fopen($GLOBALS['caminhoUsuarios'], 'a');
        fclose($f);
        $campos = array('id', 'username', 'senha', 'ehAdm');
        $GLOBALS['adicionar']($campos);
        return $GLOBALS['adicionar'](array($id, $username, $senha, $ehAdm));
    }
}

function buscarPorId($id){
    if(file_exists($GLOBALS['caminhoUsuarios'])){
        foreach($GLOBALS['listar']() as $linha){
            if($linha[0] == $id){
                return array("id" => $linha[0], "username", $linha[1], "senha" => $linha[2], "isAdm" => $linha[3]);
            }
        }
        return false;
    }else{
        return false;
    }
}

function listarUsuarios(){
    if(file_exists($GLOBALS['caminhoUsuarios'])){
        return $GLOBALS['listar']();
    }else{
        return false;
    }
}


return [
    'adicionarUsuario' => 'adicionar',
    'listarUsuarios' => 'listarUsuarios', 
    'buscarUsuarioPorId' => 'buscarPorId'
]
?>