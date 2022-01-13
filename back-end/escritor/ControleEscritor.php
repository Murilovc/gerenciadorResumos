<?php
     
    class Escritor {

        function Escritor(){
            
        }
        
        public function pesquisar_por_id($id_escritor)
        {
            //precisamos ter acesso a conexao
            include_once "../conexao.php";
            
            $query_escritor = 
            "SELECT id_escritor, nome_escritor
            FROM escritores 
            WHERE id_escritor='$id_escritor'
            ";
            
            return $busca_escritor = mysqli_query($conexao, $query_escritor);
        }

        public function pegar_todos()
        {
            //precisamos ter acesso a conexao
            include_once "../conexao.php";
            
            $query_listar = 
            "SELECT * FROM escritores";

            return $busca_escritores = mysqli_query($conexao, $query_listar);
        }
    }
?>