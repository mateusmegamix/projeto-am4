<?php
// Conexão
require_once 'App\model\conexao.php';
require_once 'control\create.php';

// Sessão
session_start();

global $connect;

// Verificação
if(!isset($_SESSION['logado'])):
	header('Location: gestor.php');
endif;

// Busca dados do login do usuario
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM gestor WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);

//mysqli_close($connect);
$msg = false;
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title> Pagina de cadastro de notícias </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<!--Import Google Icon Font-->
      	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="_css/materialize.css"  media="screen,projection"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	</head>
<body>

<!--MENU-->
<HEADER>
	<nav class="#039be5 light-blue darken-1">
				<div class="container">
			    <div class="nav-wrapper">
			    <div class="logo"></div>
			      <a href="#!" class="brand-logo" id="logo"><i class="material-icons left">account_circle</i>Am4 - <?php echo $dados['nome']; ?></a>
			      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			      <ul class="right hide-on-med-and-down">
			        <li><a href="adicionar.php"><i class="material-icons right">assignment</i>Cadastrar</a></li>
			        <li><a href="gestor.php"><i class="material-icons right">menu_book</i>Noticias</a></li>
			        <li><a href="logout.php"><i class="material-icons right">exit_to_app</i>Sair</a></li>
			      </ul>
			      <ul class="side-nav" id="mobile-demo">
			        <li><a href="adicionar.php"><i class="material-icons left">assignment</i>Cadastrar</a></li>
			        <li><a href="gestor.php"><i class="material-icons left">menu_book</i>Notícias</a></li>
			        <li><a href="logout.php"><i class="material-icons left">exit_to_app</i>Sair</a></li>
			      </ul>
			    </div>
			    </div>
	</nav>
</HEADER>

<?php require_once 'control\create.php'; ?>
	<div class="row container">
		<div class="col s6">
			    <h4 class="light">Nova Notícia</h4>
			    <form action="adicionar.php" method="POST" enctype="multipart/form-data">
			      <div class="input-field"><i class="material-icons prefix"></i>
			        <input data-length="20" type="text" required name="titulo" id="titulo">
			        <label for="titulo">Título</label>
			      </div>
			      <br>
			      <div class="input-field">
						<i class="material-icons prefix">edit</i>
						<textarea data-length="1000" name="descricao" required placeholder="Deixe aqui sua mensagem"  id="descricao" cols="35" rows="5" style="margin-left: 42px; margin-top: 5px; width: 500px; height: 200px;"> </textarea>
						<label for="text" style="font-weight:bolder;">Mensagem</label>
					</div>
						<br>
						Imagem da Noticia: <br><br> <input type="file" required name="arquivo">
						<?php if($msg != false) echo "<p> $msg </p>"; ?>
						<br><br>

			     <button type="submit" name="btn-cadastrar" values="Salvar" class="btn green waves-effect">Cadastrar</button>

			      <a href="gestor.php" type="submit" class="btn waves-effect">Lista de clientes</a>
				</form>
	  	</div>
	  	<br>
	</div>

		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<!-- Materialize JS -->
		<script type="text/javascript" src="js/materialize.js"></script>
		<!--Button Menu-->
		<script>
			$(document).ready(function(){
				//Button Menu
				$(".button-collapse").sideNav();
				//Slider
				$(".slider").slider();
			});
		</script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
      M.AutoInit();
    </script>
	</body>
</html>