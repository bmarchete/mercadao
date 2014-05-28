<?php include './funcoes.php'; login();?>
<!DOCTYPE html>

<html>
    <head>
        <title>Manutenção de vendas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">

        <link   href="css/bootstrap.min.css" rel="stylesheet">
        


    </head>
    <body>
        
        <!-- Fixed navbar -->
        <?php include_once './bootstrap/navTopBar.php'; ?>
        
        
        <div class="container">
            

            <div class="row" style="margin: 50px;">
                
                    <a style="margin-top: 10px;" class="btn btn-primary btn-lg" href="addVenda.php" >Cadastrar Nova Venda</a>
                
                <hr />

                <table class="orderer table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Data</th>
                            <th>Cliente</th>
                            <th>Manutenção</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $vendas = consultaTodasVendas();

                        foreach ($vendas as $venda) {
                            echo '<tr>';
                            echo '<td>' . $venda[0] . '</td>';
                            echo '<td>' . $venda[1] . '</td>';
                            echo '<td>' . $venda[3] . '</td>';
                            echo '<td width=300>';
                            echo '<a class="btn btn-primary" href="viewVenda.php?codigo=' . $venda[0] . '"><span class="glyphicon glyphicon-eye-open"></span> Ver</a>';
                            echo '&nbsp;&nbsp;';
                            echo '<a class="btn btn-success" href="updVenda.php?codigo=' . $venda[0] . '"><span class="glyphicon glyphicon-pencil"></span> Alterar</a>';
                            echo '&nbsp;&nbsp;';
                            echo '<a class="btn btn-danger" href="delVenda.php?codigo=' . $venda[0] . '"><span class="glyphicon glyphicon-remove"></span> Apagar</a>';
                            
                            echo '</td>';
                            echo '</tr>';
                        }
                        ?>

                    </tbody>

                </table>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php include_once './bootstrap/ordenaTabela.php'; ?>

    </body>
</html>
