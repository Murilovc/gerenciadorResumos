<?php

include "../conexao.php";

    $id = $_POST['id_reeducando'];

    $query_deletar =
    "DELETE FROM reeducando
     WHERE id_reeducando = '$id'
    ";

    $deletar_escritor = mysqli_query($conexao, $query_deletar);

    header('location: ../../administrativo.php');