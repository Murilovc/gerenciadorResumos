<?php
session_start();
include_once("back-end/conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);


if($btnLogin){
    
    $avaliador = filter_input(INPUT_POST, 'avaliador', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    if((!empty($avaliador)) AND (!empty($senha))){
        // gerar a senha criptografada
       // echo password_hash($senha, PASSWORD_DEFAULT);
       //Pesquisar o usuario no bd
       $result_usuario = "SELECT id_avaliador, nome_avaliador, email, senha_avaliador 
                          FROM avaliadores 
                          WHERE email='$avaliador'
                          LIMIT 1";
                          
       $resultado_usuario = mysqli_query($conexao, $result_usuario);
       if($resultado_usuario){
           $row_usuario = mysqli_fetch_assoc($resultado_usuario);
           if(password_verify($senha, $row_usuario ['senha_avaliador'])){
                header("Location: corretor.php");
                $_SESSION['id'] = $row_usuario  ['id_avaliador'];
                $_SESSION['nome'] = $row_usuario  ['nome_avaliador'];
                $_SESSION['email'] = $row_usuario  ['email'];

           }else{
               $_SESSION['msg'] = "Usuário ou senha inválida";

                header("Location: index.php");

           }
       }


    }else{
        $_SESSION['msg'] = "Usuário ou senha inválida";

    header("Location: index.php");
    }

}else{
    $_SESSION['msg'] = "Pagina não encontrada";

    header("Location: index.php");

}










