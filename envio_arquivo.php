<!doctype html>
<html lang="en">
<head>
    <title>Envio de resumos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php include "back-end/menu.php"?>


 <div class="container">   
    <?php 
    session_start();
    if(!empty($_SESSION['id']) && (($_SESSION['nivel'] == 0) or ($_SESSION['nivel'] == 1))){
        echo "Olá, ".$_SESSION['nome'];
    }else{
        $_SESSION['msg'] = "Realize o login para continuar!";
        header("Location: login.php");
    }

    include_once "back-end/conexao.php";
    
    ?>
    <div class="row mt-4">
        <div class="col text-left">
            <h4 class="text-primary">
                Upload de resumos em .pdf<br>
                Preencha as informações e anexe o arquivo do resumo
            </h4>
            
            <form enctype="multipart/form-data" action="./back-end/resumo/CadastroResumo.php" method="POST">
                
                <div class="col text-left">
                    
                    <input type="hidden" name="pagina_atual" value="envio_arquivo.php">
                    
                    <div class="form-group">
                        <label for="exampleInputTitulo">Título</label>
                        <input name="titulo" type="name" class="form-control" id="exampleInputTitulo" Required>
                    </div>
                    
                    <?php
                    $query_listar = 
                    "SELECT * FROM reeducandos";

                    $buscar_escritores = mysqli_query($conexao, $query_listar);

                
                    ?>
                    <div class="form-group">
                        <label for="exampleInputNome">Nome do Escritor</label>
                        <select name="fk_id_escritor" class="form-control" Required>
                        <option value="">Selecione abaixo</option>
                        <?php 
                        //enquanto a lista não chegar no último elemento (nulo)
                        //INÍCIO DO WHILE
                        while($retorno_cadastro = mysqli_fetch_array($buscar_escritores))
                        {
                            ?>
                            <option value="<?php echo $retorno_cadastro['id_reeducando']?>"><?php echo $retorno_cadastro['nome_reeducando']?></option>
                            <?php
                        }
                        //FIM DO WHILE
                        ?>
                        </select>

                    </div>

                    <?php
                    $query_listar_avaliadores = 
                    "SELECT * FROM avaliadores";

                    $buscar_avaliadores = mysqli_query($conexao, $query_listar_avaliadores);

                
                    ?>
                    <div class="form-group">
                        <label for="exampleInputNome">Quem deve avaliar este resumo?</label>
                        <select name="fk_id_avaliador" class="form-control" Required>
                            <option value="">Selecione abaixo</option>
                        <?php 
                        //enquanto a lista não chegar no último elemento (nulo)
                        //INÍCIO DO WHILE
                        while($retorno_cadastro = mysqli_fetch_array($buscar_avaliadores))
                        {
                            ?>
                            <!-- value é o valor que será retornado deste seletor quando o 
                            formulário for enviado. -->
                            <option value="<?php echo $retorno_cadastro['id_avaliador']?>">
                                <!-- Isto é o que será exibido para o usuário selecionar-->
                                <?php echo $retorno_cadastro['nome_avaliador']?>
                            </option>
                            
                            <?php
                        }
                        //FIM DO WHILE
                        ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Arquivo</label>
                        <input name="arquivo" type="file" class="form-control-file" Required>


                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                
            </form>

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