<!DOCTYPE html>
<html lang="en">
<?php
$usuarioDao = require '../../back/UsuariosDAO.php';
$videoDao = require '../../back/VideosDAO.php';
$assistirDao = require '../../back/AssistirMaisTardeDAO.php';
$categoriaDao = require '../../back/model/categorias.php';
$favoritosDao = require '../../back/FavoritosDAO.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Fetnlix - Home</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
</head>

<body style="background-image: linear-gradient(to right, rgb(0, 12, 31), rgba(14, 62, 140))">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 col-md-10 col-lg-8 mx-auto">
                <div class="d-flex justify-content-around">
                    <!--Aplicar laço de repetição php-->
                    <a class="btn btn-primary" href="#videos">Vídeos</a>
                    <a class="btn btn-primary" href="#assistirdepois">Assistir depois</a>
                    <a class="btn btn-primary" href="#categoriasDiv">Categorias</a>
                    <a class="btn btn-primary" href="#favoritos">Favoritos</a>
                    <?php

                    $usuario = $usuarioDao['buscarUsuarioPorId']($_COOKIE['userId']);
                    if ($usuario != false) {
                        if ($usuario['ehAdm'] == true) {
                            echo "<a class='btn btn-primary' href='admin.php'>Admin</a>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!--Sessão-->
    <div class="col-md-10 text-white mx-auto mt-5">
        <h2 id="videos">Vídeos</h2>
        <div class="row mt-2">
            <div class="d-flex flex-wrap w-100">

                <?php
                if (count($videoDao['listarVideos']()) == 0) {
                    echo "<p class='text-white ml-5'>Não há vídeos ainda</p>";
                } else {
                    foreach ($videoDao['listarVideos']() as $video) {
                        echo "<div class='col-sm-6 col-md-4 col-xl-3'>
                        <a href='video.php?nome=" . $video['nome'] . "&link=" . $video['link'] . "&visualizacoes=" . $video['visualizacoes'] . "&idVideo=" . $video['id'] . "' class='card w-100 mt-3'>
                            <div class='card-body'>
                                <div class='card-title font-weight-bold text-center my-auto'>" . $video['nome'] . "</div>
                            </div>
                        </a>
                    </div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!--Sessão-->
    <div class="col-md-10 text-white mx-auto mt-5">
        <h2 id="assistirdepois">Assistir mais tarde</h2>
        <div class="row mt-2">
            <div class="d-flex flex-wrap w-100">

                <?php

                $existeAssistir = false;
                $assitirListados = array();

                foreach ($assistirDao['listarAssistirMaisTarde']() as $video) {
                    if ($video['fk_usuario'] == $_COOKIE['userId']) {
                        $existeAssistir = true;
                        $assistirListados[] = $video['fk_video'];
                    }
                }

                if ($existeAssistir == true) {
                    foreach ($assistirListados as $idVideo) {
                        $video = $videoDao['buscarVideoPorId']($idVideo);
                        echo "<div class='col-sm-6 col-md-4 col-xl-3'>
                            <a href='video.php?nome=" . $video['nome'] . "&link=" . $video['link'] . "&visualizacoes=" . $video['visualizacoes'] . "&idVideo=" . $video['id'] . "' class='card w-100 mt-3'>
                                <div class='card-body'>
                                    <div class='card-title font-weight-bold text-center my-auto'>" . $video['nome'] . "</div>
                                </div>
                            </a>
                        </div>";
                    }
                } else {
                    echo "<p class='text-white ml-5'>Não há vídeos para Assistir mais tarde</p>";
                }
                ?>

            </div>
        </div>
    </div>

    <!--Sessão-->

    <?php

    for ($i = 1; $i <= 6; $i++) {

        echo "<div class='col-md-10 text-white mx-auto mt-5'>
        <h2>" . $categoriaDao['buscarCategoriaPorId']($i) . "</h2>
        <div class='row mt-2'>
            <div class='d-flex flex-wrap w-100'>";


        if (count($videoDao['videosPorCategoria']($i)) == 0) {
            echo "<p class='text-white ml-5'>Não há vídeos nessa categoria ainda</p>";
        } else {
            foreach ($videoDao['videosPorCategoria']($i) as $video) {
                echo "<div class='col-sm-6 col-md-4 col-xl-3'>
                            <a href='video.php?nome=" . $video['nome'] . "&link=" . $video['link'] . "&visualizacoes=" . $video['visualizacoes'] . "&idVideo=" . $video['id'] . "' class='card w-100 mt-3'>
                                <div class='card-body'>
                                    <div class='card-title font-weight-bold text-center my-auto'>" . $video['nome'] . "</div>
                                </div>
                            </a>
                        </div>";
            }
        }

        echo "
            </div>
        </div>
    </div>";
    }
    ?>


    <!--Sessão-->
    <div class="col-md-10 text-white mx-auto mt-5">
        <h2 id="favoritos">Favoritos</h2>
        <div class="row mt-2">
            <div class="d-flex flex-wrap w-100">

                <?php

                $existeFavoritos = false;
                $favoritosListados = array();

                foreach ($favoritosDao['listarFavoritos']() as $video) {
                    if ($video['fk_usuario'] == $_COOKIE['userId']) {
                        $existeFavoritos = true;
                        $favoritosListados[] = $video['fk_video'];
                    }
                }

                if ($existeFavoritos == true) {
                    foreach ($favoritosListados as $idVideo) {
                        $video = $videoDao['buscarVideoPorId']($idVideo);
                        echo "<div class='col-sm-6 col-md-4 col-xl-3'>
                            <a href='video.php?nome=" . $video['nome'] . "&link=" . $video['link'] . "&visualizacoes=" . $video['visualizacoes'] . "&idVideo=" . $video['id'] . "' class='card w-100 mt-3'>
                                <div class='card-body'>
                                    <div class='card-title font-weight-bold text-center my-auto'>" . $video['nome'] . "</div>
                                </div>
                            </a>
                        </div>";
                    }
                } else {
                    echo "<p class='text-white ml-5'>Não há vídeos para Assistir mais tarde</p>";
                }


                ?>

            </div>
        </div>
    </div>


</body>

</html>