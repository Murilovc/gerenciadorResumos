<?php

include "../conexao.php";

    $id = $_POST['id_usuario'];
    $query_deletar =
    "DELETE FROM usuarios
     WHERE id_usuario = '$id'
    ";

    $deletar_avaliador = mysqli_query($conexao, $query_deletar);

    header('location: ../../administrativo.php');