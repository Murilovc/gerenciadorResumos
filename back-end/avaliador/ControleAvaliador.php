<?php
     
    class ControleAvaliador {
        
        public function pesquisar_por_id($id_avaliador)
        {
            //precisamos ter acesso a conexao
            include_once "../conexao.php";
            
            $query_avaliador = 
            "SELECT id_avaliador, nome_avaliador, telefone, email, senha_avaliador
             FROM avaliadores
             WHERE id_avaliador='$id_avaliador'
            ";
            
            return $busca_avaliador = mysqli_query($conexao, $query_avaliador);
        }

        public function pegar_todos()
        {
            //precisamos ter acesso a conexao
            //os ../../ são para retornar a raiz da pasta xampp
            //considerando o include_path padrão:
            //include_path='C:\xampp\php\PEAR'
            include "../../htdocs/gerenciadorResumos/back-end/conexao.php";
            
            $query_listar = 
            "SELECT * FROM avaliadores";

            return $busca_avaliadores = mysqli_query($conexao, $query_listar);
        }
    }
?>