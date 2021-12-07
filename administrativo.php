<!-- 

Toda a parte do layout da administração do banco de dados
pelo admin vai ser feita aqui, incluíndo cadastro, atualização e
deleção de qualquer entidade do banco de dados.

-->


<!doctype html>
<html lang="en">
    <head>
        <title>Correção de Resumos</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    
    <body>


        
        <?php include "back-end/menu.php"?>
    
        <div class="container">    
            <!-- significa margin-top 4-->
            <div class="row mt-4">
                <div class="col">
                    <h3 class="text-primary">Olá administrador!<br>
                    Selecione uma entidade para começar...<br><br>
                    <h3></h3> 
                </div>
            </div>
        
            <!--
                *********************BOTÃO COLLAPSE AVALIADORES*************************
                Quando o usuário clicar neste botão, serão exibidas as opções de
                cadastro, edição e deleção, por meio de uma listagem em forma de tabela. 
                ************************************************************************
            -->
            <button data-toggle="collapse" data-target="#collapseAvaliadores" class="btn btn-success btn-block">Avaliadores</button>

            <div id="collapseAvaliadores" class="collapse">

                <!-- significa margin-top 4-->
                <div class="row mt-4">
                    <div class="col">
                        <h3 class="text-primary">Gerenciamento de Avaliadores</h3>
                    </div>
                    <div class="col text-right">
                        <!-- BOTÃO CADASTRAR AVALIADOR-->
                        <button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#modalAvaliadores">
                            Novo Avaliador
                        </button>
                    </div>
                </div>
                <br>
                <div class="row mt-4">
        
                    <div class="col">
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Ação editar</th>
                                        <th>Ação apagar</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php

                                        include "back-end/conexao.php";

                                        //consulta sql para retornar todos
                                        //os avaliadores
                                        $query_listar = 
                                        "SELECT * FROM avaliadores";

                                        $buscar_avaliadores = mysqli_query($conexao, $query_listar);

                                        
                                        //enquanto a lista não chegar no último lemento (nulo)
                                        while($retorno_cadastro = mysqli_fetch_array($buscar_avaliadores))
                                        {
                                    ?>
                                    <tr>
                                        <td scope="row"><?php echo $retorno_cadastro['id_avaliador'];?></td>
                                        <td><?php echo $retorno_cadastro['nome_avaliador'];?></td>
                                        <td><?php echo $retorno_cadastro['telefone'];?></td>
                                        <td><?php echo $retorno_cadastro['email'];?></td>
                                            
                                        <td>
                                            <!-- BOTÃO EDITAR AVALIADOR -->
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAvaliadoresEdicao<?php echo $retorno_cadastro['id_avaliador'];?>">
                                                Editar
                                            </button>
                                        </td>
                                            
                                        <td>
                                            <!-- BOTÃO EXCLUIR AVALIADOR -->
                                            <form action="back-end/avaliador/DelecaoAvaliador.php" method="post">
                                                <input type="hidden" name="id_avaliador" value="<?php echo $retorno_cadastro['id_avaliador'];?>">

                                                <input type="submit" value="Excluir" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- aqui vai a janela modal de edicao -->
                                    <!-- The Modal -->
                                    <div class="modal fade" id="modalAvaliadoresEdicao<?php echo $retorno_cadastro['id_avaliador'];?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Editar avaliador</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form action="back-end/avaliador/EdicaoAvaliador.php" method="post">
                                                        <input type="hidden" name="id_avaliador" value="<?php echo $retorno_cadastro['id_avaliador'];?>">

                                                        <div class="form-group">
                                                            <label for="inputNome">Nome</label>
                                                            <input type="text" name="nome_avaliador" value="<?php echo $retorno_cadastro['nome_avaliador']; ?>" class="form-control" id="inputNome">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="inputTelefone">Telefone</label>
                                                            <input type="text" name="telefone" value="<?php echo $retorno_cadastro['telefone']; ?>" class="form-control" id="inputTelefone">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="inputEmail">Email</label>
                                                            <input type="text" name="email" value="<?php echo $retorno_cadastro['email']; ?>" class="form-control" id="inputEmail">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="inputSenha">Senha</label>
                                                            <input type="text" name="senha_avaliador" value="" class="form-control" id="inputSenha">

                                                        </div>
                                                        
                                                        <input type="submit" value="EDITAR" class="btn btn-warning">

                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <?php 
                                       }?>
                                </tbody>
                            </table>

                            <hr>

                        <!-- Aqui vai a tabela -->
                    </div>
                    
                </div>

            </div>

            <br>

            <!--
                *********************BOTÃO COLLAPSE ESCRITORES**************************
                Quando o usuário clicar neste botão, serão exibidas as opções de
                cadastro, edição e deleção, por meio de uma listagem em forma de tabela. 
                ************************************************************************
            -->
            
            <button data-toggle="collapse" data-target="#collapseEscritores" class="btn btn-success btn-block">Escritores</button>
            
            <div id="collapseEscritores" class="collapse">
                <div class="row mt-4">
                    <div class="col">
                        <h3 class="text-primary">Gerenciamento de Escritores</h3>
                    </div>
                    <div class="col text-right">
                        <!-- BOTÃO CADASTRAR ESCRITOR-->
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalEscritores">
                            Novo Escritor 
                        </button>
                    </div>
                </div>

                <!-- TABELA PARA LISTAGEM DOS ESCRITORES -->

                <div class="row mt-4">
        
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Data cadastro</th>
                                    <th>Ação editar</th>
                                    <th>Ação apagar</th>
                                </tr>
                            </thead>
                            <tbody id="tabelaEscritores">
                                <?php

                                    include "back-end/conexao.php";

                                    //consulta sql para retornar todos
                                    //os avaliadores
                                    $query_listar = 
                                    "SELECT * FROM escritores";

                                    $buscar_escritores = mysqli_query($conexao, $query_listar);

                                    
                                    //enquanto a lista não chegar no último elemento (nulo)
                                    while($retorno_cadastro = mysqli_fetch_array($buscar_escritores))
                                    {
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $retorno_cadastro['id_escritor'];?></td>
                                    <td><?php echo $retorno_cadastro['nome_escritor'];?></td>
                                    <td><?php echo $retorno_cadastro['data_cadastro'];?></td>
                                        
                                    <td>
                                        <!-- BOTÃO EDITAR AVALIADOR -->
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEscritoresEdicao<?php echo $retorno_cadastro['id_escritor'];?>">
                                            Editar
                                        </button>
                                    </td>
                                        
                                    <td>
                                        <!-- BOTÃO EXCLUIR AVALIADOR -->
                                        <form action="back-end/escritor/DelecaoEscritor.php" method="post">
                                            <input type="hidden" name="id_escritor" value="<?php echo $retorno_cadastro['id_escritor'];?>">

                                            <input type="submit" value="Excluir" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>

                                <!-- aqui vai a janela modal de edicao -->
                                <!-- The Modal -->
                                <div class="modal fade" id="modalEscritoresEdicao<?php echo $retorno_cadastro['id_escritor'];?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar escritor</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="back-end/escritor/EdicaoEscritor.php" method="post">
                                                    <input type="hidden" name="id_escritor" value="<?php echo $retorno_cadastro['id_escritor'];?>">

                                                    <input type="text" name="nome_escritor" value="<?php echo $retorno_cadastro['nome_escritor']; ?>" class="form-control">
                                                    
                                                    <input type="submit" value="EDITAR" class="btn btn-warning">

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    }?>
                            </tbody>
                        </table>

                        <hr>

                        
                    </div>
                    
                </div>

            </div>


            <br>

            <!--
                *********************BOTÃO COLLAPSE RESUMOS**************************
                Quando o usuário clicar neste botão, serão exibidas as opções de
                cadastro, edição e deleção, por meio de uma listagem em forma de tabela. 
                ************************************************************************
            -->

            <button data-toggle="collapse" data-target="#collapseResumos" class="btn btn-success btn-block">Resumos</button>

            <div id="collapseResumos" class="collapse">

                <div class="row mt-4">
                    <div class="col">
                        <h3 class="text-primary">Gerenciamento de Resumos</h3>
                    </div>
                    <div class="col text-right">
                        <!-- BOTÃO CADASTRAR RESUMO-->
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalResumos">
                            Novo Resumo
                        </button>
                    </div>
                </div>

                <!-- TABELA PARA LISTAGEM DOS RESUMOS -->

                <div class="row mt-4">
                    
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Título</th>
                                    <th>Ação ver arquivo</th>
                                    <th>Data</th>
                                    <th>Ação editar</th>
                                    <th>Ação apagar</th>
                                </tr>
                            </thead>
                            <tbody id="tabelaResumos">
                                <?php

                                    include "back-end/conexao.php";

                                    //consulta sql para retornar todos
                                    //os avaliadores
                                    $query_listar = 
                                    "SELECT * FROM resumos";

                                    $buscar_escritores = mysqli_query($conexao, $query_listar);

                                    
                                    //enquanto a lista não chegar no último elemento (nulo)
                                    while($retorno_cadastro = mysqli_fetch_array($buscar_escritores))
                                    {
                                ?>
                                
                                <tr>
                                    <!-- LISTAGEM DOS RESUMOS -->
                                    <td scope="row"><?php echo $retorno_cadastro['id_resumo'];?></td>
                                    <td><?php echo $retorno_cadastro['titulo'];?></td>
                                   
                                    <td>
                                        <!-- BOTÃO VER RESUMO -->
                                        <form action="visualizador.php" method="post">
                                            <!-- TO DO: pegar o nome do arquivo a ser aberto da tabela resumos-->
                                            <input type="hidden" name="arquivo" value="Plano de Trabalho_CCET175ESTAGIO - Murilo e Paulo. v3.pdf">

                                            <input type="submit" value="Ver" class="btn btn-primary">
                                        </form>   
                                    </td>

                                    <a href="http://visualizador.php" target="_blank">Ver</a>
                                    
                                    <td><?php echo $retorno_cadastro['data_cadastro'];?></td>    
                                    
                                    <td>
                                        <!-- BOTÃO EDITAR AVALIADOR -->
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalResumosEdicao<?php echo $retorno_cadastro['id_resumo'];?>">
                                            Editar
                                        </button>
                                    </td>
                                        
                                    <td>
                                        <!-- BOTÃO EXCLUIR AVALIADOR -->
                                        <form action="back-end/resumo/DelecaoResumo.php" method="post">
                                            <input type="hidden" name="id_resumo" value="<?php echo $retorno_cadastro['id_resumo'];?>">

                                            <input type="submit" value="Excluir" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>

                                <!-- aqui vai a janela modal de edicao -->
                                <!-- The Modal -->
                                <div class="modal fade" id="modalEscritoresEdicao<?php echo $retorno_cadastro['id_escritor'];?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar escritor</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="back-end/escritor/EdicaoEscritor.php" method="post">
                                                    <input type="hidden" name="id_escritor" value="<?php echo $retorno_cadastro['id_escritor'];?>">

                                                    <input type="text" name="nome_escritor" value="<?php echo $retorno_cadastro['nome_escritor']; ?>" class="form-control">
                                                    
                                                    <input type="submit" value="EDITAR" class="btn btn-warning">

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    }?>
                            </tbody>
                        </table>

                        <hr>

                        
                    </div>
                    
                </div>











            </div>

            <br>

            <!--
                *********************BOTÃO COLLAPSE COMENTÁRIOS**************************
                Quando o usuário clicar neste botão, serão exibidas as opções de
                cadastro, edição e deleção, por meio de uma listagem em forma de tabela.
                ************************************************************************
            -->

            <button data-toggle="collapse" data-target="#collapseComentarios" class="btn btn-success btn-block">Comentários</button>

            <div id="collapseComentarios" class="collapse">

                <div class="row mt-4">
                    <div class="col">
                        <h3 class="text-primary">Gerenciamento de Comentários (tabela não implementada ainda)</h3>
                    </div>
                    <div class="col text-right">
                        <!-- BOTÃO CADASTRAR COMENTÁRIO-->
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalComentarios">
                            Novo Comentário
                        </button>
                    </div>
                </div>

                <div class="row mt-4">
        
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Texto</th>
                                    <th>Data cadastro</th>
                                    <th>Avaliador</th>
                                    <th>Referente ao resumo</th>
                                    <th>Ação editar</th>
                                    <th>Ação apagar</th>
                                </tr>
                            </thead>
                            <tbody id="tabelaComentarios">
                                <?php

                                    include "back-end/conexao.php";

                                    //consulta sql para retornar todos
                                    //os comentarios
                                    $query_listar = 
                                    "SELECT * FROM comentarios";

                                    $buscar_comentarios = mysqli_query($conexao, $query_listar);

                                    
                                    //enquanto a lista não chegar no último elemento (nulo)
                                    while($retorno_cadastro = mysqli_fetch_array($buscar_comentarios))
                                    {
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $retorno_cadastro['id'];?></td>
                                    <td><?php echo $retorno_cadastro['texto'];?></td>
                                    <td><?php echo $retorno_cadastro['data'];?></td>
                                    <td><?php echo $retorno_cadastro['fk_id_avaliador'];?></td>
                                    <td><?php echo $retorno_cadastro['fk_id_redacao'];?></td>
                                        
                                    <td>
                                        <!-- BOTÃO EDITAR AVALIADOR -->
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalComentariosEdicao<?php echo $retorno_cadastro['id'];?>">
                                            Editar
                                        </button>
                                    </td>
                                        
                                    <td>
                                        <!-- BOTÃO EXCLUIR AVALIADOR -->
                                        <form action="back-end/comentario/DelecaoComentario.php" method="post">
                                            <input type="hidden" name="id" value="<?php echo $retorno_cadastro['id'];?>">

                                            <input type="submit" value="Excluir" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>

                                <!-- aqui vai a janela modal de edicao -->
                                <!-- The Modal -->
                                <div class="modal fade" id="modalComentariosEdicao<?php echo $retorno_cadastro['id'];?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Editar comentário</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="back-end/comentario/EdicaoComentario.php" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $retorno_cadastro['id'];?>">

                                                    <input type="text" name="texto" value="<?php echo $retorno_cadastro['texto']; ?>" class="form-control">
                                                    
                                                    <input type="submit" value="EDITAR" class="btn btn-warning">

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    }?>
                            </tbody>
                        </table>

                        <hr>

                        
                    </div>
                    
                </div>









            </div>

            <br>


            <!--
                ************* MODAIS DE CADASTRO***************************
                
                Na tag header seguinte, estão as janelas modais com formulários para
                cadastro e edição das entidades.
                Cada modal tem formulário com ação que interage com o back-end.
                
                ***********************************************************
            --->


            <header>
                <!-- 
                    MODAL PARA FORMULÁRIO DE AVALIADORES 
                -->
                <div class="modal fade" id="modalAvaliadores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        
                        <!--Formulário que será puxado pelo método $_POST e depois tratado
                        na classe CadastroAvaliador.php-->
                        <form action="./back-end/avaliador/CadastroAvaliador.php" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Avaliador</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label for="inputNome">Nome</label>
                                                <input name="nome_avaliador" type="name" class="form-control" id="inputNome" aria-describedby="NomeHelp" placeholder="Nome">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputTelefone">Telefone</label>
                                                <input name="telefone" type="tel" class="form-control" id="inputTelefone" placeholder="(99)123456789">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="joao.silva@exemplo.com">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSenha">Senha</label>
                                                <input name="senha_avaliador" type="name" class="form-control" id="inputSenha" placeholder="senha">
                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <!-- 
                    MODAL PARA FORMULÁRIO DE ESCRITORES 
                -->
                <div class="modal fade" id="modalEscritores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        
                        <!--Formulário que será puxado pelo método $_POST e depois tratado
                        na classe CadastroEscritor.php-->
                        <form action="./back-end/escritor/CadastroEscritor.php" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Escritor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label for="inputNome">Nome</label>
                                                <input name="nome_escritor" type="name" class="form-control" id="inputNome" aria-describedby="NomeHelp" placeholder="Nome">
                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- 
                    MODAL COM FORMULÁRIO DE RESUMO
                -->
                <div class="modal fade" id="modalResumos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        
                        <!--Formulário que será puxado pelo método $_POST e depois tratado
                        na classe CadastroResumo.php-->
                        <form action="./back-end/resumo/CadastroResumo.php" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Resumo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">

                                        <?php
                                        $query_listar = 
                                        "SELECT * FROM escritores";

                                        $buscar_escritores = mysqli_query($conexao, $query_listar);

                                    
                                        ?>
                                        <div class="form-group">
                                            <label for="exampleInputNome">Nome do Escritor</label>
                                            <select name="fk_id_escritor" class="form-control">
                        
                                            <?php 
                                            //enquanto a lista não chegar no último elemento (nulo)
                                            //INÍCIO DO WHILE
                                            while($retorno_cadastro = mysqli_fetch_array($buscar_escritores))
                                            {
                                            ?>
                                                <option value="<?php echo $retorno_cadastro['id_escritor']?>"><?php echo $retorno_cadastro['nome_escritor']?></option>
                                            <?php
                                            }
                                            //FIM DO WHILE
                                            ?>
                                            </select>


                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputTitulo">Título</label>
                                            <input name="titulo" type="name" class="form-control" id="exampleInputTitulo">
                                        </div>

                                        

                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Arquivo</label>
                                            <input name="arquivo" type="file" class="form-control-file">

                                            <input name="id_user" type="hidden" value="1">
                                            <input name="teste" value="nova_redacao" type="hidden">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>





                <!-- 
                    MODAL PARA FORMULÁRIO DE COMENTÁRIOS 
                -->
                <div class="modal fade" id="modalComentarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        
                        <!--Formulário que será puxado pelo método $_POST e depois tratado
                        na classe CadastroComentario.php-->
                        <form action="./back-end/comentario/CadastroComentario.php" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Comentário</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label for="inputNome">Texto do comentário</label>
                                                <input name="texto" type="name" class="form-control" id="inputNome" aria-describedby="NomeHelp" placeholder="Comentario">
                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </header>

        

        </div>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    </body>
</html>

