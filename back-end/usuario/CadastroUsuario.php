<?php

include "../conexao.php";
    
/*$_POST é uma variável definida pelo 
próprio PHP para armazenar as informações
recebidas pelo navegador de outro lugar.
*/
$nome = $_POST['nome_usuario'];
$email = $_POST['email_usuario'];
$senha = $_POST['senha_usuario'];
$nivel = $_POST['nivel_usuario'];

$query_email_usuarios =
"SELECT email_usuario FROM usuarios WHERE email_usuario='$email'";

$checagem_usuarios = mysqli_query($conexao, $query_email_usuarios);

$resultado_usuarios = mysqli_fetch_array($checagem_usuarios);

$query_email_avaliadores =
"SELECT email FROM avaliadores WHERE email='$email'";

$checagem_avaliadores = mysqli_query($conexao, $query_email_avaliadores);

$resultado_avaliadores = mysqli_fetch_array($checagem_avaliadores);

if(empty($resultado_usuarios) && empty($resultado_avaliadores)) {
    $senha_cripto = password_hash($senha, PASSWORD_DEFAULT);

    /*Consulta SQL a tebela
    usuarios.
    O primeiro valor é passado como
    null, pois o próprio banco de dados
    vai atribuir um id ao usuario*/
    $query_cadastrar = 
    "INSERT INTO usuarios VALUES (
        null,
        '$nome',
        '$email',
        '$senha_cripto',
        '$nivel',
        now()
        
    )";

    $cadastrar_usuario = mysqli_query($conexao, $query_cadastrar) or die(mysqli_error($conexao));

    header('location: ../../administrativo.php');
} else {
    header('location: ../../administrativo.php');
    echo "Utilize outro email";
}

