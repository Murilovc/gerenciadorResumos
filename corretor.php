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
        
        <table class="table">

            <thead>
                <tr class="text-center">

                    <th scope="col">Redação</th>
                    <th scope="col">Comentários</th>

                </tr>
            </thead>

            <tbody>

                <tr class="text-center">
                    
                    <td>

                    </td>
                
                    <td>
                        <form action="./back-end/cadastro.php" method="POST">
                            
                            <div class="form-group">
                                <textarea rows="10" name="comentarios" type="text" class="form-control" placeholder="Comentários">                                                                                                                        </textarea>
                            </div>
                            <!-- AINDA NÃO IMPLEMENTADO
                            <input name="teste" type="hidden" value="comentario">
                            <input name="id_redacao" type="hidden" value="37">
                            <input name="id" type="hidden" value="">
                            <input name="id_user" type="hidden" value="1">
                            <input name="selecao_escritor" type="hidden" value="7">
                            -->
                            <button type="submit" class="btn btn-primary">Salvar comentário</button>
                        </form>
                
                    </td>
                </tr>
            </tbody>

        </table>


  
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>