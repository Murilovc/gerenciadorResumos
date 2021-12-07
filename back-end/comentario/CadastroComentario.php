<?php

include "../conexao.php";

    $texto = $_POST['texto'];

    $query_cadastrar =
    "INSERT INTO comentarios VALUES (
        null,
        '$texto',
        now(),
        null,
        null
    )";

    
    $cadastrar_comentario = mysqli_query($conexao, $query_cadastrar) or die(mysqli_error($conexao));
    
    header('location: ../../administrativo.php');