<?php

include "../conexao.php";

    $texto = $_POST['texto'];
    $avaliador = $_POST['fk_id_avaliador'];
    $resumo = $_POST['fk_id_resumo'];

    $query_cadastrar =
    "INSERT INTO comentarios VALUES (
        null,
        '$texto',
        now(),
        '$avaliador',
        '$resumo'
    )";

    
    $cadastrar_comentario = mysqli_query($conexao, $query_cadastrar) or die(mysqli_error($conexao));
    
    header('location: ../../selecao_resumo.php');