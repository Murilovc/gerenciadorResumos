<?php

include '../conexao.php';

    $id = $_POST['id'];
    $texto = $_POST['texto'];

    $query_update =
    "UPDATE comentarios SET
        texto = '$texto'
     WHERE id = '$id'
    ";

    $editar_comentario = mysqli_query($conexao, $query_update) or die (mysqli_error($conexao));


    header('location: ../../administrativo.php');