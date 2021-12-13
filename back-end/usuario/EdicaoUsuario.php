<?php

include '../conexao.php';

    $id = $_POST['id_usuario'];
    $nome = $_POST['nome_usuario'];
    $email = $_POST['email_usuario'];
    $senha = $_POST['senha_usuario'];
    $nivel = $_POST['nivel_usuario'];

    /*Se a pessoa não escolheu uma nova senha, então a antiga será
    mantida*/
    if($senha == ''){
        $query_update =  
        "UPDATE usuarios SET
            nome_usuario = '$nome',
            email_usuario = '$email',
            nivel_usuario = '$nivel'
        WHERE   id_usuario = '$id'
        ";
    } else{
        $senha_cripto = password_hash($senha, PASSWORD_DEFAULT);
        $query_update =  
        "UPDATE usuarios SET
            nome_usuario = '$nome',
            email_usuario = '$email',
            senha_usuario = '$senha_cripto',
            nivel_usuario = '$nivel'
        WHERE   id_usuario = '$id'
        ";
    }


                
    $queryCad = mysqli_query($conexao, $query_update) or die (mysqli_error($conexao));

    header('location: ../../administrativo.php');

