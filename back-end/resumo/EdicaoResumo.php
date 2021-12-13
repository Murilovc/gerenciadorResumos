<?php

include '../conexao.php';

    $id = $_POST['id_resumo'];
    $titulo = $_POST['titulo'];
    $arquivo = $_POST['arquivo'];

    $query_update =
    "UPDATE resumos SET
        titulo = '$titulo',
        arquivo = '$arquivo'
     WHERE id_resumo = '$id'
    ";

    $editar_resumo = mysqli_query($conexao, $query_update)  or die (mysqli_error($conexao));

    header('location: ../../administrativo.php');