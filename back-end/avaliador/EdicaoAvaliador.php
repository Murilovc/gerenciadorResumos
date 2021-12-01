<?php

include '../conexao.php';

    $id = $_POST['id_avaliador'];
    $nome = $_POST['nome_avaliador'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha_avaliador'];

    $query_update =  
    "UPDATE avaliadores SET
        nome_avaliador = '$nome',
        telefone = '$telefone',
        email = '$email',
        senha_avaliador = '$senha'
    WHERE   id_avaliador = '$id'
    ";
                
    $queryCad = mysqli_query($conexao, $query_update) or die (mysqli_error($conexao));

    header('location: ../../administrativo.php');

