<?php  
$userDao = require '../back/UsuariosDAO.php' ;
echo $userDao['adicionarUsuario']('12', "joao", "12345678", 'true') ? 'true':'false' .'<br>';
echo $userDao['adicionarUsuario']('15', "joana", "12345672", 'false') ? 'true':'false'.'<br>';
echo json_encode($userDao['listarUsuarios']()).'<br>';
echo json_encode($userDao['buscarUsuarioPorId'](13)).'<br>';

?>