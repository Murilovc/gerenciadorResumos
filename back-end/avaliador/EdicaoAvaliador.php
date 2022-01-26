<?php

include '../conexao.php';

    $id = $_POST['id_avaliador'];
    $nome = $_POST['nome_avaliador'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha_avaliador'];
    $instituicao = $_POST['instituicao'];

    /*Se a pessoa não escolheu uma nova senha, então a antiga será
    mantida*/
    if($senha == ''){
        $query_update =  
        "UPDATE avaliadores SET
            nome_avaliador = '$nome',
            telefone = '$telefone',
            email = '$email',
            instituicao_avaliador = '$instituicao'
        WHERE   id_avaliador = '$id'
        ";
    } else{
        $senha_cripto = password_hash($senha, PASSWORD_DEFAULT);
        $query_update =  
        "UPDATE avaliadores SET
            nome_avaliador = '$nome',
            telefone = '$telefone',
            email = '$email',
            senha_avaliador = '$senha_cripto',
            instituicao_avaliador = '$instituicao'
        WHERE   id_avaliador = '$id'
        ";
    }


                
    $queryCad = mysqli_query($conexao, $query_update) or die (mysqli_error($conexao));

    header('location: ../../administrativo.php');

