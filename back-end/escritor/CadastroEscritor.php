<?php

    include "../conexao.php";

    $nome = $_POST['nome_escritor'];

    $query_cadastrar =
    "INSERT INTO escritores VALUES (
        null,
        '$nome',
        now()
    )";

    $cadastrar_escritor = mysqli_query($conexao, $query_cadastrar) or die (mysqli_error($conexao));

    header('location: ../../administrativo.php');