<?php

include '../conexao.php';

    $id = $_POST['id_avaliador'];
    $nome = $_POST['nome_avaliador'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $query_update =  
    "UPDATE avaliadores SET
        nome_avaliador = '$nome',
        telefone = '$telefone',
        email = '$email'
    WHERE   id_avaliador = '$id'
    ";
                
    $queryCad = mysqli_query($conexao, $query_update) or die (mysqli_error($conexao));

    header('location: ../../administrativo.php');

