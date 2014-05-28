<?php

function consultaTodosProdutos() {
    conecta();

    $sql = "SELECT produto.codigo, produto.descricao, produto.valor, "
            . " detalhe_produto.detalhe, detalhe_produto.imagem "
            . " FROM produto INNER JOIN detalhe_produto "
            . " ON produto.codigo = detalhe_produto.codigo";
    $result = mysql_query($sql);

    $produtos = array();
    while ($linha = mysql_fetch_array($result)) {
        $produtos[] = $linha;
    }

    return $produtos;
}

function consultaDestaque() {
    conecta();

    $sql = "SELECT produto.codigo, produto.descricao, produto.valor, "
            . " detalhe_produto.detalhe, detalhe_produto.imagem "
            . " FROM produto INNER JOIN detalhe_produto "
            . " ON produto.codigo = detalhe_produto.codigo "
            . " INNER JOIN item "
            . " ON item.produto_codigo = produto.codigo"
            . " order by quantidade desc limit 1";
    $result = mysql_query($sql);

    
    return mysql_fetch_array($result);
    
}

 