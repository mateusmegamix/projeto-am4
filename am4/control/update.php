<?php

// Conexão
require_once 'App\model\conexao.php';
require_once 'vendor\autoload.php';

if(isset($_POST['btn-editar'])):
	$titulo = mysqli_escape_string($connect, $_POST['titulo']);
	$descricao = mysqli_escape_string($connect, $_POST['descricao']);
	$arquivo = mysqli_escape_string($connect, $_POST['arquivo']);
	$data = mysqli_escape_string($connect, $_POST['data']);

	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "UPDATE noticia SET titulo = '$titulo', descricao = '$descricao', arquivo = '$arquivo', data = '$data' WHERE id = '$id'";

	if(mysqli_query($connect, $sql)){
		$_SESSION['mensagem'] = "Alterado com sucesso!";
		header('Location: ../am4/gestor.php?sucesso');
	}

	else{
		$msg = "Falha ao enviar o arquivo.";
		$_SESSION['mensagem'] = "Erro ao Alterar!";
		header('Location: ../am4/gestor.php?erro');
	}
endif;