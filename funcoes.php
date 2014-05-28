<?php
include_once './functions/funcIndex.php';


function conecta() {
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'pedidos';
    mysql_connect($server, $username, $password) or die('Erro ao conectar');
    mysql_select_db($db) or die('Erro ao selecionar db');
    mysql_query("SET NAMES 'utf8'");
    mysql_query('SET character_set_connection=utf8');
    mysql_query('SET character_set_client=utf8');
    mysql_query('SET character_set_results=utf8');
}

function login() {

    session_start();
    
    if (!array_key_exists("usuario", $_SESSION)) {
        header('Location: login.php');
        exit;
    }
    
    
}

function validaLogin($usuario, $senha) {
    conecta(); 
    $sql = "SELECT * FROM usuario WHERE usuario= '$usuario' AND senha='$senha'";
    $resultado = mysql_query($sql);

    
    
    if (mysql_num_rows($resultado) > 0) {
        return true;
        
    }

    return false; //senão ele te retornará falso pois não existe aquele usuário com aquelas informações
}

