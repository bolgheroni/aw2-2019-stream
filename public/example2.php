<?php  
echo 'aasas';
require "../back/DAO/UsuarioDAO.php";
//usuarios

$usuarioDao = new UsuarioDAO();
//listagem
echo '<br>'.'<br>'.'Listagem'.'<br>'.'<br>';
echo json_encode($usuarioDao->listarUsuarios()).'<br>';
//registro
echo '<br>'.'<br>'.'Registro'.'<br>'.'<br>';
$usuarioNovo = new Usuario(0,  'Hugolas', 'hugolaz@gmail.com', 'hugo1234', true);
$usuarioDao->adicionarUsuario($usuarioNovo);
echo '<br>'.json_encode($usuarioDao->listarUsuarios()).'<br>';

//pesquisa
echo '<br>'.'<br>'.'Pesquisa'.'<br>'.'<br>';
$searchedUser = $usuarioDao->buscarUsuarioPorEmail('hugolaz@gmail.com');
echo json_encode($searchedUser).'<br>';
//update
echo '<br>'.'<br>'.'Update'.'<br>'.'<br>';
//mude qualquer um dos parametros aqui para ver a mudança
$searchedUser = new Usuario($searchedUser['id'], 'heguita','hugoleta@gmail.com',$searchedUser['senha'],$searchedUser['ehAdm'] );
echo $usuarioDao->editarUsuario($searchedUser).'<br>';
echo json_encode($usuarioDao->listarUsuarios()).'<br>';

//autenticacao
echo '<br>'.'<br>'.'Autenticacao'.'<br>'.'<br>';
$username = $searchedUser->getUsername(); //valor de username inserido pelo usuario
$senha = $searchedUser->getSenha(); //valor da senha inserido pelo usuario
//o servidor vai buscar essa combinacao,,, se achar, agora tem que colocar o resultado
// no localstorage e redirecionar o cara pra pagina principal
$resultado = $usuarioDao->autenticarUsuario($username, $senha);
echo json_encode($resultado).'<br>';
//delete
echo '<br>'.'<br>'.'Delete'.'<br>'.'<br>';
echo $usuarioDao->removerUsuario($searchedUser->getId()).'<br>';
echo json_encode($usuarioDao->listarUsuarios()).'<br>'.'<br>';

?>