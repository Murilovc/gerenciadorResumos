<?php

include '../conexao.php';

    $id = $_POST['id_reeducando'];
    $nome = $_POST['nome_reeducando'];
    $rgc = $_POST['rgc_reeducando'];

    $query_update = 
    "UPDATE reeducandos SET
        nome_reeducando = '$nome',
        rgc_reeducando = '$rgc'
     WHERE id_reeducando = '$id'
    ";

    $editar_escritor = mysqli_query($conexao, $query_update) or die (mysqli_error($conexao));

    header('location: ../../administrativo.php');
