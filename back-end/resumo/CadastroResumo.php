<?php

include "../conexao.php";

    $titulo = $_POST['titulo'];
    $arquivo = $_POST['arquivo'];

    $query_cadastrar =
    "INSERT INTO resumos VALUES (
        null,
        '$titulo',
        '$arquivo',
        now()
    )";

    $cadastrar_resumo = mysqli_query($conexao, $query_cadastrar) or die(mysqli_error($conexao));

    header('location: ../../administrativo.php');