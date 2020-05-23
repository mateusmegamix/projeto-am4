<?php

// Conexão
require_once 'App\model\conexao.php';
require_once 'vendor\autoload.php';

//XSS para limpar os campos e não deixar usurio colocar código nos campos
function clear($input){
	global $connect;

	$var = mysqli_escape_string($connect, $input);

	$var = htmlspecialchars($var);
	return $var;
}

if(isset($_POST['btn-cadastrar'])):

$msg = false;

//imagem.... Alem do Banco de dados tbm é enviado para o diretorio
if(isset($_FILES['arquivo'])){

	$titulo = clear($_POST['titulo']);
	$descricao = clear($_POST['descricao']);

//extensão...
	$extensao = strtolower(substr($_FILES['arquivo']['name'], -4));//pega a extensao do arquivo
	$novo_nome = md5(time()).$extensao;// define o nome do arquivo
	$diretorio = "upload/";// define o diretorio para onde é enviado o arquivos

	move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);//faz o upload

//insere os dados no banco
	$sql = "INSERT INTO noticia (titulo, descricao, arquivo, data) VALUES('$titulo', '$descricao', '$novo_nome', NOW())";

	if(mysqli_query($connect, $sql)){
		$_SESSION['mensagem'] = "Deletado com sucesso!";
		header('Location: ../am4/gestor.php?sucesso');
	}

	else{
		$_SESSION['mensagem'] = "Erro ao cadastrar!";
		header('Location: ../am4/gestor.php?erro');
	}
}
endif;
?>