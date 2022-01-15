<?php
     
    class ControleResumo {

        function ControleResumo(){
            set_include_path("./");
        }
        
        public function pesquisar_por_id($id_resumo)
        {
            //precisamos ter acesso a conexao
            include "back-end/conexao.php";
            
            $query_resumo = 
            "SELECT id_resumo, titulo, arquivo, comentario, fk_id_escritor, fk_id_avaliador
             FROM resumos
             WHERE id_resumo='$id_resumo'
            ";
            
            return $busca_resumo = mysqli_query($conexao, $query_resumo);
        }

        public function pesquisar_por_escritor($id_escritor) {
            //precisamos ter acesso a conexao
            include "back-end/conexao.php";

            $query_resumo = 
            "SELECT id_resumo, titulo, arquivo, comentario, fk_id_escritor, fk_id_avaliador
             FROM resumos
             WHERE fk_id_escritor='$id_escritor'
            ";

            return $busca_resumo = mysqli_query($conexao, $query_resumo);
        }

        public function pesquisar_por_avaliador($id_avaliador) {
            //precisamos ter acesso a conexao
            include "back-end/conexao.php";

            $query_resumo =
            "SELECT id_resumo, titulo, arquivo, comentario, fk_id_escritor, fk_id_avaliador
             FROM resumos
             WHERE fk_id_avaliador='$id_avaliador'
            ";

            return $busca_resumo = mysqli_query($conexao, $query_resumo);
        }

        public function pegar_todos()
        {
            //precisamos ter acesso a conexao
            include "back-end/conexao.php";
            
            $query_listar = 
            "SELECT * FROM resumos";

            return $busca_resumos = mysqli_query($conexao, $query_listar);
        }
    }
?>