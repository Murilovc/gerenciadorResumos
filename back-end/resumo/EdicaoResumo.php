<?php

include '../conexao.php';

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $arquivo = $_POST['arquivo'];

    $query_update =
    "UPDATE redacoes SET
        titulo = '$titulo',
        arquivo = '$arquivo'
     WHERE id = '$id'
    ";

    $editar_resumo = mysqli_query($conexao, $query_update)  or die (mysqli_error($conexao));

    header('location: ../../administrativo.php');