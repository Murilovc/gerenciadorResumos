<?php

include '../conexao.php';

    $id = $_POST['id_escritor'];
    $nome = $_POST['nome_escritor'];

    $query_update = 
    "UPDATE escritores SET
        nome_escritor = '$nome'
     WHERE id_escritor = '$id'
    ";

    $editar_escritor = mysqli_query($conexao, $query_update) or die (mysqli_error($conexao));

    header('location: ../../administrativo.php');
