<?php
$GLOBALS['caminhoUsuarios'] = $_SERVER['DOCUMENT_ROOT']. "/aw2-2019-stream" . "/back/model/". "usuarios.csv";

$GLOBALS['adicionarUsuario'] = function($ar){
    $f = fopen($GLOBALS['caminhoUsuarios'], 'a');
    fputcsv($f, $ar);
    fclose($f);
    return true;
};
$GLOBALS['adicionarUsuarios'] = function($ar){
    $f = fopen($GLOBALS['caminhoUsuarios'], 'a');
    foreach($ar as $usuario){
        fputcsv($f, $usuario);
    }
    fclose($f);
    return true;
};

$GLOBALS['limparUsuarios'] = function(){
    $f = fopen($GLOBALS['caminhoUsuarios'], 'w');
    $campos = array('id', 'email', 'username', 'senha', 'ehAdm');
    fputcsv($f, $campos);
    fclose($f);
    return true;
};

$GLOBALS['listarUsuarios'] = function(){
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

function adicionarUsuario($email, $username, $senha, $ehAdm){
    if(file_exists($GLOBALS['caminhoUsuarios'])){
        $registro_existe = buscarUsuarioPorEmail($email) != null;
        if(!$registro_existe){
            $id = sizeof(listarUsuarios()) +1;
            return $GLOBALS['adicionarUsuario'](array($id,$email, $username, $senha, $ehAdm));
        }else{
            return false;
        }
    }else{
        $f = fopen($GLOBALS['caminhoUsuarios'], 'a');
        fclose($f);
        $campos = array('id','email', 'username', 'senha', 'ehAdm');
        $GLOBALS['adicionarUsuario']($campos);
        return $GLOBALS['adicionarUsuario'](array('1', $email, $username, $senha, $ehAdm));
    }
}

function buscarUsuarioPorId($id){
    if(file_exists($GLOBALS['caminhoUsuarios'])){
        foreach($GLOBALS['listarUsuarios']() as $linha){
            if($linha[0] == $id){
                return array("id" => $linha[0], "email" => $linha[1],"username" => $linha[2], "senha" => $linha[3], "ehAdm" => $linha[4]);
            }
        }
        return false;
    }else{
        return false;
    }
}
function buscarUsuarioPorEmail($email){
    if(file_exists($GLOBALS['caminhoUsuarios'])){
        foreach(listarUsuarios() as $usuario){
            if($usuario['email'] == $email){
                return $usuario;
            }
        }
        return false;
    }else{
        return false;
    }
}

function listarUsuarios(){
    if(file_exists($GLOBALS['caminhoUsuarios'])){
        $retorno = array();
        foreach($GLOBALS['listarUsuarios']() as $linha){
            $retorno[] = array("id" => $linha[0], "email" => $linha[1],"username" => $linha[2], "senha" => $linha[3], "ehAdm" => $linha[4]);
        }
        return $retorno;
    }else{
        return false;
    }
}

function autenticarUsuario($email, $senha){
    if(file_exists($GLOBALS['caminhoUsuarios'])){
        foreach(listarUsuarios() as $usuario){
            if($usuario['email'] == $email && $usuario['senha'] == $senha){
                setcookie('userName', $usuario['username']);                
                setcookie('userId', $usuario['id']);                
                setcookie('userPermission', $usuario['ehAdm']);                
                return $usuario;
            }
        }
        return false;
    }else{
        return false;
    }
}

function adicionarVetorUsuarios($vetor){
    foreach($vetor as $user){
        $registro = array($user['id'], $user['email'], $user['username'], $user['senha'], $user['ehAdm']);
        $retorno = $GLOBALS['adicionarUsuario']($registro);
        if(!$retorno){
            return false;
        }
    }  
    return true;  

}

function removerUsuario($id){
    if(file_exists($GLOBALS['caminhoUsuarios'])){
        $registros = $GLOBALS['listarUsuarios']();
        foreach($registros as $indice => $linha){
            if($linha[0] == $id){
                \array_splice($registros, 1, $indice);
                $GLOBALS['limparUsuarios']();
                return $GLOBALS['adicionarUsuarios']($registros);
            }
        }
        return false;
    }else{
        return false;
    }
}

function editarUsuario($id, $email, $username, $senha, $ehAdm){
    if(file_exists($GLOBALS['caminhoUsuarios'])){
        $registros = $GLOBALS['listarUsuarios']();
        foreach($registros as $indice => $linha){
            if($linha[0] == $id){
                $registro = array($id,$email,$username,$senha,$ehAdm);
                $registros[$indice] = $registro;
                $GLOBALS['limparUsuarios']();
                $GLOBALS['adicionarUsuarios']($registros);
                return true;
            }
        }
        return false;
    }else{
        return false;
    }
}



return [
    'adicionarUsuario' => 'adicionarUsuario',
    'listarUsuarios' => 'listarUsuarios', 
    'buscarUsuarioPorId' => 'buscarUsuarioPorId',
    'autenticarUsuario' => 'autenticarUsuario',
    'editarUsuario' => 'editarUsuario',
]
?>