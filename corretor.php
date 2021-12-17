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
            echo "Logado como ".$_SESSION['nome'];
        }else{
            $_SESSION['msg'] = "Realize o login para continuar!";
            header("Location: login.php");
        }
        
        ?>

        <div class="col mt-4">
            
            <?php 
            include_once "back-end/conexao.php";
            
            $id_resumo = $_POST['id_resumo'];
            
            //coletando informações do resumo
            $query_consulta_resumo = 
            "SELECT id_resumo, arquivo, fk_id_escritor FROM resumos WHERE id_resumo='$id_resumo' LIMIT 1";

            $busca_resumo = mysqli_query($conexao, $query_consulta_resumo);
            $resultado_resumo = mysqli_fetch_array($busca_resumo);
            

            $local = $resultado_resumo['arquivo'];
            echo $local;

            //coletando informações do escritor
            $id_escritor = $resultado_resumo['fk_id_escritor'];

            $query_consulta_escritor =
            "SELECT id_escritor, nome_escritor FROM escritores WHERE id_escritor='$id_escritor'";

            $busca_escritor = mysqli_query($conexao, $query_consulta_escritor);
            $resultado_escritor = mysqli_fetch_array($busca_escritor);
            
            $escritor = $resultado_escritor['nome_escritor'];
            ?>

            <div class="row mt-4">
                <h3 class="text-primary">Resumo escrito por <?php echo $escritor;?></h3>
            </div>
            <!-- 
            Os dois pontos antes do nome são necessários porque o endereço
            do script em execução atual está "dentro" de visualizador.php, por
            causa do id que passamos de administrativo.php para cá usando a URL.
            Por exemplo, supondo que o id passado seja 4, a URL atual seria:
            http://localhost/gerenciadorResumos/visualizador.php/4
            -->

            <?php 
            $paraprint = "../arquivos/".$local;
            echo $paraprint;
            ?>
            <iframe src="../arquivos/<?php echo $local;?>" width="100%" height="570px">
            </iframe>
            
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