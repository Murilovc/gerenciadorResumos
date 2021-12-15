<!doctype html>
<html lang="en">
    <head>
        <title>Sala de correção</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
      
        <?php include "back-end/menu.php"?>

        <?php 
        session_start();
        if(!empty($_SESSION['id']) && $_SESSION['nivel'] == 2){
            echo "Olá, ",$_SESSION['nome'].", bem-vindo! <br>";
            echo "<a href='sair.php'>Sair</a>";
        }else{
            $_SESSION['msg'] = "Realize o login para continuar!";
        header("Location: login.php");
        }
        
        ?>

        <div class="col mt-4">
            
            <?php include "visualizador.php"?>
        </div>
        <div class="col mt-4">
            <form action="back-end/comentario/CadastroComentario.php" method="POST">
                
                <div class="form-group">
                    <textarea rows="7" name="comentarios" type="text" class="form-control" placeholder="Comentários"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Salvar comentário</button>
            </form>
        </div>
  
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>