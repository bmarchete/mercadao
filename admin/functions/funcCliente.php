<?php

function cadastraCliente($nome, $nascimento) {
    conecta();

    $sql = "INSERT INTO cliente (nome, nascimento) VALUES ('$nome', '$nascimento')";
    $result = mysql_query($sql);
    
    if($result){
        return mysql_insert_id();
    }else{
        return false;
    }
    
}

function alteraCliente($codigo, $nome, $nascimento) {
    conecta();

    $sql = "UPDATE  cliente SET  nome =  '$nome', nascimento =  '$nascimento' WHERE codigo = $codigo";
    $result = mysql_query($sql);
    
    if($result){
        return true;
    }else{
        return false;
    }
}

function consultaCliente($codigo) {
    conecta();

    $sql = "SELECT * FROM cliente WHERE codigo=$codigo";
    $result = mysql_query($sql);

    
    return mysql_fetch_array($result) ;
}

function consultaTodosClientes() {
    conecta();

    $sql = "SELECT * FROM cliente";
    $result = mysql_query($sql);

    $clientes = array();
    while ($linha = mysql_fetch_array($result)) {
        $clientes[] = $linha;
    }

    return $clientes;
}

function removeCliente($codigo){
    conecta();

    $sql = "DELETE FROM cliente WHERE codigo = $codigo";
    $result = mysql_query($sql);
    
    if($result){
        return true;
    }else{
        return false;
    }
}
