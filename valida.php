<?php
session_start();
include_once("back-end/conexao.php");
$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);


if($btnLogin){
    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    if((!empty($email)) AND (!empty($senha))){
        // gerar a senha criptografada
       // echo password_hash($senha, PASSWORD_DEFAULT);
       //Pesquisar o usuario no bd
       $query_avaliador = "SELECT id_avaliador, nome_avaliador, email, senha_avaliador, nivel 
                          FROM avaliadores 
                          WHERE email='$email'
                          LIMIT 1";

       $query_usuario = "SELECT id_usuario, nome_usuario, email_usuario, senha_usuario, nivel_usuario
                          FROM usuarios
                          WHERE email_usuario='$email'
                          LIMIT 1";
                          
       $resultado_avaliador = mysqli_query($conexao, $query_avaliador);
       
       
        if($resultado_avaliador){
           $row_avaliador = mysqli_fetch_assoc($resultado_avaliador);
           if(password_verify($senha, $row_avaliador ['senha_avaliador'])){
                
                $_SESSION['id'] = $row_avaliador  ['id_avaliador'];
                $_SESSION['nome'] = $row_avaliador  ['nome_avaliador'];
                $_SESSION['email'] = $row_avaliador  ['email'];
                $_SESSION['nivel'] = $row_avaliador  ['nivel'];
                header("Location: selecao_resumo.php");
                return;
           }
        }
       
        $resultado_usuario = mysqli_query($conexao, $query_usuario);

        if($resultado_usuario){
            $row_usuario = mysqli_fetch_assoc($resultado_usuario);
            if(password_verify($senha, $row_usuario ['senha_usuario'])){
                $_SESSION['id'] = $row_usuario  ['id_usuario'];
                $_SESSION['nome'] = $row_usuario  ['nome_usuario'];
                $_SESSION['email'] = $row_usuario  ['email_usuario'];
                
                $tipo = (int)$row_usuario['nivel_usuario'];
                //Se for o admin
                if($tipo === 0){
                    $_SESSION['nivel'] = $row_usuario['nivel_usuario'];
                    header("Location: administrativo.php");
                //sen??o ?? o assistente de envio de arquivos
                }
                if($tipo === 1){
                    $_SESSION['nivel'] = $row_usuario['nivel_usuario'];
                    header("Location: envio_arquivo.php");
                }
                if($tipo === 4){
                    $_SESSION['nivel'] = $row_usuario['nivel_usuario'];
                    header("Location: listagem_relatorios.php");
                }
                
            }else{
                $_SESSION['msg'] = "Usu??rio ou senha inv??lida";

                header("Location: index.php");

            }
        }
    }else{
        $_SESSION['msg'] = "Usu??rio ou senha inv??lida";

    header("Location: index.php");
    }

}else{
    $_SESSION['msg'] = "Pagina n??o encontrada";

    header("Location: index.php");

}










