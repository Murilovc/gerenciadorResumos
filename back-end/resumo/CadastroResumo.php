<?php

include "../conexao.php";

    $titulo = $_POST['titulo'];
    $arquivo = $_POST['arquivo'];
    $escritor = $_POST['fk_id_escritor'];
    $avaliador = $_POST['fk_id_avaliador'];

    $query_cadastrar =
    "INSERT INTO resumos VALUES (
        null,
        '$titulo',
        '$upload_arquivo',
        now(),
        '$escritor',
        '$avaliador'
    )";

    $upload_arquivo = 'arquivos/' .md5(time()) .$_FILES['arquivo']['name'];
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $upload_arquivo);
        
    $cadastrar_resumo = mysqli_query($conexao, $query_cadastrar) or die(mysqli_error($conexao));

    header('location: ../../administrativo.php');