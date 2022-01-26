<?php

include '../conexao.php';

    $id = $_POST['id_relatorio'];
    $id_status = $_POST['id_status'];
    
    if($id_status == 1){
        $mudar = 2;
    }else{
        $mudar = 1;
    }

    $query_update = 
    "UPDATE relatorios SET
        status_relatorio = '$mudar'
     WHERE id_relatorio = '$id'
    ";

    $editar_escritor = mysqli_query($conexao, $query_update) or die (mysqli_error($conexao));

    header('location: ../../listagem_relatorios.php');
