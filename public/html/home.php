<!DOCTYPE html>
<html lang="en">

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
            <div class="col-sm-12 col-md-8 col-lg-6 mx-auto">
                <div class="d-flex justify-content-around">
                    <!--Aplicar laço de repetição php-->
                    <a class="btn btn-primary" href="#videos">Vídeos</a>
                    <a class="btn btn-primary" href="#assistirdepois">Assistir depois</a>
                    <a class="btn btn-primary" href="#categoriasDiv">Categorias</a>
                    <a class="btn btn-primary" href="#favoritos">Favoritos</a>
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
                $videoDao = require '../../back/VideosDAO.php';
                foreach ($videoDao['listarVideos']() as $video) {
                    echo "<div class='col-sm-6 col-md-4 col-xl-3'>
                        <a href='video.php?nome=" . $video['nome'] . "&link=" . $video['link'] . "&visualizacoes=" . $video['visualizacoes'] . "' class='card w-100 mt-3'>
                            <div class='card-body'>
                                <div class='card-title font-weight-bold text-center my-auto'>" . $video['nome'] . "</div>
                            </div>
                        </a>
                    </div>";
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
                $assistirDao = require '../../back/AssistirMaisTardeDAO.php';
                foreach ($assistirDao['listarAssistirMaisTarde']() as $video) {
                    if ($video['fk_usuario'] == $_COOKIE['userId']) {
                        echo "<div class='col-sm-6 col-md-4 col-xl-3'>
                            <a href='video.php?nome=" . $video['nome'] . "&link=" . $video['link'] . "&visualizacoes=" . $video['visualizacoes'] . "' class='card w-100 mt-3'>
                                <div class='card-body'>
                                    <div class='card-title font-weight-bold text-center my-auto'>" . $video['nome'] . "</div>
                                </div>
                            </a>
                        </div>";
                    } else {
                        continue;
                    }
                }
                ?>

            </div>
        </div>
    </div>

    <!--Sessão-->

    <?php
    $categoriaDao = require '../../back/model/categorias.php';
    for ($i = 1; $i <= 6; $i++) {

        echo "<div class='col-md-10 text-white mx-auto mt-5'>
        <h2>" . $categoriaDao['buscarCategoriaPorId']($i) . "</h2>
        <div class='row mt-2'>
            <div class='d-flex flex-wrap w-100'>";

        $videoDao = require '../../back/VideosDAO.php';
        foreach ($videoDao['videosPorCategoria']($i) as $video) {
            echo "<div class='col-sm-6 col-md-4 col-xl-3'>
                            <a href='video.php?nome=" . $video['nome'] . "&link=" . $video['link'] . "&visualizacoes=" . $video['visualizacoes'] . "' class='card w-100 mt-3'>
                                <div class='card-body'>
                                    <div class='card-title font-weight-bold text-center my-auto'>" . $video['nome'] . "</div>
                                </div>
                            </a>
                        </div>";
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
                $favoritosDao = require '../../back/FavoritosDAO.php';
                foreach ($favoritosDao['listarFavoritos']() as $video) {
                    if ($video['fk_usuario'] == $_COOKIE['userId']) {
                        echo "<div class='col-sm-6 col-md-4 col-xl-3'>
                            <a href='video.php?nome=" . $video['nome'] . "&link=" . $video['link'] . "&visualizacoes=" . $video['visualizacoes'] . "' class='card w-100 mt-3'>
                                <div class='card-body'>
                                    <div class='card-title font-weight-bold text-center my-auto'>" . $video['nome'] . "</div>
                                </div>
                            </a>
                        </div>";
                    } else {
                        continue;
                    }
                }
                ?>

            </div>
        </div>
    </div>


</body>

</html>