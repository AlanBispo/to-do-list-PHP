<?php 
    //conectar ao banco
    $conexao = new PDO("mysql:host=localhost;dbname=todo", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>