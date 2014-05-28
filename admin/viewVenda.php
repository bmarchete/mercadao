<?php
require_once './funcoes.php';
login();

$venda = false;

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    $venda = consultaVenda($codigo);
} else {
    header('Location: vendaIndex.php');
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


        <title>Visualizar venda</title>
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
                
                <a style="margin-top: 10px;" class="btn btn-primary btn-lg" href="addItem.php?codigo=<?php if ($venda) echo $venda[0];?>" >Inserir Novo Item</a>
                <h4>
                    Código da venda: <?php if ($venda) echo $venda[0]; ?> | 
                    Data da venda: <?php if ($venda) echo $venda[1]; ?> | 
                    Código do cliente: <?php if ($venda) echo $venda[2]; ?> | 
                    Nome do cliente: <?php if ($venda) echo $venda[3]; ?>
                </h4>
                
                
                
                <hr />

                <table class="orderer table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Descricão</th>
                            <th>Quantidade</th>
                            <th>Manutenção</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if ($venda) {
                            $itens = consultaItens($venda[0]);

                            foreach ($itens as $item) {
                                echo '<tr>';
                                echo '<td>' . $item[0] . '</td>';
                                echo '<td>' . $item[1] . '</td>';
                                echo '<td>' . $item[2] . '</td>';
                                echo '<td width=200>';
                                echo '<a class="btn btn-success" href="updItem.php?cod_prod=' . $item[0] . '&cod_vend=' . $venda[0] . '"><span class="glyphicon glyphicon-pencil"></span> Alterar</a>';
                                echo '&nbsp;&nbsp;';
                                echo '<a class="btn btn-danger" href="delItem.php?cod_prod=' . $item[0] . '&cod_vend=' . $venda[0] . '"><span class="glyphicon glyphicon-remove"></span> Apagar</a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        }
                        ?>

                    </tbody>

                </table>
            </div>
        


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php include_once './bootstrap/ordenaTabela.php'; ?>
    </body>
</html>

