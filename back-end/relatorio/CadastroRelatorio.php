<?php

    session_start();
    
    $id_avaliadores = $_SESSION['id'];
    include "../conexao.php";

    $nota_conteudo = $_POST['nota_conteudo'];
    $nota_estrutura = $_POST['nota_estrutura'];
    $nota_ortografia = $_POST['nota_ortografia'];
    $observacoes_relatorio = $_POST['observacoes_relatorio'];
    $id_ree = $_POST['id_reeducando'];
    $id_resumo = $_POST['id_resumo'];
    
    $query_listar_ree =   "SELECT *
                             FROM reeducandos
                             WHERE id_reeducando = '$id_ree'
                             ";
                
    $busca_ree = mysqli_query($conexao, $query_listar_ree) or die(mysqli_error($conexao));

    $rgcs = mysqli_fetch_array($busca_ree);
     $rgc = $rgcs['rgc_reeducando'];

    $query_cadastrar =
    "INSERT INTO relatorios VALUES (
        null,
        '$nota_conteudo',
        '$nota_estrutura',
        '$nota_ortografia',
        '$observacoes_relatorio',
        '1',
        '$rgc',
        '$id_avaliadores',
        '$id_resumo ',
        now()
    )";

    $cadastrar_relatorio = mysqli_query($conexao, $query_cadastrar) or die (mysqli_error($conexao));

    header('location: ../../listagem_relatorios.php');
    
    