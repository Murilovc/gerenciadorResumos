<!doctype html>
<html lang="en">
  <head>
    <title>Listagem de relatórios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>

    <div class="row mt-4">
        <div class="col">
            <table class="table table-striped">
                <thead class="thead thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nota conteúdo</th>
                        <th>Nota estrutura</th>
                        <th>Nota ortografia</th>
                        <th>Observações</th>
                        <th>Status</th>
                        <th>Data cadastro</th>
                    </tr>
                </thead>
                <tbody id="tabelaRelatorios">
                    <?php 
                        include_once "back-end/conexao.php";
                        require_once "back-end/relatorio/ControleRelatorio.php";

                        $controle_relatorio = new ControleRelatorio();

                        $busca_relatorios = $controle_relatorio->pegar_todos();

                    while($relatorio = mysqli_fetch_array($busca_relatorios));
                    {
                    ?>
                    <td scope="row"><?php echo $relatorio['id_relatorio'];?></td>
                    <td><?php echo $relatorio['nota_conteudo'];?></td>
                    <td><?php echo $relatorio['nota_estrutura'];?></td>
                    <td><?php echo $relatorio['nota_ortografia'];?></td>
                    <td><?php echo $relatorio['observacoes_relatorio'];?></td>
                    <td><?php echo $relatorio['status_relatorio'];?></td>
                    <td><?php echo $relatorio['data_cadastro'];?></td>
                                        
                    <td>
                        <!-- BOTÃO EXCLUIR RELATÓRIO -->
                        <form action="back-end/relatorio/DelecaoRelatorio.php" method="post">
                            <input type="hidden" name="id_relatorio" value="<?php echo $relatorio['id_relatorio'];?>">

                            <input type="submit" value="Excluir" class="btn btn-danger">
                        </form>
                    </td>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    

    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>