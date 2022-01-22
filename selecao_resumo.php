<!doctype html>
<html lang="en">
    <head>
        <title>Seleção de resumo</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php 

        include "back-end/menu.php";


        session_start();
        if(!empty($_SESSION['id']) && $_SESSION['nivel'] == 2){
            echo "Entrada bem-sucedida, ".$_SESSION['nome'];
        }else{
            $_SESSION['msg'] = "Realize o login para continuar!";
            header("Location: login.php");
        }

        include_once "back-end/conexao.php";

        
        //pegando as informações do avaliador
        $id_avaliador = $_SESSION['id'];

        $query_avaliador = 
        "SELECT id_avaliador, nome_avaliador 
        FROM avaliadores 
        WHERE id_avaliador='$id_avaliador'
        ";
        
        $busca_avaliador = mysqli_query($conexao, $query_avaliador);

        $avaliador = mysqli_fetch_array($busca_avaliador);

        //pegando as informações dos resumos associados ao avaliador acima
        $query_resumos =
        "SELECT id_resumo, titulo, fk_id_escritor, comentario, arquivo, data_cadastro, fk_id_avaliador
        FROM resumos
        WHERE fk_id_avaliador='$id_avaliador'
        ";

        $busca_resumos = mysqli_query($conexao, $query_resumos);

        ?>

        <!-- significa margin-top 4-->
        <div class="row mt-4">
            <div class="col">
                <h3 class="text-primary">
                    Página de Seleção de Resumo<br><br>
                </h3>
                <h3 class="text-primary">
                    Lista de resumos com avaliação atribuída à <?php echo $avaliador['nome_avaliador']?>
                </h3>

                <table class="table table-striped">
                    <!-- Cabeçalho da tabela-->
                    <thead class="thead thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Título</th>
                            <!-- Colocar aqui ao invés de só obs. também as notas-->
                            <th>Observação</th>
                            <th>Data cadastro</th>
                            <th>RGC do reeducando leitor</th>
                            <th>Ação avaliar</th>
                        </tr>
                    </thead>
                    <!-- Corpo da tabela-->
                    <tbody id="tabelaSelecaoResumo">

                        <?php 
                        while($resumo = mysqli_fetch_array($busca_resumos))
                        {?>    
                            <tr>    
                            <td scope="row"><?php echo $resumo['id_resumo'];?></td>
                            <td><?php echo $resumo['titulo'];?></td>
                            <td>
                                <?php
                                //FALTA FAZER A RELAÇÃO ENTRE AS ENTIDADES PARA ISSO FUNCIONAR
                                //require_once "back-end/relatorio/ControleRelatorio.php";
                                //$controle_relatorio = new ControleRelatorio();
                                //$relatorio = $controle_relatorio->pesquisar_por_id();
                                $comentario = NULL;
                                //INÍCIO DO IF
                                if(isset($resumo['comentario']) == true){ 
                                    
                                    $comentario = $resumo['comentario']?>
                                    
                                    <!-- BOTÃO VER COMENTARIO -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVerComentario<?php echo $resumo['id_resumo'];?>">
                                        Ver
                                    </button>

                                    <div class="modal fade" id="modalVerComentario<?php echo $resumo['id_resumo'];?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Cabeçalho do modal -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Ver comentário</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Corpo do modal -->
                                                <div class="modal-body">
                                                    <textarea rows="9" cols="60" name="comentario" type="text"><?php echo $comentario?></textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    echo "<h6 style='color: Red;'>Resumo ainda não avaliado</h6>";
                                }
                                //FIM DO IF ELSE
                                
                                ?>
                            </td>
                            <td><?php echo $resumo['data_cadastro'];?></td>
                            <td>
                                <?php 
                                $id_reeducando = $resumo['fk_id_escritor'];

                                //consulta para retornar o nome de um escritor baseado em id
                                $query_escritor = 
                                "SELECT rgc_reeducando, id_reeducando
                                FROM reeducandos
                                WHERE id_reeducando='$id_reeducando'
                                ";

                                $busca_escritor = mysqli_query($conexao, $query_escritor);

                                $escritor = mysqli_fetch_array($busca_escritor);

                                echo $escritor['rgc_reeducando'];
                                ?>
                            </td>
                            <td>
                                <form action="corretor.php" method="POST">
                                    <input type="hidden" name="id_resumo" value="<?php echo $resumo['id_resumo'];?>">


                                    <input type="hidden" name="comentario" value="<?php $boolean = isset($comentario); echo $boolean == true ? $comentario : "";?>">


                                    <input type="submit" value="Avaliar" class="btn btn-warning">
                                </form>
                            </td>
                            </tr>
                         <?php 
                        }?>
                    </tbody>
                </table>

                <hr>
                
                <!-- 
                    IMPLEMENTAR NO FUTURO UMA SEGUNDA TABELA AQUI, DE FORMA 
                    A PERMITIR QUE O PRÓPRIO PROFESSOR AVALIADOR ESCOLHA ADICIONAR
                    DETERMINADO RESUMO À SUA LISTA. 
                -->
                <!-- h3 class="text-primary" Outros resumos -->
                
            </div>
        </div>

        <?php include "rodape.php";?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>