<?php
     
    class ControleRelatorio {

        function ControleRelatorio(){
            set_include_path("./");
        }
        
        public function pesquisar_por_id($id_relatorio)
        {
            //precisamos ter acesso a conexao
            include "back-end/conexao.php";
            
            $query_relatorio = 
            "SELECT id_relatorio,
                    nota_conteudo, 
                    nota_estrutura, 
                    nota_ortografia, 
                    observacoes_relatorio, 
                    status_relatorio,
                    data_cadastro
            FROM relatorios 
            WHERE id_relatorio='$id_relatorio'
            ";
            
            return $busca_relatorio = mysqli_query($conexao, $query_relatorio);
        }

        public function pegar_todos()
        {
            //precisamos ter acesso a conexao
            include "back-end/conexao.php";
            
            $query_listar = 
            "SELECT * FROM relatorios";

            return $busca_relatorios = mysqli_query($conexao, $query_listar);
        }
    }
?>