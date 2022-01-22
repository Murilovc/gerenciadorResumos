<?php
     
    class ControleReeducando {

        function ControleReeducando(){
            set_include_path("./");
        }
        
        public function pesquisar_por_id($id_reeducando)
        {
            //precisamos ter acesso a conexao
            include "back-end/conexao.php";
            
            $query_escritor = 
            "SELECT id_reeducando, nome_reeducando
            FROM reeducandos 
            WHERE id_reeducando='$id_reeducando'
            ";
            
            return $busca_escritor = mysqli_query($conexao, $query_escritor);
        }

        public function pegar_todos()
        {
            //precisamos ter acesso a conexao
            include "back-end/conexao.php";
            
            $query_listar = 
            "SELECT * FROM reeducandos";

            return $busca_escritores = mysqli_query($conexao, $query_listar);
        }
    }
?>