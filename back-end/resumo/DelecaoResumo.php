<?php

include "../conexao.php";

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $arquivo = $_POST['arquivo'];

    $query_deletar =
    "DELETE FROM redacoes
     WHERE id = '$id'
    ";

    $deletar_resumo = mysqli_query($conexao, $query_deletar);

    header('location: ../../administrativo.php');