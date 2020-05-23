<?php


// Conexão
require_once 'App\model\conexao.php';

// Sessão
session_start();

// Botão acessar
if(isset($_POST['btn-acessar'])):
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);

	if(empty($login) or empty($senha)):
		$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";

	else:

		$sql = "SELECT login FROM gestor WHERE login = '$login'";
		$resultado = mysqli_query($connect, $sql);		

		if(mysqli_num_rows($resultado) > 0):
		$senha = md5($senha);// deixei a senha como md5 no bd    

		$sql = "SELECT * FROM gestor WHERE login = '$login' AND senha = '$senha'";



		$resultado = mysqli_query($connect, $sql);

			if(mysqli_num_rows($resultado) == 1): 
				$dados = mysqli_fetch_array($resultado);
				mysqli_close($connect);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];
				header('Location: gestor.php');
			else:
				$erros[] = "<li> Usuário e senha não conferem </li>";
			endif;

		else:
			$erros[] = "<li> Usuário inexistente </li>";
		endif;

	endif;

endif;
?>

<?php 
if(!empty($erros)):
	foreach($erros as $erro):
		echo $erro;
	endforeach;
endif;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Login AM4 </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		<!--Import Google Icon Font-->
      	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="_css/materialize.css"  media="screen,projection"/>
		<link rel="stylesheet" href="css/custom.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	</head>

<body>
	<h2 align="center"> AM4 </h2>

	<div class="row container">
		<div class="col s9">
			<br/>
				<fieldset id="mensagem"><legend>Login de acordo com BD</legend>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<div class="input-field"  style="margin-top: 20px">
						<i class="material-icons prefix">face</i>
						<input data-length="50" type="text" name="login" id="login" value="<?php echo isset($_COOKIE['login']) ? $_COOKIE['login'] : '' ?>" placeholder="Digite seu usuario">
						<label for="login" style="font-weight:bolder;">Usuario</label>
					</div>

					<div class="input-field">
						<i class="material-icons prefix">verified_user</i>
						<input data-length="50" type="password" name="senha" id="senha" value="<?php echo isset($_COOKIE['senha']) ? $_COOKIE['senha'] : '' ?>" placeholder="Digite sua senha">
						<label for="senha" style="font-weight:bolder;">Senha</label>
					</div>
					<div class="input-field ">
					<button class="btn waves-effect waves-light #039be5 light-blue darken-1" style="margin-left: 42px" type="submit" name="btn-acessar">Acessar<i class="material-icons right">send</i>
  					</button>
					</div>
  					</form>
				</fieldset>

			<br/>
	    <div>
	</div>

		<!-- Materialize JQUERY -->
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<!-- Materialize JS -->
		<script type="text/javascript" src="js/materialize.js"></script>
		</body>
</html>
