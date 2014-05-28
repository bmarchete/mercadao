<?php
require_once './funcoes.php';
login();

$item = false;

if(isset($_GET['cod_prod']) && isset($_GET['cod_vend'])){
   
    $codigoVenda = $_GET['cod_vend'];
    $codigoProduto = $_GET['cod_prod'];
    
    $item = consultaItem($codigoVenda, $codigoProduto);
    //var_dump($item);
}else{
    header('Location: VendaIndex.php');
}
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigoVenda = $_POST['cod_vend'];
    $codigoProduto = $_POST['cod_prod'];
    $quantidade = $_POST['quantidade'];
    


    if (alteraItem($codigoVenda, $codigoProduto, $quantidade)) {
        header('Location: viewVenda.php?codigo=' . $codigoVenda);

    } else {
        echo '<script>alert("Item não alterado");</script>';
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


        <title>Alterar produto</title>
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
                <h2 class="form-add-heading">Alterar Item</h2>
                <p>
                    Código da Venda: <?php if($item) echo $item[0];?> | 
                    Código do Produto: <?php if($item) echo $item[1];?>
                </p>
                <input type="hidden" name="cod_prod" class="form-control" value="<?php if($item) echo $item[1];?>">
                <input type="hidden" name="cod_vend" class="form-control" value="<?php if($item) echo $item[0];?>" required autofocus>
                <input type="text" name="quantidade" value="<?php if($item) echo $item[2];?>" class="form-control" required>

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

