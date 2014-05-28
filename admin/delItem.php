<?php
require_once './funcoes.php';
login();

$item = false;

if (isset($_GET['cod_prod']) && isset($_GET['cod_vend'])) {

    $codigoVenda = $_GET['cod_vend'];
    $codigoProduto = $_GET['cod_prod'];

    $item = consultaItem($codigoVenda, $codigoProduto);
} else {
    header('Location: vendaIndex.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigoVenda = $_POST['cod_vend'];
    $codigoProduto = $_POST['cod_prod'];
    if (removeItem($codigoVenda, $codigoProduto)) {
        header('Location: viewVenda.php?codigo=' . $codigoVenda);
    } else {
        echo '<script>alert("Item não removido");</script>';
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


        <title>Remover item</title>
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

       

        <div class="bg-info" style="margin-left: 20px; padding-left: 20px; width: 330px;">
            <div class="row">
                <form class="form-add" role="form" method="post">
                    <h2 class="form-add-heading">Remover Item?</h2>
                    <p>
                        Código da Venda: <?php if ($item) echo $item[0]; ?> | 
                        Código do Produto: <?php if ($item) echo $item[1]; ?>
                    </p>
                    <input type="hidden" name="cod_vend" class="form-control" value="<?php if ($item) echo $item[0]; ?>">
                    <input type="hidden" name="cod_prod" class="form-control" value="<?php if ($item) echo $item[1]; ?>">

                    <button class="btn btn-lg btn-danger btn-block" type="submit">Remover</button>
                </form>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>

