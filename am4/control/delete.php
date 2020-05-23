<?php

// Conexão
require_once 'App\model\conexao.php';
require_once 'vendor\autoload.php';


if(isset($_POST['btn-deletar'])):

	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "DELETE FROM noticia WHERE id = '$id'";

	if(mysqli_query($connect, $sql)){
		$_SESSION['mensagem'] = "Deletado com sucesso!";
		header('Location: ../am4/gestor.php?sucesso');
	}

	else{
		$_SESSION['mensagem'] = "Erro ao cadastrar!";
		header('Location: ../am4/gestor.php?erro');
	}
endif;