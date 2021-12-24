<?php

include "../conexao.php";

    $origem_solicitacao = $_POST['pagina_atual'];

    $titulo = $_POST['titulo'];
    $escritor = $_POST['fk_id_escritor'];
    $avaliador = $_POST['fk_id_avaliador'];
    

    $upload_arquivo = md5(time()) .$_FILES['arquivo']['name'];

    $query_cadastrar =
    "INSERT INTO resumos VALUES (
        null,
        '$titulo',
        '$upload_arquivo',
        null,
        now(),
        '$escritor',
        '$avaliador'
    )";

    
    
    move_uploaded_file($_FILES['arquivo']['tmp_name'], '../../arquivos/'.$upload_arquivo);
        
    $cadastrar_resumo = mysqli_query($conexao, $query_cadastrar) or die(mysqli_error($conexao));

    header('location: ../../'.$origem_solicitacao);