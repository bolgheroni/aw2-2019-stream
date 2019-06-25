<!DOCTYPE html>
<html lang="en">

<?php
    $videosDao = require '../../back/VideosDAO.php';
    $videosDao['adicionarVisualizacao']($_GET['idVideo']); 
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Fetnlix - <?php echo $_GET["nome"]; ?></title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
</head>

<body style="background-image: linear-gradient(to right, rgb(0, 12, 31), rgba(14, 62, 140))">

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-sm-12 mx-auto text-center">
                <h1 class="my-3 mb-5 text-white"><?php echo $_GET["nome"]; ?></h1>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src=<?php echo $_GET["link"]; ?> allowfullscreen></iframe>
                </div>
                <div class="d-md-flex flex-row">
                    <div class="col-md-6">
                        <div class="btn-group mt-5 d-flex flex-row" role="group" aria-label="Basic example">
                            <button onclick="adicionarFavorito()" type="button" class="btn btn-outline-primary text-white">Favorito</button>
                            <button type="button" class="btn btn-outline-primary text-white">Assistir mais tarde</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-white mt-5">Visualizações: <?php echo $_GET["visualizacoes"]; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function adicionarFavorito(){
            <?php 
                $favoritoDao = require '../../back/FavoritosDAO.php';
                $favoritoDao['adicionarFavorito']($_COOKIE['userId'], $_GET['idVideo']);    
            ?>
        }

        function adicionarFavorito(){
            <?php 
                $assistirMaisTardeDao = require '../../back/AssistirMaisTardeDAO.php';
                $assistirMaisTardeDao['adicionarAssistirMaisTarde']($_COOKIE['userId'], $_GET['idVideo']);    
            ?>
        }
    </script>
</body>

</html>