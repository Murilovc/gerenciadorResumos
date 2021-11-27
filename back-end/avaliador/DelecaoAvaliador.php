<?php

include "../conexao.php";

    $id = $_POST['id_avaliador'];
    $query_deletar =
    "DELETE FROM avaliadores
     WHERE id_avaliador = '$id'
    ";

    $deletar_avaliador = mysqli_query($conexao, $query_deletar);

    header('location: ../../administrativo.php');