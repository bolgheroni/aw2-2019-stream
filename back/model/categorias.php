<?php
$GLOBALS['listaCategorias'] = function(){
    return array(
        ['1', "Terror"],
        ['2', "Ação"],
        ['3', "Aventura"],
        ['4', "Comédia"],
        ['5', "Drama"],
        ['6', "Romance"]
    );
};

function categoriaPorId($id){
    foreach($GLOBALS['listaCategorias']() as $categoria){
        if($categoria[0] == $id){
            return $categoria[1];
        }
    }
    return false;
}

return [
    'buscarCategoriaPorId' => 'categoriaPorId'
];

?>