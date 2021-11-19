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
                    <h3 class="text-primary">Gerenciamento de Avaliadores</h3>
                </div>
                <div class="col text-right">
                    <button class="btn btn-primary" type="button"  data-toggle="modal" data-target="#modalAvaliadores">
                        Novo Avaliador
                    </button>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <h3 class="text-primary">Gerenciamento de Escritores</h3>
                </div>
                <div class="col text-right">
                    <button class="btn btn-primary" type="button">
                        Novo Escritor (nf)
                    </button>
                </div>
            </div>

            
            <div class="row mt-4">
                <div class="col">
                    <h3 class="text-primary">Gerenciamento de Redações</h3>
                </div>
                <div class="col text-right">
                    <button class="btn btn-primary" type="button">
                        Nova Redação (nf)
                    </button>
                </div>
            </div>

            
            <div class="row mt-4">
                <div class="col">
                    <h3 class="text-primary">Gerenciamento de Comentários</h3>
                </div>
                <div class="col text-right">
                    <button class="btn btn-primary" type="button">
                        Novo Comentário (nf)
                    </button>
                </div>
            </div>

            
            <header>
                <!-- MODAL PARA CADASTRO DE AVALIADORES -->
                <div class="modal fade" id="modalAvaliadores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        
                    
                        <form action="./back-end/cadastro.php" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Avaliadores</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                            <div class="form-group">
                                                <label for="inputNome">Nome</label>
                                                <input name="nome" type="name" class="form-control" id="inputNome" aria-describedby="NomeHelp" placeholder="Nome">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputTelefone">Telefone</label>
                                                <input name="telefone" type="tel" class="form-control" id="inputTelefone" placeholder="(99)123456789">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail">Email</label>
                                                <input name="email" type="email" class="form-control" id="inputEmail" placeholder="joao.silva@exemplo.com">
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

