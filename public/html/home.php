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
                    <button class="btn btn-primary">Trending</button>
                    <button class="btn btn-primary">Assistir depois</button>
                    <button class="btn btn-primary">Categorias</button>
                    <button class="btn btn-primary">Favoritos</button>
                </div>
            </div>
        </div>
    </div>

    <!--Sessão-->
    <div class="col-md-10 text-white mx-auto mt-5">
        <h2>Vídeos</h2>
        <div class="row mt-2">
            <div class="d-flex flex-wrap w-100">
                <!--Aplicar laço de repetição php-->

                <?php
                    $videoDao = require '../../back/VideosDAO.php';
                    foreach($videoDao['listarVideos']() as $video){
                        echo "<div class='col-sm-6 col-md-4 col-xl-3'>
                        <a href='video.php?nome=".$video['nome']."&link=".$video['link']."&visualizacoes=".$video['visualizacoes']."' class='card w-100 mt-3'>
                            <div class='card-body'>
                                <div class='card-title font-weight-bold text-center my-auto'>".$video['nome']."</div>
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
        <h2>Assistir Depois</h2>
        <div class="row mt-2">
            <div class="d-flex flex-wrap w-100">
                <!--Aplicar laço de repetição php-->
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

            </div>
        </div>
    </div>

    <!--Sessão-->
    <div class="col-md-10 text-white mx-auto mt-5">
        <h2>Categorias</h2>
        <div class="row mt-2">
            <div class="d-flex flex-wrap w-100">
                <!--Aplicar laço de repetição php-->
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

            </div>
        </div>
    </div>

    <!--Sessão-->
    <div class="col-md-10 text-white mx-auto mt-5">
        <h2>Favoritos</h2>
        <div class="row mt-2">
            <div class="d-flex flex-wrap w-100">
                <!--Aplicar laço de repetição php-->
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

                <div class="col-sm-6 col-md-4 col-xl-3">
                    <img class="w-100 img-fluid rounded my-2" href="" src="../img/filmes/coracaovalente.jpg">
                </div>

            </div>
        </div>
    </div>


</body>

</html>