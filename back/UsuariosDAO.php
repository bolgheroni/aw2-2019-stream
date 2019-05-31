<?php
$GLOBALS['caminhoUsuarios'] = "usuarios.csv";
$GLOBALS['adicionar'] = function($ar){
    $f = fopen($GLOBALS['caminhoUsuarios'], 'a');
    fputcsv($f, $ar);
    fclose($f);
    return true;
};
$GLOBALS['listar'] = function(){
    $f = fopen($GLOBALS['caminhoUsuarios'], 'r');
    $retorno = array();
    while (($linha = fgetcsv($f)) !== FALSE) {
        $retorno[]=$linha;
    }
    fclose($f);
    return $retorno;
};


return [
    'adicionarUsuario' => function($id, $username, $senha, $ehAdm){
        if(file_exists($GLOBALS['caminhoUsuarios'])){
            return $GLOBALS['adicionar'](array($id, $username, $senha, $ehAdm));
        }else{
            $f = fopen($GLOBALS['caminhoUsuarios'], 'a');
            fclose($f);
            $campos = array('id', 'username', 'senha', 'ehAdm');
            $GLOBALS['adicionar']($campos);
            return $GLOBALS['adicionar'](array($id, $username, $senha, $ehAdm));
        }
    },
    'listarUsuarios' => function(){
        if(file_exists($GLOBALS['caminhoUsuarios'])){
            return $GLOBALS['listar']();
        }else{
            return false;
        }
    },
    'buscarUsuarioPorId' => function($id){
        if(file_exists($GLOBALS['caminhoUsuarios'])){
            foreach($GLOBALS['listar']() as $linha){
                if($linha[0] == $id){
                    echo $linha[3];
                    return array("id" => $linha[0], "username", $linha[1], "senha" => $linha[2], "isAdm" => $linha[3]);
                }
            }
            return false;
        }else{
            return false;
        }
    }
]
?>