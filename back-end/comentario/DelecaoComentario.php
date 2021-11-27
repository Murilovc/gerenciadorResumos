<?php

include "../conexao.php";

    $id = $_POST['id'];

    $query_deletar=
    "DELETE FROM comentarios
        WHERE id = '$id'
    ";

    $deletar_comentario = mysqli_query($conexao, $query_deletar);

    header('location: ../../administrativo.php');