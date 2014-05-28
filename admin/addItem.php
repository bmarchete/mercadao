<?php
require_once './funcoes.php';

login();

$venda = false;
$msg = false;

if(isset($_GET['codigo'])){
    $codigo = $_GET['codigo'];
    $venda = consultaVenda($codigo);
    
    if (!$venda) {
        header('Location: vendaIndex.php');
    }
    
    if (isset($_GET['msg']) && $_GET['msg'] == true) {
        $msg = true;
    }
    
}else{
    header('Location: vendaIndex.php');
}
    
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigoVenda = $_POST['codigo_venda'];
    $codigoProduto = $_POST['codigo_produto'];
    $quantidade = $_POST['quantidade'];
    


    if (insereItem($codigoVenda, $codigoProduto, $quantidade)) {
        header('Location: viewVenda.php?codigo=' .$codigoVenda);

    } else {
        echo '<script>alert("Item não alterado. '
        . 'Verifique se já existe este item cadastrado");</script>';
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


        <title>Inserir item</title>
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

            <?php if($msg)echo '<h4 class="bg-primary" style="padding: 3px; width: 300px; margin: auto;">Venda cadastrada com código ' . $venda[0] . '</h4>'?>
            <form class="form-add" role="form" method="post">
                
                <h2 class="form-add-heading">Inserir Item</h2>
                <input type="hidden" name="codigo_venda" class="form-control" value="<?php if($venda) echo $venda[0];?>">
                <input type="number" name="quantidade" placeholder="Quantidade" class="form-control" required autofocus>
                
                <select name="codigo_produto" id="produto" class="form-control" required>
                    <?php 
                        $produtos = consultaTodosProdutos();
                        foreach ($produtos as $produto){
                            echo '<option value="' . $produto[0] . '">' . $produto[1] .'</option>';
                        }
                    ?>
                    
                </select>
                
                

                <button class="btn btn-lg btn-info btn-block" type="submit">Inserir</button>
            </form>

        </div> <!-- /container -->
        

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
    </body>
</html>

