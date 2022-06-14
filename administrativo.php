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



  <?php include "back-end/menu.php" ?>

  <?php

  require_once "back-end/avaliador/ControleAvaliador.php";
  require_once "back-end/reeducando_leitor/ControleReeducando.php";
  require_once "back-end/resumo/ControleResumo.php";
  require_once "back-end/usuario/ControleUsuario.php";

  /*Instanciando as classes de controle SQL*/
  $controle_avaliador = new ControleAvaliador();
  $controle_escritor = new ControleReeducando();
  $controle_resumo = new ControleResumo();
  $controle_usuario = new ControleUsuario();

  ?>

  <div class="container">

    <div class="text-right">
      <?php
      session_start();
      if (!empty($_SESSION['id']) && $_SESSION['nivel'] != 0) {
        $_SESSION['msg'] = "Realize o login para continuar!";
        header("Location: login.php");
      }
      ?>
    </div>
    <!-- significa margin-top 4-->
    <div class="row mt-4">
      <div class="col">
        <h4 class="text-primary">Olá <?php echo $_SESSION['nome']; ?>!<br>
          Selecione uma opção para começar...<br><br>
          <h4>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col">
        <!--DESCOMENTAR SE ENVIAR PARA O SERVIDOR
          Clique <a type="button" class="btn-primary" href="http://apps-proex.ufac.br/projetoNove/listagem_relatorios.php" target="_blank">AQUI</a> para ver TODAS as avaliações do DIRETOR<br>
        -->
        <!-- 
          Clique <a type="button" class="btn-primary" href="listagem_relatorios.php" target="_blank">AQUI</a> para ver TODAS as avaliações do DIRETOR<br>
        -->
        <h4>
      </div>
    </div>
    <hr>
    <p></p>
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
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalAvaliadores">
            Novo Avaliador
          </button>
        </div>
      </div>
      <br>

      <input class="form-control" id="pesquisaAvaliadores" type="text" placeholder="Pesquisar...">

      <br>
      <div class="row mt-4">

        <div class="col">
          <table class="table table-striped">
            <thead class="thead thead-dark">
              <tr>

                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Instituição</th>
                <th>Editar</th>

              </tr>
            </thead>
            <tbody id="tabelaAvaliadores">
              <?php

              include "back-end/conexao.php";

              //consulta sql para retornar todos
              //os avaliadores



              $busca_avaliadores = $controle_avaliador->pegar_todos();


              //enquanto a lista não chegar no último elemento (nulo)
              while ($retorno_cadastro = mysqli_fetch_array($busca_avaliadores)) {
              ?>
                <tr>

                  <td><?php echo $retorno_cadastro['nome_avaliador']; ?></td>

                  <?php
                  include_once "back-end/Util.php";
                  $tele = (string)$retorno_cadastro['telefone'];
                  $utile = new Util();

                  ?>
                  <td>
                    <?php

                    echo $utile->formatar_telefone($tele, 68);

                    ?>
                  </td>
                  <td><?php echo $retorno_cadastro['email']; ?></td>
                  <td><?php echo $retorno_cadastro['instituicao_avaliador'] ?></td>

                  <td>
                    <!-- BOTÃO EDITAR AVALIADOR -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAvaliadoresEdicao<?php echo $retorno_cadastro['id_avaliador']; ?>">
                      Editar
                    </button>
                  </td>


                </tr>

                <!-- aqui vai a janela modal de edicao -->
                <!-- The Modal -->
                <div class="modal fade" id="modalAvaliadoresEdicao<?php echo $retorno_cadastro['id_avaliador']; ?>">
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
                          <input type="hidden" name="id_avaliador" value="<?php echo $retorno_cadastro['id_avaliador']; ?>">

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
                            <input type="password" name="senha_avaliador" value="" class="form-control" id="inputSenha">

                          </div>
                          <div class="form-group">
                            <label for="inputinstituicao">Instituição</label>
                            <input type="text" name="instituicao" value="<?php echo $retorno_cadastro['instituicao_avaliador']; ?>" class="form-control" id="inputinstituicao">

                          </div>

                          <input type="submit" value="Salvar edição" class="btn btn-warning">

                        </form>
                      </div>

                    </div>
                  </div>
                </div>

              <?php
              } ?>
            </tbody>
          </table>

          <hr>

          <!-- Aqui vai a tabela -->
        </div>

      </div>

    </div>

    <br>

    <!--
                *********************BOTÃO COLLAPSE REEDUCANDOS**************************
                Quando o usuário clicar neste botão, serão exibidas as opções de
                cadastro, edição e deleção, por meio de uma listagem em forma de tabela. 
                ************************************************************************
            -->

    <button data-toggle="collapse" data-target="#collapseEscritores" class="btn btn-success btn-block">Reeducandos leitores</button>

    <div id="collapseEscritores" class="collapse">
      <div class="row mt-4">
        <div class="col">
          <h3 class="text-primary">Gerenciamento de Reeducandos</h3>
        </div>
        <div class="col text-right">
          <!-- BOTÃO CADASTRAR ESCRITOR-->
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalEscritores">
            Novo Reeducando
          </button>
        </div>
      </div>

      <br>

      <input class="form-control" id="pesquisaEscritores" type="text" placeholder="Pesquisar...">

      <br>

      <!-- TABELA PARA LISTAGEM DOS ESCRITORES -->

      <div class="row mt-4">

        <div class="col">
          <table class="table table-striped">
            <thead class="thead thead-dark">
              <tr>

                <th>Nome</th>
                <th>RGC</th>
                <th>Data cadastro</th>
                <th>Editar</th>

              </tr>
            </thead>
            <tbody id="tabelaEscritores">
              <?php

              include "back-end/conexao.php";

              //consulta sql para retornar todos
              //os escritores



              $controle_escritor = new ControleReeducando();
              $busca_escritores = $controle_escritor->pegar_todos();

              //enquanto a lista não chegar no último elemento (nulo)
              while ($reeducando = mysqli_fetch_array($busca_escritores)) {
              ?>
                <tr>

                  <td><?php echo $reeducando['nome_reeducando']; ?></td>
                  <td><?php echo $reeducando['rgc_reeducando']; ?></td>
                  <td><?php echo $reeducando['data_cadastro']; ?></td>

                  <td>
                    <!-- BOTÃO EDITAR  -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalEscritoresEdicao<?php echo $reeducando['id_reeducando']; ?>">
                      Editar
                    </button>
                  </td>


                </tr>

                <!-- aqui vai a janela modal de edicao -->
                <!-- The Modal -->
                <div class="modal fade" id="modalEscritoresEdicao<?php echo $reeducando['id_reeducando']; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Editar escritor</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form action="back-end/reeducando_leitor/EdicaoReeducando.php" method="post">
                          <input type="hidden" name="id_reeducando" value="<?php echo $reeducando['id_reeducando']; ?>">

                          <div class="form-group">
                            <label for="inputNome">Nome</label>
                            <input type="text" name="nome_reeducando" value="<?php echo $reeducando['nome_reeducando']; ?>" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="inputRGC">RGC</label>
                            <input type="text" name="rgc_reeducando" value="<?php echo $reeducando['rgc_reeducando']; ?>" class="form-control">
                          </div>

                          <input type="submit" value="Salvar edição" class="btn btn-warning">

                        </form>
                      </div>

                    </div>
                  </div>
                </div>

              <?php
              } ?>
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

      <br>

      <input class="form-control" id="pesquisaResumos" type="text" placeholder="Pesquisar...">

      <br>

      <!-- TABELA PARA LISTAGEM DOS RESUMOS -->

      <div class="row mt-4">

        <div class="col">
          <table class="table table-striped">
            <thead class="thead thead-dark">
              <tr>

                <th>Título</th>
                <th>Reeducando</th>
                <th>Avaliação</th>
                <th>Arquivo</th>
                <th>Data</th>
                <th>Editar</th>

              </tr>
            </thead>
            <tbody id="tabelaResumos">
              <?php

              include "back-end/conexao.php";

              //consulta sql para retornar todos
              //os resumos


              $controle_resumo = new ControleResumo();
              $busca_resumos = $controle_resumo->pegar_todos();


              //enquanto a lista não chegar no último elemento (nulo)
              while ($resumo = mysqli_fetch_array($busca_resumos)) {
              ?>

                <tr>
                  <!-- LISTAGEM DOS RESUMOS -->

                  <td><?php echo $resumo['titulo']; ?></td>
                  <td>

                    <?php
                    $id_escritor = $resumo['fk_id_escritor'];


                    $busca_escritor = $controle_escritor->pesquisar_por_id($id_escritor);
                    $escritor = mysqli_fetch_array($busca_escritor);

                    echo $escritor['nome_reeducando'];

                    ?>
                  </td>

                  <td>
                    <?php
                    $comentario = NULL;
                    //INÍCIO DO IF
                    if (isset($resumo['comentario']) == true) {

                      $comentario = $resumo['comentario'];
                      $id_avaliador = $resumo['fk_id_avaliador']; ?>

                      <!-- BOTÃO VER AVALIAÇÃO -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVerComentario<?php echo $resumo['id_resumo']; ?>">
                        Ver
                      </button>

                      <div class="modal fade" id="modalVerComentario<?php echo $resumo['id_resumo']; ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <?php
                            $busca_avaliador = $controle_avaliador->pesquisar_por_id($id_avaliador);

                            $avaliador = mysqli_fetch_array($busca_avaliador);
                            ?>

                            <!-- Cabeçalho do modal -->
                            <div class="modal-header">
                              <h4 class="modal-title">Avaliação de <?php echo $avaliador['nome_avaliador'] ?></h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Corpo do modal -->
                            <div class="modal-body">
                              <textarea rows="9" cols="60" name="comentario" type="text"><?php echo $comentario ?></textarea>
                            </div>

                          </div>
                        </div>
                      </div>
                    <?php
                    } else {
                      echo "<h6 style='color: Red;'>Ainda não avaliado</h6>";
                    }
                    //FIM DO IF ELSE

                    ?>
                  </td>

                  <td>

                    <!--
                    DESCOMENTAR QUANDO ENVIAR PARA O SERVIDOR
                    <a href="http://apps-proex.ufac.br/projetoNove/arquivos/<?php //echo $resumo['arquivo']; 
                    ?>" target="_blank" >ver</a> -->

                    <!-- COMENTAR QUANDO ENVIAR PARA O SERVIDOR -->
                    <a href="./arquivos/<?php echo $resumo['arquivo']; ?>" target="_blank">Ver</a>

                  </td>



                  <td><?php echo $resumo['data_cadastro']; ?></td>

                  <td>
                    <!-- BOTÃO EDITAR RESUMO -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalResumosEdicao<?php echo $resumo['id_resumo']; ?>">
                      Editar
                    </button>
                  </td>

                </tr>

                <!-- aqui vai a janela modal de edicao -->
                <!-- The Modal -->
                <div class="modal fade" id="modalResumosEdicao<?php echo $resumo['id_resumo']; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Editar resumo</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>


                      <!-- Modal body -->
                      <div class="modal-body">
                        <form action="back-end/resumo/EdicaoResumo.php" method="post">
                          <input type="hidden" name="id_resumo" value="<?php echo $resumo['id_resumo']; ?>">

                          <div class="form-group">
                            <label for="exampleFormControlTitulo">Título</label>
                            <input type="text" name="titulo" value="<?php echo $resumo['titulo']; ?>" class="form-control">
                          </div>





                          <?php

                          $busca_escritores = $controle_escritor->pegar_todos();

                          ?>
                          <div class="form-group">
                            <label for="exampleInputNome">Nome do Escritor</label>
                            <select name="fk_id_escritor" class="form-control" id="selectEdicaoResumosReeducando">

                              <?php
                              //enquanto a lista não chegar no último elemento (nulo)
                              //INÍCIO DO WHILE
                              while ($escritor = mysqli_fetch_array($busca_escritores)) {
                              ?>
                                <option value="<?php echo $escritor['id_reeducando'] ?>"><?php echo $escritor['nome_reeducando'] ?></option>
                              <?php
                              }
                              //FIM DO WHILE
                              ?>
                              <option value="<?php echo $resumo['fk_id_escritor']; ?>" selected>Manter o mesmo</option>
                            </select>

                          </div>

                          <?php

                          $busca_avaliadores = $controle_avaliador->pegar_todos();

                          ?>
                          <div class="form-group">
                            <label for="exampleInputNome">Quem deve avaliar este resumo?</label>
                            <select name="fk_id_avaliador" class="form-control" id="selectEdicaoResumosAvaliador">

                              <?php
                              //enquanto a lista não chegar no último elemento (nulo)
                              //INÍCIO DO WHILE
                              while ($avaliador = mysqli_fetch_array($busca_avaliadores)) {
                              ?>
                                <!-- value é o valor que será retornado deste seletor quando o 
                                formulário for enviado. -->
                                <option value="<?php echo $avaliador['id_avaliador'] ?>">
                                  <!-- Isto é o que será exibido para o usuário selecionar-->
                                  <?php echo $avaliador['nome_avaliador'] ?>
                                </option>

                              <?php
                              }
                              //FIM DO WHILE
                              ?>
                              <option value="<?php echo $resumo['fk_id_avaliador']; ?>" selected>Manter o mesmo</option>
                            </select>

                          </div>

                          <input type="submit" value="Salvar edição" class="btn btn-warning">

                        </form>
                      </div>

                    </div>
                  </div>
                </div>

              <?php
              } ?>
            </tbody>
          </table>

          <hr>


        </div>

      </div>

    </div>

    <br>

    <!--
    *********************BOTÃO COLLAPSE USUÁRIOS**************************
    Quando o usuário clicar neste botão, serão exibidas as opções de
    cadastro, edição e deleção, por meio de uma listagem em forma de tabela.
    ************************************************************************
    -->

    <button data-toggle="collapse" data-target="#collapseUsuarios" class="btn btn-success btn-block">Usuários do sistema</button>

    <div id="collapseUsuarios" class="collapse">

      <div class="row mt-4">
        <div class="col">
          <h3 class="text-primary">Gerenciamento de Usuários</h3>
        </div>
        <div class="col text-right">
          <!-- BOTÃO CADASTRAR USUÁRIO-->
          <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalUsuarios">
            Novo Usuário
          </button>
        </div>
      </div>

      <br>

      <input class="form-control" id="pesquisaUsuarios" type="text" placeholder="Pesquisar...">

      <br>

      <div class="row mt-4">

        <div class="col">
          <table class="table table-striped">
            <thead class="thead thead-dark">
              <tr>

                <th>Nome</th>
                <th>Email</th>
                <th>Nível de privilégio</th>
                <th>Data cadastro</th>
                <th>Ações</th>

              </tr>
            </thead>
            <tbody id="tabelaUsuarios">
              <?php

              include "back-end/conexao.php";

              //consulta sql para retornar todos
              //os usuários

              $buscar_usuarios = $controle_usuario->pegar_todos();


              //enquanto a lista não chegar no último elemento (nulo)
              while ($usuario = mysqli_fetch_array($buscar_usuarios)) {
              ?>
                <tr>

                  <td><?php echo $usuario['nome_usuario']; ?></td>
                  <td><?php echo $usuario['email_usuario']; ?></td>
                  <td><?php echo $usuario['nivel_usuario']; ?></td>
                  <td><?php echo $usuario['data_cadastro']; ?></td>

                  <td>
                    <!-- BOTÃO EDITAR USUÁRIO -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalUsuariosEdicao<?php echo $usuario['id_usuario']; ?>">
                      Editar
                    </button>
                    <!-- BOTÃO EXCLUIR USUÁRIO -->
                    <form action="back-end/usuario/DelecaoUsuario.php" method="post">
                      <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario'];?>">

                      <input type="submit" value="Apagar" class="btn btn-danger">
                    </form>
                  </td>
                    
                </tr>

                <!-- aqui vai a janela modal de edicao -->
                <!-- The Modal -->
                <div class="modal fade" id="modalUsuariosEdicao<?php echo $usuario['id_usuario']; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Editar usuário</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                        <form action="back-end/usuario/EdicaoUsuario.php" method="post">

                          <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">

                          <div class="form-group">
                            <label for="inputNome">Nome</label>
                            <input type="text" name="nome_usuario" value="<?php echo $usuario['nome_usuario']; ?>" class="form-control" id="inputNome">
                          </div>

                          <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="text" name="email_usuario" value="<?php echo $usuario['email_usuario']; ?>" class="form-control" id="inputEmail">
                          </div>

                          <div class="form-group">
                            <label for="inputSenha">Senha</label>
                            <input type="text" name="senha_usuario" value="" class="form-control" id="inputSenha">

                          </div>

                          <div class="form-group">
                            <label for="inputNivel">Nível de privilégio</label>
                            <select name="nivel_usuario" class="form-control">
                              <option value="4">Diretor</option>
                              <option value="1">Estagiários</option>
                              <option value="0">Administrador</option>
                            </select>
                          </div>

                          <input type="submit" value="Salvar edição" class="btn btn-warning">

                        </form>
                      </div>

                    </div>
                  </div>
                </div>

              <?php
              } ?>
            </tbody>
          </table>

          <hr>


        </div>

      </div>

    </div>

    <br>


    <!--
    ********************* MODAIS DE CADASTRO*****************************
                
    Na tag header seguinte, estão as janelas modais com formulários para
    cadastro e edição das entidades.
    Cada modal tem formulário com ação que interage com o back-end.
                
    *********************************************************************
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
                    <input name="senha_avaliador" type="password" class="form-control" id="inputSenha" placeholder="senha">
                  </div>
                  <div class="form-group">
                    <label for="inputInstuicao">Instituição</label>
                    <input name="instituicao_avaliador" type="name" class="form-control" id="inputInstuicao" placeholder="Universidade Federal do Acre">
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
          <form action="./back-end/reeducando_leitor/CadastroReeducando.php" method="POST">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Reeducando</h5>
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
                  <div class="form-group">
                    <label for="inputRGC">RGC</label>
                    <input name="rgc_reeducando" type="name" class="form-control" id="inputRGC" aria-describedby="NomeHelp" placeholder="0">
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
          <form enctype="multipart/form-data" action="./back-end/resumo/CadastroResumo.php" method="POST">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Resumo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="modal-body">

                  <input type="hidden" name="pagina_atual" value="administrativo.php">

                  <div class="form-group">
                    <label for="exampleInputTitulo">Título</label>
                    <input name="titulo" type="name" class="form-control" id="exampleInputTitulo">
                  </div>

                  <?php

                  $busca_escritores = $controle_escritor->pegar_todos();


                  ?>
                  <div class="form-group">
                    <label for="exampleInputNome">Nome do Reeducando</label>
                    <select name="fk_id_escritor" class="form-control" id="selectCadastroResumosReeducando">

                      <?php
                      //enquanto a lista não chegar no último elemento (nulo)
                      //INÍCIO DO WHILE
                      while ($escritor = mysqli_fetch_array($busca_escritores)) {
                      ?>
                        <option value="<?php echo $escritor['id_reeducando'] ?>"><?php echo $escritor['nome_reeducando'] ?></option>
                      <?php
                      }
                      //FIM DO WHILE
                      ?>
                    </select>

                  </div>

                  <?php

                  $busca_avaliadores = $controle_avaliador->pegar_todos();

                  ?>
                  <div class="form-group">
                    <label for="exampleInputNome">Quem deve avaliar este resumo?</label>
                    <select name="fk_id_avaliador" class="form-control">

                      <?php
                      //enquanto a lista não chegar no último elemento (nulo)
                      //INÍCIO DO WHILE
                      while ($avaliador = mysqli_fetch_array($busca_avaliadores)) {
                      ?>
                        <!-- value é o valor que será retornado deste seletor quando o 
                                            formulário for enviado. -->
                        <option value="<?php echo $avaliador['id_avaliador'] ?>">
                          <!-- Isto é o que será exibido para o usuário selecionar-->
                          <?php echo $avaliador['nome_avaliador'] ?>
                        </option>

                      <?php
                      }
                      //FIM DO WHILE
                      ?>
                    </select>

                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlFile1">Arquivo</label>
                    <input name="arquivo" type="file" class="form-control-file">


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
                    MODAL PARA FORMULÁRIO DE USUÁRIOS 
                -->
      <div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

          <!--Formulário que será puxado pelo método $_POST e depois tratado
                        na classe CadastroComentario.php-->
          <form action="./back-end/usuario/CadastroUsuario.php" method="POST">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="form-group">
                  <label for="inputNome">Nome</label>
                  <input name="nome_usuario" type="name" class="form-control" id="inputNome" aria-describedby="NomeHelp" placeholder="Nome">
                </div>
                <div class="form-group">
                  <label for="inputEmail">Email</label>
                  <input name="email_usuario" type="email" class="form-control" id="inputEmail" placeholder="joao.silva@exemplo.com">
                </div>
                <div class="form-group">
                  <label for="inputSenha">Senha</label>
                  <input name="senha_usuario" type="password" class="form-control" id="inputSenha" placeholder="senha">
                </div>
                <div class="form-group">
                  <label for="inputNome">Nível de privilégio</label>
                  <select name="nivel_usuario" class="form-control">
                    <option value="4">Diretor</option>
                    <option value="1">Estagiários</option>
                    <option value="0">Administrador</option>
                  </select>
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


  <?php include "rodape.php"; ?>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $("#pesquisaAvaliadores").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tabelaAvaliadores tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#pesquisaEscritores").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tabelaEscritores tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#pesquisaResumos").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tabelaResumos tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#pesquisaUsuarios").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tabelaUsuarios tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#pesquisaEscritoresModal").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#selectEdicaoResumosReeducando option").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#pesquisaAvaliadoresModal").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#selectEdicaoResumosAvaliador option").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#pesquisaCadastroResumosReeducandos").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#selectCadastroResumosReeducando option").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });


      $("#pesquisaCadastroResumosAvaliadores").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#selectCadastroResumoAvaliador option").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });


    });
  </script>
</body>

</html>