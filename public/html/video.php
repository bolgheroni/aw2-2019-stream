<!DOCTYPE html>
<html lang="en">


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
                            <button onclick="adicionarAssistirMaisTarde()" type="button" class="btn btn-outline-primary text-white">Assistir mais tarde</button>
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
                require_once '../../back/DAO/FavoritoDAO.php';
                require_once '../../back/model/Favorito.php';
                echo $_COOKIE['userId'].",";
                echo $_GET['idVideo'];
                $favorito = new Favorito($_COOKIE['userId'], $_GET['idVideo']);
                $favoritoDao = new FavoritoDAO();
                $favoritoDao->adicionarFavorito($favorito);  
            ?>
        }

        function adicionarAssistirMaisTarde(){
            <?php 
                require_once '../../back/DAO/AssitirMaisTardeDAO.php';
                require_once '../../back/model/AssistirMaisTarde.php';
                $assistir = new AssistirMaisTarde($_COOKIE['userId'], $_GET['idVideo']);
                $assistirDao = new AssistirMaisTardeDAO();
                $assistirDao->adicionarAssistirMaisTarde($assistir);    
            ?>
        }
    </script>
</body>

</html>