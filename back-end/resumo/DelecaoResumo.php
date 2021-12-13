<?php

include "../conexao.php";

    $id = $_POST['id_resumo'];

    $query_deletar =
    "DELETE FROM resumos
     WHERE id_resumo = '$id'
    ";

    $deletar_resumo = mysqli_query($conexao, $query_deletar);

    header('location: ../../administrativo.php');