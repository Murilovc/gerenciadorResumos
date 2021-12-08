<?php

include "../conexao.php";
    
    /*$_POST é um método/variável definido pelo 
    próprio PHP para armazenar as informações
    recebidas pela classe de outro lugar.
    */
    $nome = $_POST['nome_usuario'];
    $email = $_POST['email_usuario'];
    $senha = $_POST['senha_usuario'];
    $nivel = $_POST['nivel_usuario'];

    $senha_cripto = password_hash($senha, PASSWORD_DEFAULT);

    /*Consulta SQL a tebela
    usuarios.
    O primeiro valor é passado como
    null, pois o próprio banco de dados
    vai atribuir um id ao usuario*/
    $query_cadastrar = 
    "INSERT INTO usuarios VALUES (
        null,
        '$nome',
        '$email',
        '$senha_cripto',
        '$nivel',
        now()
        
    )";

    $cadastrar_usuario = mysqli_query($conexao, $query_cadastrar) or die(mysqli_error($conexao));

    header('location: ../../administrativo.php');