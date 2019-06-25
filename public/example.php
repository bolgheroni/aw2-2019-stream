<?php  
$userDao = require '../back/UsuariosDAO.php' ;
$videosDao = require '../back/VideosDAO.php' ;
$favoritosDao = require '../back/FavoritosDAO.php' ;
$assistirMaisTardeDao = require '../back/AssistirMaisTardeDAO.php' ;

echo "USUARIOS <br><br>";
echo "ADICIONAR <br>";
echo $userDao['adicionarUsuario']("joao@gmail.com", "joao", "12345678", 'true') ? 'true':'false' .'<br>';
echo $userDao['adicionarUsuario']("joana@gmail.com", "joana", "12345672", 'false') ? 'true':'false'.'<br>';
echo "LISTAR <br>";
echo json_encode($userDao['listarUsuarios']()).'<br>';
echo "BUSCAR <br>";
echo json_encode($userDao['buscarUsuarioPorId']("1")).'<br>';
echo "<br>";
echo "EDITAR <br>";
echo json_encode($userDao['editarUsuario']("1","joaoooo@gmail.com", "joao", "12345678", 'true' )).'<br>';
echo "<br>";
echo "RESULTADO EDICAO <br>";
echo json_encode($userDao['buscarUsuarioPorId']("1")).'<br>';
echo "<br>";
echo "REMOVER <br>";
echo json_encode($userDao['removerUsuario']("2")).'<br>';
echo "<br>";
echo "RESULTADO REMOCAO <br>";
echo json_encode($userDao['listarUsuarios']()).'<br>';
echo "<br>";
echo "AUTENTICAR <br>";
echo json_encode($userDao['autenticarUsuario']('joao@gmail.com', "12345678")).'<br>';
echo json_encode($userDao['autenticarUsuario']('joao@gmail.com', "12345671")).'<br>';
echo "<br>";
echo "DESAUTENTICAR <br>";
echo json_encode($userDao['desautenticarUsuario']()).'<br>';

echo "<br><br>VIDEOS <br><br>";
echo "ADICIONAR <br>";
echo $videosDao['adicionarVideo']("Lá vem o Mmarcos", "https://www.youtube.com/watch?v=yazkNHqoyZ8", '2', "4") ? 'true':'false';
echo "<br>";
echo $videosDao['adicionarVideo']("Hitman Absolution Trailer", "https://www.youtube.com/watch?v=fFZRszQuDjI", '0', "2") ? 'true':'false';
echo "<br>";
echo "LISTAR <br>";
echo json_encode($videosDao['listarVideos']()).'<br>';
echo "<br>";
echo "BUSCAR <br>";
echo json_encode($videosDao['buscarVideoPorId']('13')).'<br>';
echo "<br>";
echo "EDITAR <br>";
echo json_encode($videosDao['editarVideo']("1","Lá vem o Marcos", "https://www.youtube.com/watch?v=yazkNHqoyZ8", '0', "4")).'<br>';
echo "<br>";
echo "RESULTADO EDICAO <br>";
echo json_encode($videosDao['buscarVideoPorId']("1")).'<br>';
echo "<br>";
echo "REMOVER <br>";
echo json_encode($videosDao['removerVideo']("1")).'<br>';
echo "<br>";
echo "RESULTADO REMOCAO <br>";
echo json_encode($videosDao['listarVideos']()).'<br>';
echo "<br>";
echo "VIDEOS POR CATEGORIA <br>";
echo json_encode($videosDao['videosPorCategoria']("2")).'<br>';
echo "<br>";
echo "VISUALIZAÇÕES POR CATEGORIA <br>";
echo json_encode($videosDao['visualizacoesPorCategoria']("4")).'<br>';
echo "<br>";
echo "<br>";
echo "ADICIONAR VISUALIZAÇÃO <br>";
echo json_encode($videosDao['adicionarVisualizacao']("3")).'<br>';
echo "<br>";
echo "RESULTADO ADIÇÃO <br>";
echo json_encode($videosDao['buscarVideoPorId']("3")).'<br>';
echo "<br>";


echo "<br><br>FAVORITOS <br><br>";
echo "ADICIONAR <br>";
echo $favoritosDao['adicionarFavorito']("2", "1") ? 'true':'false';
echo "<br>";
echo $favoritosDao['adicionarFavorito']("1", "1") ? 'true':'false';
echo "<br>";
echo "LISTAR <br>";
echo json_encode($favoritosDao['listarFavoritos']()).'<br>';
echo "<br>";
echo "BUSCAR <br>";
echo json_encode($favoritosDao['buscarFavoritoPorId']('1')).'<br>';
echo json_encode($favoritosDao['buscarFavorito']('1', '1')).'<br>';
echo "<br>";
echo "EDITAR <br>";
echo json_encode($favoritosDao['editarFavorito']("1","1", "2")).'<br>';
echo "<br>";
echo "RESULTADO EDICAO <br>";
echo json_encode($favoritosDao['buscarFavoritoPorId']("1")).'<br>';
echo "<br>";
echo "REMOVER <br>";
echo json_encode($favoritosDao['removerFavorito']("1")).'<br>';
echo "<br>";
echo "RESULTADO REMOCAO <br>";
echo json_encode($favoritosDao['listarFavoritos']()).'<br>';
echo "<br>";


echo "<br><br>ASSISTIR MAIS TARDE <br><br>";
echo "ADICIONAR <br>";
echo $assistirMaisTardeDao['adicionarAssistirMaisTarde']("2", "1") ? 'true':'false';
echo "<br>";
echo $assistirMaisTardeDao['adicionarAssistirMaisTarde']("1", "1") ? 'true':'false';
echo "<br>";
echo "LISTAR <br>";
echo json_encode($assistirMaisTardeDao['listarAssistirMaisTarde']()).'<br>';
echo "<br>";
echo "BUSCAR <br>";
echo json_encode($assistirMaisTardeDao['buscarAssistirMaisTardePorId']('1')).'<br>';
echo json_encode($assistirMaisTardeDao['buscarAssistirMaisTarde']('1', '1')).'<br>';
echo "<br>";
echo "EDITAR <br>";
echo json_encode($assistirMaisTardeDao['editarAssistirMaisTarde']("1","1", "2")).'<br>';
echo "<br>";
echo "RESULTADO EDICAO <br>";
echo json_encode($assistirMaisTardeDao['buscarAssistirMaisTardePorId']("1")).'<br>';
echo "<br>";
echo "REMOVER <br>";
echo json_encode($assistirMaisTardeDao['removerAssistirMaisTarde']("1")).'<br>';
echo "<br>";
echo "RESULTADO REMOCAO <br>";
echo json_encode($assistirMaisTardeDao['listarAssistirMaisTarde']()).'<br>';
echo "<br>";

?>