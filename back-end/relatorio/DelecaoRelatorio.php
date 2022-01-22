<?php

include "../conexao.php";

    $id = $_POST['id_relatorio'];

    $query_deletar =
    "DELETE FROM relatorios
     WHERE id_relatorio = '$id'
    ";

    $deletar_relatorio = mysqli_query($conexao, $query_deletar);

    header('location: ../../listagem_relatorios.php');