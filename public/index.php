<?php 
    if(isset($_COOKIE['userId'])){
        header("Location:../public/html/home.html");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Fetnlix - Entre</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
</head>

<body style="background-image: linear-gradient(to right, rgb(0, 12, 31), rgba(14, 62, 140))">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-md-6 mx-auto text-center">
                <div class=" text-center mx-auto text-light">
                    <img width="35%" class="mt-5" src="img/logo.png">
                    <h1 class="mt-2 mb-4">FETNLIX</h1>
                    <p >Bem-vindo(a) ao Fetnlix. Acesse e confira o maior acervo de vídeos que vão alegrar essa sua vida triste e medíocre.</p>
                </div>
                
                <form id="autenticar" method="post" action="index.php">
                <?php 
                if(!$_POST){
                    echo"<div class='form-group mx-auto text-center'>
                        <input type='email' class='form-control mt-5 mb-3' name='email' placeholder='E-mail'>
                        <input type='password' class='form-control mb-3' name='password' placeholder='Senha'>
                        <button type='submit' class='text-white btn btn-outline-primary w-100 mb-3'>Entrar</button>
                        <a href='html/cadastro.php' class='text-white btn btn-outline-primary w-100'>Cadastrar</a>
                    </div>";
                } else {
                    $usuarioDao = require '../back/UsuariosDAO.php';
                    if($usuarioDao['autenticarUsuario']($_POST['email'], $_POST['password']) == false){
                        echo"<div class='form-group mx-auto text-center'>
                            <input type='email' class='form-control mt-5 mb-3' name='email' placeholder='E-mail'>
                            <input type='password' class='form-control mb-3' name='password' placeholder='Senha'>
                            <button type='submit' class='text-white btn btn-outline-primary w-100 mb-3'>Entrar</button>
                            <a href='html/cadastro.php' class='text-white btn btn-outline-primary w-100'>Cadastrar</a>
                            <p class='text-danger mt-3'>Registro não existente</p>
                        </div>";
                    } else {
                        header("Location:../public/html/home.html");
                    }
                } 
                ?>

                </form>
            </div>
        </div>
    </div>
</body>

</html>