<?php

include "../conexao.php";

    $id = $_POST['id_resumo'];
    $arquivo = $_POST['arquivo'];

    $query_deletar =
    "DELETE FROM resumos
     WHERE id_resumo = '$id'
    ";

    unlink('../../arquivos/'.$arquivo);

    $deletar_resumo = mysqli_query($conexao, $query_deletar);

    header('location: ../../administrativo.php');