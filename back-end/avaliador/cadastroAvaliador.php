<?php

include "../conexao.php";
    
    /*$_POST é um método/variável definido pelo 
    próprio PHP para armazenar as informações
    recebidas pela classe de outro lugar.
    */
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    /*Consulta SQL a tebela
    avaliadores.
    O primeiro valor é passado como
    null, pois o próprio banco de dados
    vai atribuir um id ao avaliador*/
    $query_cadastrar = 
    "INSERT INTO avaliadores VALUES (
        null,
        '$nome',
        '$telefone',
        '$email',
        now()
    )";

    $cadastrar_avaliador = mysqli_query($conexao, $query_cadastrar) or die(mysqli_error($conexao));

    header('location: ../../administrativo.php');