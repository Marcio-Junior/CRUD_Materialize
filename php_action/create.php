<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';
//Clear
function clear($input){
	global $connect;
	//Sql- Para se proteger do SQL injection
	$var = mysqli_escape_string($connect, $input);
    // Se previnir do Cross Site Scripting
    $var = htmlspecialchars($var);
    return $var;
}
if(isset($_POST['btn-cadastrar'])):
	$nome= clear($_POST['nome']);
	$sobrenome= clear($_POST['sobrenome']);
	$email= clear($_POST['email']);
	$idade= clear($_POST['idade']);	

	$sql = "INSERT INTO clientes(nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

	 if(mysqli_query($connect, $sql)):
	 	$_SESSION['mensagem'] ="Cadastrado com sucesso!";
	 	header('Location: ../principal.php');
	 else:
	 	$_SESSION['mensagem'] = "Erro ao cadastrar!";
	    header('Location: .../principal.php');
	 endif;   
endif;

