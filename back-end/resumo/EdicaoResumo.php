<?php

include '../conexao.php';

    $id = $_POST['id_resumo'];
    $titulo = $_POST['titulo'];
    $escritor = $_POST['fk_id_escritor'];
    $avaliador = $_POST['fk_id_avaliador'];
    
    $query_update =
    "UPDATE resumos SET
    titulo = '$titulo',
    fk_id_escritor = '$escritor',
    fk_id_avaliador = '$avaliador'
    WHERE id_resumo = '$id'
    ";
    
    $editar_resumo = mysqli_query($conexao, $query_update)  or die (mysqli_error($conexao));

    header('location: ../../administrativo.php');