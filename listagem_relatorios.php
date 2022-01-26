<!doctype html>
<html lang="en">
    <head>
        <title>Relatórios</title>
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
                if(!empty($_SESSION['id']) && (($_SESSION['nivel'] == 0) or ($_SESSION['nivel'] == 3) or ($_SESSION['nivel'] == 4))){
                   
                }else{
                    $_SESSION['msg'] = "Realize o login para continuar!";
                    header("Location: login.php");
                }
        

        
                ?>
        
<div class="container">
    
    <h4 class="mt-4">Listagem para aprovação do Diretor</h4>
    <span class="text-danger">Basta clicar para mudar o status</span>
    <div class="row mt-4">
        <div class="col">
            <table class="table table-striped">
                <thead class="thead thead-dark">
                    <tr>
                        <th>RGC</th>
                        <th>Avaliador</th>
                        <th>Nota conteúdo</th>
                        <th>Nota estrutura</th>
                        <th>Nota ortografia</th>
                        <th>Observações</th>
                        <th>Arquivo</th>
                        <th>Data cadastro</th>
                        <?php if($_SESSION['nivel'] == 3 or $_SESSION['nivel'] == 1){ }else{ ?>
                        <th>Ações</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody id="tabelaRelatorios">
                    <?php 
                        include_once "back-end/conexao.php";
                        require_once "back-end/relatorio/ControleRelatorio.php";

                        $controle_relatorio = new ControleRelatorio();
                        
                        $id_aval = $_SESSION['id'];

                         if($_SESSION['nivel'] == 3){
                              $query_listar =   "SELECT *
                             FROM relatorios
                             WHERE id_avaliadores = '$id_aval '
                             ";
                         }else{
                        
                          $query_listar =   "SELECT *
                             FROM relatorios
                             ";
                         }
                         
                            $busca_relatorios = mysqli_query($conexao, $query_listar) or die(mysqli_error($conexao));

                    while($relatorio = mysqli_fetch_array($busca_relatorios))
                    {
                        
                        
                        $avaliadores = $relatorio['id_avaliadores'];
                        $rgc = $relatorio['id_rgc'];
                        
                          $query_listar_avaliadores =   "SELECT *
                             FROM avaliadores
                             WHERE id_avaliador = '$avaliadores'
                             ";
                
                            $busca_avaliador = mysqli_query($conexao, $query_listar_avaliadores) or die(mysqli_error($conexao));

                            $nomeAvaliador = mysqli_fetch_array($busca_avaliador);
                            
                            
                            //buscar rgc
                            
                             $query_listar_reeducandos =   "SELECT *
                             FROM reeducandos
                             WHERE rgc_reeducando = '$rgc'
                             ";
                
                            $busca_ree = mysqli_query($conexao, $query_listar_reeducandos) or die(mysqli_error($conexao));

                            $nomeree= mysqli_fetch_array($busca_ree);
                            
                            
                              //buscar resumos
                              
                              $reed = $nomeree['id_reeducando'];
                            
                             $query_listar_resumos=   "SELECT *
                             FROM resumos
                             WHERE fk_id_escritor = '$reed'
                             ";
                
                            $busca_resumos = mysqli_query($conexao, $query_listar_resumos) or die(mysqli_error($conexao));

                            $nomeresumos= mysqli_fetch_array($busca_resumos);
                    
                    ?>
                    <tr>
                    <td scope="row" class="text-primary"><?php echo $nomeree['rgc_reeducando'];?></td>
                    <td scope="row" class="text-primary"><?php echo $nomeAvaliador['nome_avaliador'];?></td>
                    <td><?php echo $relatorio['nota_conteudo'];?></td>
                    <td><?php echo $relatorio['nota_estrutura'];?></td>
                    <td><?php echo $relatorio['nota_ortografia'];?></td>
                    <td><?php echo $relatorio['observacoes_relatorio'];?></td>
                    <td class="text-primary"> <a href="http://apps-proex.ufac.br/projetoNove/arquivos/<?php echo $nomeresumos['arquivo']; ?>" target="_blank" >ver</a> </td>
                    <td><?php echo $relatorio['data_cadastro'];?></td>
                        
                        <?php if($_SESSION['nivel'] == 3 or $_SESSION['nivel'] == 1){ }else{ ?>                
                    <td>
                        <!-- BOTÃO EXCLUIR RELATÓRIO -->
                        <form action="back-end/relatorio/AprovaRelatorio.php" method="post">
                            <input type="hidden" name="id_relatorio" value="<?php echo $relatorio['id_relatorio'];?>">
                            <input type="hidden" name="id_status" value="<?php echo $relatorio['status_relatorio'];?>">
                            
                            <?php 
                            
                            $saber = $relatorio['status_relatorio'];
                            if($saber == 1){
                            
                            ?>
                            <input type="submit" value="Aprovar" class="btn btn-danger">
                            
                            <?php
                            
                            }else{   ?>
                            
                            <input type="submit" value="Aprovado" class="btn btn-success">
                            
                              <?php
                                
                            }
                            
                            ?>
                            
                        </form>
                    </td>
                     <?php } ?>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
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