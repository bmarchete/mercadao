<?php
require_once './funcoes.php';

login();

$cliente = false;

if(isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];
    $cliente = consultaCliente($codigo);
}else{
    header('Location: clienteIndex.php');
}
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $nascimento = $_POST['dia'];
    


    if (alteraCliente($codigo, $nome, $nascimento)) {
        header('Location: clienteIndex.php');

    } else {
        echo '<script>alert("Cliente não alterado");</script>';
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


        <title>Alterar cliente</title>
        <!-- Custom styles for this template -->
        <link href="css/add.css" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">



        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <!-- Fixed navbar -->
        <?php include_once './bootstrap/navTopBar.php'; ?>
       

        <div class="container">

            <form class="form-add" role="form" method="post">
                <h2 class="form-add-heading">Alterar Cliente</h2>
                <input type="hidden" name="codigo" class="form-control" value="<?php if($cliente) echo $cliente[0];?>">
                <input type="text" name="nome" class="form-control" value="<?php if($cliente) echo $cliente[1];?>" required autofocus>
                <input type="date" name="dia" value="<?php if($cliente) echo $cliente[2];?>" class="form-control" required>

                <button class="btn btn-lg btn-info btn-block" type="submit">Alterar</button>
            </form>

        </div> <!-- /container -->
        

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
    </body>
</html>

