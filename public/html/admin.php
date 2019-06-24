<!DOCTYPE html>
<html lang="en">

<head>

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

                        $categoriaDao = require '../../back/model/categorias.php';
                        for ($i = 1; $i <= 6; $i++) {
                            echo "<option value=" . $i . ">" . $categoriaDao['buscarCategoriaPorId']($i) . "</option>";
                        }
                        echo "</div>";
                        echo "<button type='submit' class='text-white btn btn-outline-primary w-100'>Cadastrar Vídeo</button>
          </div>";
                    } else {
                        $videoDao = require '../../back/VideosDAO.php';
                        if (
                            !(is_null($_POST['nome']) || is_null($_POST['link']) || is_null($_POST['categoria']))
                            && $videoDao['adicionarVideo']($_POST['nome'], $_POST['link'], 0, $_POST['categoria'])
                        ) {
                            echo "<div class='form-group mx-auto text-center'>
                <input type='text' class='form-control mt-5 mb-3' name='nome' placeholder='Nome do Vídeo'>
                <input type='text' class='form-control mb-3' name='link' placeholder='Link do vídeo'>
  
                <div class='form-group'>
                <select class='form-control' name='categoria'>";

                            $categoriaDao = require '../../back/model/categorias.php';
                            for ($i = 1; $i <= 6; $i++) {
                                echo "<option value=" . $i . ">" . $categoriaDao['buscarCategoriaPorId']($i) . "</option>";
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

                            $categoriaDao = require '../../back/model/categorias.php';
                            for ($i = 1; $i <= 6; $i++) {
                                echo "<option value=" . $i . ">" . $categoriaDao['buscarCategoriaPorId']($i) . "</option>";
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
                    <img width="35%" class="mt-5" src="../img/logo.png">
                    <h1 class="mt-4 mb-4">Nomeie outro Administrador</h1>
                </div>

                <form id="admin" method="post" action="admin.php">

                    <?php 
                        if(!$_POST){
                            echo "<div class='form-group mx-auto text-center'>
                            <input type='email' class='form-control mt-5 mb-3' name='user' placeholder='E-mail do novo administrador'>
                            <button type='submit' class='text-white btn btn-outline-primary w-100'>Cadastrar</button>
                        </div>";
                        } else {
                            $userDao = require '../../back/UsuariosDAO.php' ;
                            if(!(is_null($_POST['email']))){
                                if($userDao['buscarUsuarioPorEmail']($_POST['email']) != false){
                                    $usuario = $userDao['buscarUsuarioPorEmail']($_POST['email']);
                                    $userDao['editarUsuario']($usuario['id'], $usuario['email'], $usuario['username'], $usuario['senha'], true);
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
</body>

</html>