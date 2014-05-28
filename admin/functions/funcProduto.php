<?php

function cadastraProduto($descricao, $valor) {
    conecta();

    $sql = "INSERT INTO produto (descricao, valor) VALUES ('$descricao', $valor)";
    $result = mysql_query($sql);
    
    if($result){
        return mysql_insert_id();
    }else{
        return false;
    }
    
}

function alteraProduto($codigo, $descricao, $valor) {
    conecta();

    $sql = "UPDATE  produto SET  descricao =  '$descricao', valor =  $valor WHERE codigo = $codigo";
    $result = mysql_query($sql);
    
    if($result){
        return true;
    }else{
        return false;
    }
}

function consultaProduto($codigo) {
    conecta();

    $sql = "SELECT * FROM produto WHERE codigo=$codigo";
    $result = mysql_query($sql);

    
    return mysql_fetch_array($result) ;
}

function consultaTodosProdutos() {
    conecta();

    $sql = "SELECT * FROM produto";
    $result = mysql_query($sql);

    $produtos = array();
    while ($linha = mysql_fetch_array($result)) {
        $produtos[] = $linha;
    }

    return $produtos;
}

function removeProduto($codigo){
    conecta();

    $sql = "DELETE FROM produto WHERE codigo = $codigo";
    $result = mysql_query($sql);
    
    if($result){
        return true;
    }else{
        return false;
    }
}
