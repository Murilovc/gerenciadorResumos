<?php
session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
	
        
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Login</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
		<style>
			body {
				color: #999;
				background: #f5f5f5;
				font-family: 'Varela Round', sans-serif;
			}
			.form-control {
				box-shadow: none;
				border-color: #ddd;
			}
			.form-control:focus {
				border-color: #4aba70; 
			}
			.login-form {
				width: 350px;
				margin: 0 auto;
				padding: 30px 0;
			}
			.login-form form {
				color: #434343;
				border-radius: 1px;
				margin-bottom: 15px;
				background: #fff;
				border: 1px solid #1685ea;
				box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
				padding: 30px;
			}
			.login-form h4 {
				text-align: center;
				font-size: 22px;
				margin-bottom: 20px;
			}
			.login-form .avatar {
				color: #fff;
				margin: 0 auto 30px;
				text-align: center;
				width: 100px;
				height: 100px;
				border-radius: 50%;
				z-index: 9;
				background: #1685ea;
				padding: 15px;
				box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
			}
			.login-form .avatar i {
				font-size: 62px;
			}
			.login-form .form-group {
				margin-bottom: 20px;
			}
			.login-form .form-control, .login-form .btn {
				min-height: 40px;
				border-radius: 2px; 
				transition: all 0.5s;
			}
			.login-form .close {
				position: absolute;
				top: 15px;
				right: 15px;
			}
			.login-form .btn, .login-form .btn:active {
				background: #1685ea !important;
				border: none;
				line-height: normal;
			}
			.login-form .btn:hover, .login-form .btn:focus {
				background: #1685ea !important;
			}
			.login-form .checkbox-inline {
				float: left;
			}
			.login-form input[type="checkbox"] {
				position: relative;
				top: 2px;
			}
			.login-form .forgot-link {
				float: right;
			}
			.login-form .small {
				font-size: 13px;
			}
			.login-form a {
				color: #1685ea;
			}
		</style>
	</head>
	<body>
		
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
			}

		?>

		<form method="POST" action="valida.php">
			<div class="login-form">
				<!-- outros valores
				
				w=138
				h=200
				
				-->
				<img class="mx-auto d-block" src="images/logo_ufac.png" width="92" height="133" >
				<h4 class="modal-title">Acesse sua conta</h4>
				<div class="form-group">
					<input type="email" name="email" class="form-control" placeholder="E-mail" required="required">
				</div>
				<div class="form-group">
					<input type="password" name="senha" class="form-control" placeholder="Senha" required="required">
				</div>
				  <div class="form-group">
				      <div class="row">
				          <div class="col-2"> <input name="termo_avaliador" type="checkbox" class="form-control" id="inputTermo" required="required"></div>
				          <div class="col-10">Declaro que  <a href="http://apps-proex.ufac.br/projetoNove/arquivos/termocompromisso.pdf" target="_blank">li e aceito</a> os termos apresentados</div>
				      </div>
                       
                </div>
				<input type="submit" name="btnLogin" class="btn btn-primary btn-block btn-lg" value="Acessar">              
			</div>
		</form>			

	</body>
</html>
