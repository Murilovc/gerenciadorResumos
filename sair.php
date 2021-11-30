<?php

session_start();
unset($_SESSION['id'],$_SESSION['nome'], $row_usuario  ['nome'], $_SESSION['email'], $row_usuario  ['email']);


$_SESSION['msg'] = "Deslogado com sucesso";
header("Location: login.php");