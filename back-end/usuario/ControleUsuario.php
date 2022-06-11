<?php
     
    class ControleUsuario {

        function ControleUsuario()
        {
            set_include_path("./");
        }
        
        public function pesquisar_por_id($id_usuario)
        {
            //precisamos ter acesso a conexao
            include "back-end/conexao.php";
            
            $query_usuario = 
            "SELECT id_usuario, nome_usuario, email_usuario, senha_usuario, nivel_usuario
             FROM avaliadores
             WHERE id_avaliador='$id_usuario'
            ";
            
            return $busca_usuario = mysqli_query($conexao, $query_usuario);
        }

        public function pegar_todos()
        {
            //precisamos ter acesso a conexao
            include "back-end/conexao.php";
            
            $query_listar = 
            "SELECT * FROM usuarios";

            return $busca_usuarios = mysqli_query($conexao, $query_listar);
        }
    }
?>