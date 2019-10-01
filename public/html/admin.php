<?php
require '../../back/DAO/VideoDAO.php';
$videoDao = new VideoDAO();

$terror = $videoDao->visualizacoesPorCategoria(1);
$acao = $videoDao->visualizacoesPorCategoria(2);
$aventura = $videoDao->visualizacoesPorCategoria(3);
$comedia = $videoDao->visualizacoesPorCategoria(4);
$drama = $videoDao->visualizacoesPorCategoria(5);
$romance = $videoDao->visualizacoesPorCategoria(6);

$dataPoints = array(
    array("label" => "Terror", "y" => $terror),
    array("label" => "Ação", "y" => $acao),
    array("label" => "Aventura", "y" => $aventura),
    array("label" => "Comédia", "y" => $comedia),
    array("label" => "Drama", "y" => $drama),
    array("label" => "Romance", "y" => $romance)
)

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <script>
        window.onload = function() {


            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                backgroundColor: "transparent",

                legend: {
                    fontColor: "white",
                },


                data: [{
                    type: "pie",
                    indexLabel: "{y}",
                    yValueFormatString: "#0\"Views\"",
                    indexLabelPlacement: "inside",
                    indexLabelFontColor: "#36454F",
                    indexLabelFontSize: 18,
                    indexLabelFontWeight: "bolder",
                    showInLegend: true,
                    legendText: "{label}",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Fetnlix - Administrador</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
</head>

<body style="background-image: linear-gradient(to right, rgb(0, 12, 31), rgba(14, 62, 140))">
    <!-- Se vira ae totozo -->
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-md-6 mx-auto text-center">
                <div class=" text-center mx-auto text-light">
                    <a class="btn btn-outline-primary text-white w-100" href="home.php">Voltar a home</a>
                    <img width="35%" class="mt-5" src="../img/logo.png">
                    <h1 class="mt-4 mb-4">Cadastrar vídeo</h1>
                </div>
                <form id="cadastroVideo" method="post" action="admin.php">

                    <?php
                    if (!$_POST) {
                        echo "<div class='form-group mx-auto text-center'>
                        <input type='text' class='form-control mt-5 mb-3' name='nome' placeholder='Nome do Vídeo'>
                        <input type='text' class='form-control mb-3' name='link' placeholder='Link do vídeo'>

                        <div class='form-group'>
                        <select class='form-control' name='categoria'>";

                        require '../../back/model/categorias.php';
                        $categoriaDao = new CategoriaDAO(); 
                        for ($i = 1; $i <= 6; $i++) {
                            echo "<option value=" . $i . ">" . $categoriaDao['buscarCategoriaPorId']($i) . "</option>";
                        }
                        echo "</select></div>";
                        echo "<button type='submit' class='text-white btn btn-outline-primary w-100'>Cadastrar Vídeo</button>
                        </div>";
                    } else {
                        require '../../back/DAO/VideoDAO.php';
                        $videoDao = new VideoDAO();
                        if (
                            !(is_null($_POST['nome']) || is_null($_POST['link']) || is_null($_POST['categoria']))
                            && $videoDao->adicionarVideo($_POST['nome'], $_POST['link'], 0, $_POST['categoria'])
                        ) {
                            echo "<div class='form-group mx-auto text-center'>
                            <input type='text' class='form-control mt-5 mb-3' name='nome' placeholder='Nome do Vídeo'>
                            <input type='text' class='form-control mb-3' name='link' placeholder='Link do vídeo'>
  
                            <div class='form-group'>
                            <select class='form-control' name='categoria'>";

                            require '../../back/DAO/CategoriaDAO.php';
                            $categoriaDao = new CategoriaDAO();
                            for ($i = 1; $i <= 6; $i++) {
                                echo "<option value=" . $i . ">" . $categoriaDao->buscarCategoriaPorId($i)['name'] . "</option>";
                            }
                            echo "</div>";
                            echo "<button type='submit' class='text-white btn btn-outline-primary w-100'>Cadastrar Vídeo</button>
                            </div>";

                            echo "<p class='text-primary mt-3'>Vídeo cadastrado ;)</p>";
                        } else {
                            echo "<div class='form-group mx-auto text-center'>
                            <input type='text' class='form-control mt-5 mb-3' name='nome' placeholder='Nome do Vídeo'>
                            <input type='text' class='form-control mb-3' name='link' placeholder='Link do vídeo'>
  
                            <div class='form-group'>
                            <select class='form-control' name='categoria'>";

                            require '../../back/model/categorias.php';
                            $categoriaDao = new CategoriaDAO();
                            for ($i = 1; $i <= 6; $i++) {
                                echo "<option value=" . $i . ">" . $categoriaDao->buscarCategoriaPorId($i)['name'] . "</option>";
                            }
                            echo "</div>";
                            echo "<button type='submit' class='text-white btn btn-outline-primary w-100'>Cadastrar Vídeo</button>
                            </div>";

                            echo "<p class='text-danter mt-3'>Complete o formulário corretamente</p>";
                        }
                    }
                    ?>
                </form>

                <!-- ----------------------------------------------------------------------- -->
                <!-- -------------------------Nomeação de Admin----------------------------- -->
                <!-- ----------------------------------------------------------------------- -->
                <div class=" text-center mx-auto text-light">
                    <h1 class="mt-4 mb-4">Nomeie outro Administrador</h1>
                </div>

                <form id="admin" method="post" action="admin.php">

                    <?php
                    if (!$_POST) {
                        echo "<div class='form-group mx-auto text-center'>
                            <input type='email' class='form-control mt-5 mb-3' name='user' placeholder='E-mail do novo administrador'>
                            <button type='submit' class='text-white btn btn-outline-primary w-100'>Cadastrar</button>
                            </div>";
                    } else {
                        require '../../back/DAO/UsuarioDAO.php';
                        $userDao = new UsuarioDAO(); 
                        if (!(is_null($_POST['email']))) {
                            if ($userDao->buscarUsuarioPorEmail($_POST['email']) != false) {
                                $usuario = $userDao->buscarUsuarioPorEmail($_POST['email']);
                                $userDao->editarUsuario($usuario['id'], $usuario['email'], $usuario['username'], $usuario['senha'], true);
                                echo "<div class='form-group mx-auto text-center'>
                                    <input type='email' class='form-control mt-5 mb-3' name='user' placeholder='E-mail do novo administrador'>
                                    <button type='submit' class='text-white btn btn-outline-primary w-100'>Cadastrar</button>
                                    <p class='text-primary mt-3'>O usuário indicado agora é administrador ;)</p>
                                    </div>
                                    ";
                            } else {
                                echo "<div class='form-group mx-auto text-center'>
                                    <input type='email' class='form-control mt-5 mb-3' name='user' placeholder='E-mail do novo administrador'>
                                    <button type='submit' class='text-white btn btn-outline-primary w-100'>Cadastrar</button>
                                    <p class='text-danger mt-3'>E-mail não existe</p>
                                    </div>
                                    ";
                            }
                        } else {
                            echo "<div class='form-group mx-auto text-center'>
                                <input type='email' class='form-control mt-5 mb-3' name='user' placeholder='E-mail do novo administrador'>
                                <button type='submit' class='text-white btn btn-outline-primary w-100'>Cadastrar</button>
                                <p class='text-danger mt-3'>Preencha o formulário corretamente</p>
                                </div>
                                ";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <div class=" text-center mx-auto text-light">
        <h1 class="mt-4 mb-4">Visualizações por Categoria</h1>
    </div>
    <div id="chartContainer" class="mb-4"></div>
</body>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</html>