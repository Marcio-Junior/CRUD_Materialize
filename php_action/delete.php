<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])):
	
	$id= mysqli_escape_string($connect, $_POST['id']);	

	$sql = "DELETE FROM clientes WHERE id = '$id'";
	 if(mysqli_query($connect, $sql)):
	 	$_SESSION['mensagem'] ="Deletado com sucesso!";
	 	header('Location: ../principal.php');
	 else:
	 	$_SESSION['mensagem'] = "Erro ao tentar deletar!";
	    header('Location: .../principal.php');
	 endif;   
endif;

