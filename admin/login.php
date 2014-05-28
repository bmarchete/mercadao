<?php
include_once './funcoes.php';

$loginSuccess = true;

session_start();
if (array_key_exists("usuario", $_SESSION)) {
    header('Location: index.php');
    exit;
}

if (isset($_COOKIE['usuario'])) {
    
    $_SESSION['usuario'] = $_COOKIE['usuario'];
        header('Location:index.php');
        exit;
    }

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $loginSuccess = validaLogin($usuario, $senha);
    
    if ($loginSuccess != false) {
        
        if ($_POST['lembrete']) {

            setcookie('usuario', $usuario, time()+60*60);
            
        }
        
        $_SESSION['usuario'] = $usuario;

        header('Location:index.php');
        exit;
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">


        <title>Login</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <div class="container">

            <form class="form-signin" role="form" method="post">
                <?php if (!$loginSuccess) echo '<h4 class="alert alert-danger" style="margin: 10px auto; text-align: center">Usuário inválido</h4>'; ?>
                <h2 class="form-signin-heading">Efetue o login</h2>
                <input type="text" name="usuario" class="form-control" placeholder="Usuário" required autofocus>
                <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                <label class="checkbox">
                    <input type="checkbox" name="lembrete" value="remember-me"> Lembrar senha
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                
            </form>

            

        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    </body>
</html>
