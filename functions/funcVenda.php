<?php

function cadastraVenda($dia, $cliente) {
    conecta();

    $sql = "INSERT INTO pedido (data, cliente_codigo) VALUES ('$dia', $cliente)";
    $result = mysql_query($sql);

    if ($result) {
        return mysql_insert_id();
    } else {
        return false;
    }
}

function alteraVenda($codigo, $dia, $cliente) {
    conecta();

    $sql = "UPDATE pedido SET  data =  '$dia', cliente_codigo =  $cliente WHERE codigo = $codigo";
    $result = mysql_query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function consultaVenda($codigo) {
    conecta();

    $sql = " SELECT pedido.codigo, pedido.data, pedido.cliente_codigo, "
            . "cliente.nome FROM pedido "
            . "INNER JOIN cliente "
            . "ON pedido.cliente_codigo = cliente.codigo "
            . "WHERE pedido.codigo= $codigo";
    
    $result = mysql_query($sql);


    return mysql_fetch_array($result);
}

function consultaTodasVendas() {
    conecta();

    $sql =" SELECT pedido.codigo, pedido.data, pedido.cliente_codigo, "
            . "cliente.nome FROM pedido "
            . "INNER JOIN cliente "
            . "ON pedido.cliente_codigo = cliente.codigo "
            . "ORDER BY pedido.codigo";
    
    $result = mysql_query($sql);

    $vendas = array();
    while ($linha = mysql_fetch_array($result)) {
        $vendas[] = $linha;
    }

    return $vendas;
}

function removeVenda($codigo) {
    conecta();

    $sql = "DELETE FROM pedido WHERE codigo = $codigo";
    $result = mysql_query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function consultaItens($codigo) {
    conecta();

    $sql = " SELECT produto_codigo, produto.descricao, quantidade "
            . "FROM item INNER JOIN produto "
            . "ON item.produto_codigo = produto.codigo "
            . "WHERE pedido_codigo = $codigo";
    
    $result = mysql_query($sql);

    $itens = array();
    while ($linha = mysql_fetch_array($result)) {
        $itens[] = $linha;
    }

    return $itens;
}

function insereItem($codigoVenda, $codigoProduto, $quantidade){
    conecta();

    $sql = "INSERT INTO item (pedido_codigo, produto_codigo, quantidade)"
            . " VALUES ($codigoVenda, $codigoProduto, $quantidade)";
    $result = mysql_query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function consultaItem($codigoVenda, $codigoProduto){
    conecta();

    $sql = " SELECT * from item "
            . "WHERE pedido_codigo= $codigoVenda "
            . "AND produto_codigo = $codigoProduto";
    
    $result = mysql_query($sql);


    return mysql_fetch_array($result);
}

function alteraItem($codigoVenda, $codigoProduto, $quantidade) {
    conecta();

    $sql = "UPDATE item SET  quantidade =  $quantidade"
            . " WHERE pedido_codigo = $codigoVenda "
            . " AND produto_codigo = $codigoProduto";
    $result = mysql_query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

function removeItem($codigoVenda, $codigoProduto) {
    conecta();

    $sql = "DELETE FROM item"
            . " WHERE pedido_codigo = $codigoVenda "
            . " AND produto_codigo = $codigoProduto";
    $result = mysql_query($sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}