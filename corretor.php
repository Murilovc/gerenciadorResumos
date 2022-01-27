 <?php 
        session_start();
?>

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
        
        <div class="container mt-3">

        <?php 
       
        if(!empty($_SESSION['id']) && ($_SESSION['nivel'] == 3) ){
            echo "Logado como avaliador(a) ".$_SESSION['nome'];
            
        }else{
            $_SESSION['msg'] = "Realize o login para continuar!";
           header("Location: login.php");
          
        }
        
        ?>
        
        <form>
            <input type="button" value="Imprimir página" onClick="window.print()"/>
        </form>
        
        
        
        </div>
<br>
        <!-- possíveis: row, col, container-->
        
        <?php
            include_once "back-end/conexao.php";

            require_once "back-end/resumo/ControleResumo.php";
            require_once "back-end/reeducando_leitor/ControleReeducando.php";

            $controle_resumo = new ControleResumo();
            $controle_reeducando = new ControleReeducando();

            
            $id_avaliador = $_SESSION['id'];
            $id_resumo = $_POST['id_resumo'];
            $comentario = $_POST['comentario'];
            
            $resultado_resumo = mysqli_fetch_array($controle_resumo->pesquisar_por_id($id_resumo));
            
            $local = $resultado_resumo['arquivo'];
            
            //coletando informações do escritor
            $id_reeducando = $resultado_resumo['fk_id_escritor'];

            $resultado_reeducando = mysqli_fetch_array($controle_reeducando->pesquisar_por_id($id_reeducando));
            
            $escritor = $resultado_reeducando['nome_reeducando'];
            ?>
        <!-- -->
        
  <iframe src="arquivos/<?php echo $local;?>" width="100%" height="600px"> </iframe>   
  
        <div class="container">

            <!-- 
            Os dois pontos antes do nome são necessários porque o endereço
            do script em execução atual está "dentro" de visualizador.php, por
            causa do id que passamos de administrativo.php para cá usando a URL.
            Por exemplo, supondo que o id passado seja 4, a URL atual seria:
            http://localhost/gerenciadorResumos/visualizador.php/4
            -->
            


            <form action="back-end/relatorio/CadastroRelatorio.php" method="POST">
                


                <table class="table">
                    <thead>
                    <tr>
                        <th>Conteúdo</th>
                        <th>Estrutura</th>
                        <th>Ortografia</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        <td> 
                            <select class="form-control" name="nota_conteudo">
                                <option value="0.0">0,0</option>
                                <option value="0.5">0,5</option>
                                <option value="1.0">1,0</option>
                                <option value="1.5">1,5</option>
                                <option value="2.0">2,0</option>
                                <option value="2.5">2,5</option>
                                <option value="3.0">3,0</option>
                                <option value="3.5">3,5</option>
                                <option value="4.0">4,0</option>
                                <option value="4.5">4,5</option>
                                <option value="5.0">5,0</option>
                            </select>
                        </td>

                        <td>
                            <select class="form-control" name="nota_estrutura">
                                <option value="0.0">0,0</option>
                                <option value="0.5">0,5</option>
                                <option value="1.0">1,0</option>
                                <option value="1.5">1,5</option>
                                <option value="2.0">2,0</option>
                            </select>
                        </td>

                        <td>
                            <select class="form-control" name="nota_ortografia">
                                <option value="0.0">0,0</option>
                                <option value="0.5">0,5</option>
                                <option value="1.0">1,0</option>
                                <option value="1.5">1,5</option>
                                <option value="2.0">2,0</option>
                                <option value="2.5">2,5</option>
                                <option value="3.0">3,0</option>
                            </select>
                        </td>
                    </tr>

                    </tbody>
                </table>

                <div class="form-group">
                    
                    <h5>Observações:</h5>
                
                    <textarea rows="7" cols="20" name="observacoes_relatorio" type="text" class="form-control" id="inputComentario" placeholder="Comentários"><?php echo $comentario;?></textarea>
                    
                    <input type="hidden" name="id_resumo" value="<?php echo $id_resumo?>">
                    <input type="hidden" name="id_reeducando" value="<?php echo $id_reeducando ?>">
                    
                </div>

                <button type="submit" class="btn btn-primary">Salvar relatório</button>
            </form>
        </div>
        

        <br>
        <br>

        <!--<div style="float: left;">-->


        <!--</div>-->
        
        

  
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!--<script>
            $("#comentarios").bind("input", function(e) {
                while( $(this).outerHeight() < this.scrollHeight +
                                   parseFloat($(this).css("borderTopWidth")) +
                                   parseFloat($(this).css("borderBottomWidth"))
                    && $(this).height() < 500 // Altura máxima
            ) {
                    $(this).height($(this).height()+1);
                };
            });
        </script>-->

    </body>
    
</html>