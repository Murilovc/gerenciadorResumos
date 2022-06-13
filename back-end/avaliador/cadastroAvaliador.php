<?php

include "../conexao.php";
    
    /*$_POST é um método/variável definido pelo 
    próprio PHP para armazenar as informações
    recebidas pela classe de outro lugar.
    */

    if(empty($resultado_avaliadores) && empty($resultado_usuarios)){
        
        $nome = $_POST['nome_avaliador'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha_avaliador'];
        $instituicao = $_POST['instituicao_avaliador'];
        //$termo = "aceito";
    
        $query_email_avaliadores =
        "SELECT email FROM avaliadores WHERE email='$email'";
    
        $checagem_avaliadores = mysqli_query($conexao, $query_email_avaliadores);
    
        $resultado_avaliadores = mysqli_fetch_array($checagem_avaliadores);
    
        $query_email_usuarios =
        "SELECT email_usuario FROM usuarios WHERE email_usuario='$email'";
    
        $checagem_usuarios = mysqli_query($conexao, $query_email_usuarios);
    
        $resultado_usuarios = mysqli_fetch_array($checagem_usuarios);
        
        $senha_cripto = password_hash($senha, PASSWORD_DEFAULT);

        /*Consulta SQL a tebela
        avaliadores.
        O primeiro valor é passado como
        null, pois o próprio banco de dados
        vai atribuir um id ao avaliador*/
        $query_cadastrar = 
        "INSERT INTO avaliadores VALUES (
            null,
            '$nome',
            '$telefone',
            '$email',
            now(),
            '$senha_cripto',
            '$instituicao',
            null,
            '3'
        )";

        $cadastrar_avaliador = mysqli_query($conexao, $query_cadastrar) or die(mysqli_error($conexao));

        header('location: ../../administrativo.php');
    } else {
        echo "Utilize outro email";
        header('location: ../../administrativo.php');
    }

