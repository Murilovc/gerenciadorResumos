<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
        }

    ?>
    <form method="POST" action="valida.php">
        
        <div class="form-group">
            <label for="inputUsuario">Usuário:</label>
            <input type="email" name="usuario" class="form-control" id="inputUsuario" placeholder="Digite seu email" ><br><br>
        </div>
        <div class="form-group">
            <label for="inputSenha">Senha:</label>
            <input type="password" name="senha" class="form-control" id="inputSenha" placeholder="Digite Sua Senha"><br><br>
        </div>

        <input type="submit" name="btnLogin" class="btn btn-primary" value="Acessar">



    </form>
</body>
</html>