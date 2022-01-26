<head>
    <!-- link para o diretório do FontAwesome-->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo_proex.png" width="96" height="37" alt="">
            Gerenciamento de Resumos
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarSupported"></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                
                <!-- 
                NOTA: Segundo o site Fontawesome a chamada ao ícone agora deve ser feita com o
                prefixo "fas", por exempo "fas fa-home", porém, como estamos usando a versão 4.7
                a chamada está no modelo antigo.
                Caso seja feita uma atualização para a versão mais nova do Fontawesome, consultar a página
                https://fontawesome.com/v5.15/how-to-use/on-the-web/referencing-icons/basic-use
                para os detalhes de uso.
                -->
                <?php
                
                ini_set('display_errors', 0 );
                error_reporting(0);

                session_start();
                if($_SESSION['nivel'] == 0 ){ ?>
                   <li class="nav-item"><a class="nav-link" href="administrativo.php"> <span class="fa fa-home mr-2" style="color: White;" aria-hidden="true"></span>Início</a></li>
               <?php } ?>
                

                  <?php
                
                if(($_SESSION['nivel'] == 3) ){ ?>
                <li class="nav-item"><a class="nav-link" href="selecao_resumo.php"> <span class="fa fa-comment mr-2" style="color: White;" aria-hidden="true"></span>Sala de Correção</a></li>
                
                 <li class="nav-item"><a class="nav-link" href="listagem_relatorios.php"> <span class="fa fa-book mr-2" style="color: White;" aria-hidden="true"></span>Relatórios</a></li>
                 
                 <?php } ?>
                 

                <li class="nav-item"><a class="nav-link" href="sair.php"><span class="fa fa-sign-out mr-2" style="color: White" aria-hidden="true"></span>Sair</a></li>
            </ul>
        </div>
    </div>


</nav>