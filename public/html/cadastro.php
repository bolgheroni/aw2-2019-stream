<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Fetnlix - Cadastrar</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
</head>

<body style="background-image: linear-gradient(to right, rgb(0, 12, 31), rgba(14, 62, 140))">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-md-6 mx-auto text-center">
                <div class=" text-center mx-auto text-light">
                    <img width="35%" class="mt-5" src="../img/logo.png">
                    <h1 class="mt-4 mb-4">Cadastre-se</h1>
                    <p>Insira as informações abaixo e alegre-se com as maiores produções audiovisuais do planeta Terra.
                    </p>
                </div>

                <form id="cadastro" method="post" action="cadastro.php">

                    <?php 
                        if(!$_POST){
                            echo "<div class='form-group mx-auto text-center'>
                            <input type='email' class='form-control mt-5 mb-3' name='user' placeholder='E-mail'>
                            <input type='text' class='form-control mb-3' name='email' placeholder='Nome de Usuário'>
                            <input type='password' class='form-control mb-3' name='password' placeholder='Senha'>
                            <button type='submit' class='text-white btn btn-outline-primary w-100'>Cadastrar</button>
                        </div>";
                        } else {
                            $userDao = require '../../back/UsuariosDAO.php' ;
                            if(!(is_null($_POST['email']) || is_null($_POST['user']) || is_null($_POST['password']))
                            && $userDao['adicionarUsuario']($_POST['email'], $_POST['user'], $_POST['password'], false)){
                                echo "<div class='form-group mx-auto text-center'>
                                <input type='email' class='form-control mt-5 mb-3' name='user' placeholder='E-mail'>
                                <input type='text' class='form-control mb-3' name='email' placeholder='Nome de Usuário'>
                                <input type='password' class='form-control mb-3' name='password' placeholder='Senha'>
                                <button type='submit' class='text-white btn btn-outline-primary w-100'>Cadastrar</button>
                                <p class='text-primary mt-3'>Cadastro efetuado com sucesso!</p>
                            </div>
                                ";
                            } else {
                                echo "<div class='form-group mx-auto text-center'>
                                <input type='email' class='form-control mt-5 mb-3' name='user' placeholder='E-mail'>
                                <input type='text' class='form-control mb-3' name='email' placeholder='Nome de Usuário'>
                                <input type='password' class='form-control mb-3' name='password' placeholder='Senha'>
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