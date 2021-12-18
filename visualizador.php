<!DOCTYPE html>
<html>
  <head>
    <title>Visualizador de PDF</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
  
 		<?php 
    include_once "back-end/conexao.php";
    
    $caminho = $_SERVER['REQUEST_URI'];
    $array_string = explode("/", $caminho, 4);
    $id_resumo = $array_string[3];
    
    //coletando informações do resumo
    $query_consulta_resumo = 
    "SELECT id_resumo, arquivo, fk_id_escritor, fk_id_avaliador FROM resumos WHERE id_resumo='$id_resumo' LIMIT 1";

    $busca_resumo = mysqli_query($conexao, $query_consulta_resumo);
    $resultado_resumo = mysqli_fetch_array($busca_resumo);
    

    $local = $resultado_resumo['arquivo'];


    //coletando informações do escritor
    $id_escritor = $resultado_resumo['fk_id_escritor'];

    $query_consulta_escritor =
    "SELECT id_escritor, nome_escritor FROM escritores WHERE id_escritor='$id_escritor'";

    $busca_escritor = mysqli_query($conexao, $query_consulta_escritor);
    $resultado_escritor = mysqli_fetch_array($busca_escritor);
    
    $nome_escritor = $resultado_escritor['nome_escritor'];

    //coletando informações do avaliador
    $id_avaliador = $resultado_resumo['fk_id_avaliador'];

    $query_consulta_avaliador =
    "SELECT id_avaliador, nome_avaliador FROM avaliadores WHERE id_avaliador='$id_avaliador'";

    $busca_avaliador = mysqli_query($conexao, $query_consulta_avaliador);
    $resultado_avaliador = mysqli_fetch_array($busca_avaliador);
    
    $nome_avaliador = $resultado_avaliador['nome_avaliador'];

    ?>

    <div class="col mt-1">
      <div class="text-left">
        <h6 class="text-primary"> 
          Resumo escrito por <?php echo $nome_escritor;?>, com avaliação atribuída à <?php echo $nome_avaliador;?>
        </h6>
      </div>
      
    </div>
    <!-- 
      Os dois pontos antes do nome são necessários porque o endereço
      do script em execução atual está "dentro" de visualizador.php, por
      causa do id que passamos de administrativo.php para cá usando a URL.
      Por exemplo, supondo que o id passado seja 4, a URL atual seria:
      http://localhost/gerenciadorResumos/visualizador.php/4
    -->
    <iframe src="../arquivos/<?php echo $local;?>" width="100%" height="570px">
    </iframe>
 
  



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>

<!-- 
  Exemplo de utilização do iframe por:
  insta: @hardcode_studios 
-->
