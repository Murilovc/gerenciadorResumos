<?php

include "../conexao.php";

    $id = $_POST['id_escritor'];

    $query_deletar =
    "DELETE FROM escritores
     WHERE id_escritor = '$id'
    ";

    $deletar_escritor = mysqli_query($conexao, $query_deletar);

    header('location: ../../administrativo.php');