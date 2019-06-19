<?php  
$userDao = require '../back/UsuariosDAO.php' ;
$videosDao = require '../back/VideosDAO.php' ;

echo "USUARIOS <br><br>";
echo $userDao['adicionarUsuario']("joao@gmail.com", "joao", "12345678", 'true') ? 'true':'false' .'<br>';
echo $userDao['adicionarUsuario']("joana@gmail.com", "joana", "12345672", 'false') ? 'true':'false'.'<br>';
echo json_encode($userDao['listarUsuarios']()).'<br>';
echo json_encode($userDao['buscarUsuarioPorId']('1')).'<br>';
echo "<br>";
echo json_encode($userDao['autenticarUsuario']('joao@gmail.com', "12345678")).'<br>';
echo json_encode($userDao['autenticarUsuario']('joao@gmail.com', "12345671")).'<br>';
echo "<br>";
echo $userDao['editarUsuario']('1',"joaoao@gmail.com", "joao", "12345678", 'true') ? 'true':'false' .'<br>';
echo json_encode($userDao['listarUsuarios']()).'<br>';



echo "VIDEOS <br><br>";
echo $videosDao['adicionarVideo']("Lá vem o Mmarcos", "https://www.youtube.com/watch?v=yazkNHqoyZ8", '0', "4") ? 'true':'false';
echo "<br>";
echo $videosDao['adicionarVideo']("Hitman Absolution Trailer", "https://www.youtube.com/watch?v=fFZRszQuDjI", '0', "2") ? 'true':'false';
echo "<br>";
echo json_encode($videosDao['listarVideos']()).'<br>';
echo json_encode($videosDao['buscarVideoPorId']('12')).'<br>';


?>