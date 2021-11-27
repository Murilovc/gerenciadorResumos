<?php

include "../conexao.php";

    $texto = $_POST['texto'];

    $query_cadastrar =
    "INSERT INTO comentarios VALUES (
        null,
        '$texto',
        now()
     )";


    header('location: ../../administrativo.php');