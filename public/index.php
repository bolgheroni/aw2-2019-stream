<?php  
$userDao = require '../back/UsuariosDAO.php' ;
$videosDao = require '../back/VideosDAO.php' ;

echo "USUARIOS <br><br>";
echo "ADICIONAR <br>";
echo $userDao['adicionarUsuario']('12', "joao@gmail.com", "joao", "12345678", 'true') ? 'true':'false' .'<br>';
echo $userDao['adicionarUsuario']('15', "joana@gmail.com", "joana", "12345672", 'false') ? 'true':'false'.'<br>';
echo "LISTAR <br>";
echo json_encode($userDao['listarUsuarios']()).'<br>';
echo "BUSCAR <br>";
echo json_encode($userDao['buscarUsuarioPorId'](13)).'<br>';
echo "<br>";
echo "AUTENTICAR <br>";
echo json_encode($userDao['autenticarUsuario']('joao@gmail.com', "12345678")).'<br>';
echo json_encode($userDao['autenticarUsuario']('joao@gmail.com', "12345671")).'<br>';

echo "VIDEOS <br><br>";
echo "ADICIONAR <br>";
echo $videosDao['adicionarVideo']('12', "Lá vem o Mmarcos", "https://www.youtube.com/watch?v=yazkNHqoyZ8", '0', "4") ? 'true':'false';
echo "<br>";
echo $videosDao['adicionarVideo']('15', "Hitman Absolution Trailer", "https://www.youtube.com/watch?v=fFZRszQuDjI", '0', "2") ? 'true':'false';
echo "<br>";
echo "LISTAR <br>";
echo json_encode($videosDao['listarVideos']()).'<br>';
echo "BUSCAR <br>";
echo json_encode($videosDao['buscarVideoPorId']('13')).'<br>';


?>