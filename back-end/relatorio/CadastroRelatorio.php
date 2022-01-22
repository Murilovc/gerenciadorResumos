<?php

    include "../conexao.php";

    $nota_conteudo = $_POST['nota_conteudo'];
    $nota_estrutura = $_POST['nota_estrutura'];
    $nota_ortografia = $_POST['nota_ortografia'];
    $observacoes_relatorio = $_POST['observacoes_relatorio'];
    $status_relatorio = "aguardando";

    $query_cadastrar =
    "INSERT INTO relatorios VALUES (
        null,
        '$nota_conteudo',
        '$nota_estrutura',
        '$nota_ortografia',
        '$observacoes_relatorio',
        '$status_relatorio',
        now()
    )";

    $cadastrar_relatorio = mysqli_query($conexao, $query_cadastrar) or die (mysqli_error($conexao));

    header('location: ../../listagem_relatorios.php');