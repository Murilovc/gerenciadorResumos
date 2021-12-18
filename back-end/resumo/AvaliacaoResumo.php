<?php

include '../conexao.php';

    $id = $_POST['id_resumo'];
    $comentario = $_POST['comentario'];
    
    $query_update =
    "UPDATE resumos SET
    comentario = '$comentario'
    WHERE id_resumo = '$id'
    ";
    
    $editar_resumo = mysqli_query($conexao, $query_update)  or die (mysqli_error($conexao));

    header('location: ../../selecao_resumo.php');