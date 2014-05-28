<?php
require_once './funcoes.php';
login();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $dia = $_POST['dia'];
    $cliente = $_POST['cliente'];



    if ($mensagem = cadastraVenda($dia, $cliente)) {
        //echo '<script>alert("Venda cadastrada com código ' . $mensagem . '");</script>';
        header('Location: addItem.php?codigo=' . $mensagem . '&msg=true');
    } else {
        echo '<script>alert("Venda não cadastrada");</script>';
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


        <title>Adicionar Venda</title>
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
                <h2 class="form-add-heading">Cadastrar Venda</h2>

                <input type="date" name="dia" class="form-control" required>
                <select name="cliente" id="cliente" class="form-control" required>
                    <?php 
                        $clientes = consultaTodosClientes();
                        foreach ($clientes as $cliente){
                            echo '<option value="' . $cliente[0] . '">' . $cliente[1] .'</option>';
                        }
                    ?>
                    
                </select>
                <button class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button>
            </form>

        </div> <!-- /container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>

