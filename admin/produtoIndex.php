<?php
require_once './funcoes.php';
login();
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Manutenção de produtos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">

        <link   href="css/bootstrap.min.css" rel="stylesheet">
        


    </head>
    <body>
        
        <!-- Fixed navbar -->
        <?php include_once './bootstrap/navTopBar.php'; ?>
        
        
        <div class="container">
            

            <div class="row" style="margin: 50px;">
                
                <a style="margin-top: 10px;" class="btn btn-primary btn-lg" href="addProduto.php" >Cadastrar Novo Produto</a>
                
                <hr />

                <table class="orderer table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descricão</th>
                            <th>Valor</th>
                            <th>Manutenção</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $produtos = consultaTodosProdutos();

                        foreach ($produtos as $produto) {
                            echo '<tr>';
                            echo '<td>' . $produto[0] . '</td>';
                            echo '<td>' . $produto[1] . '</td>';
                            echo '<td>' . $produto[2] . '</td>';
                            echo '<td width=200>';
                            echo '<a class="btn btn-success" href="updProduto.php?codigo=' . $produto[0] . '"><span class="glyphicon glyphicon-pencil"></span> Alterar</a>';
                            echo '&nbsp;';
                            echo '<a class="btn btn-danger" href="delProduto.php?codigo=' . $produto[0] . '"><span class="glyphicon glyphicon-remove"></span> Apagar</a>';
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
