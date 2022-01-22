<?php

    include "../conexao.php";

    $nome = $_POST['nome_escritor'];
    $rgc = $_POST['rgc_reeducando'];

    $query_cadastrar =
    "INSERT INTO reeducandos VALUES (
        null,
        '$nome',
        '$rgc',
        now()
    )";

    $cadastrar_escritor = mysqli_query($conexao, $query_cadastrar) or die (mysqli_error($conexao));

    header('location: ../../administrativo.php');