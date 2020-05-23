<?php
// Conexão
require_once 'App\model\conexao.php';
require_once 'vendor\autoload.php';
require_once 'control\delete.php';

// Sessão iniciada do login
session_start();

global $connect;

// Verificação
if(!isset($_SESSION['logado'])):
	header('Location: gestor.php');
endif;

// Dados do login
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
		<title> Pagina de notícias cadastradas </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		<!--Import Google Icon Font-->
      	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="_css/materialize.css"  media="screen,projection"/>
		<link rel="stylesheet" href="css/custom.css">
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

<?php if($msg != false) echo "<p> $msg </p>"; ?>
<?php require_once 'control\delete.php'; ?>

<div class="row">
  <div class="col s12 m6 push-m3">
    <h3 class="light">Blog de Notícias</h3>
    <hr>
    <table class="striped">
      <thead>
        <tr>
          <th>Titulo:</th>
          <th>Descricao:</th>
          <th>Imagem:</th>
          <th>Data:</th>
        </tr>
      </thead>

        <?php
        $sql = "SELECT * FROM noticia";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0):

        while($dados = mysqli_fetch_array($resultado)):
        ?>
        <tr>
          <td><?php echo $dados['titulo']; ?></td>
          <td><?php echo $dados['descricao']; ?></td>
          <td><?php echo $dados['arquivo']; ?></td>
          <td><?php echo $dados['data']; ?></td>
		  <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange waves-effect"><i class="material-icons">edit</i></a></td>

          <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red waves-effect modal-trigger"><i class="material-icons">delete</i></a></td>

          <!-- Modal Structure -->
          <div id="modal<?php echo $dados['id']; ?>" class="modal">
            <div class="modal-content">
              <h4>Opa!</h4>
              <p>Tem certeza que deseja excluir esse cliente?</p>
            </div>
            <div class="modal-footer">
              
              <form action="gestor.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>

                <a href="#!" class="modal-action modal-close waves-effect btn blue white-text">Cancelar</a>
              </form>
            </div>
          </div>
        </tr>
        <?php 
        endwhile;
        else: ?>
        <tr>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
        </tr>
        <?php
    	endif;
    	?>
    	</table>
    <br><br>
    <a href="adicionar.php" class="btn blue waves-effect">Adicionar Clientes</a>
  </div>
</div>

<?php

//======================Campo de Teste Crud=================================//

/*

$noticia = new \App\model\Noticia();
//$noticia->setId(1);
$noticia->setTitulo('Teste');
$noticia->setDescricao('Esse cadastro e apenas um teste');
$noticia->setArquivo('5e33b2692b41d7fa96fc23e59fddba74.png');
//$noticia->setData('0000-00-00 00:00:00');

$crud = new \App\model\Crud();
//$crud->create($noticia);
//$crud->update($noticia);
//$crud->read();
//$crud->delete(53);

//require_once 'read.php';

*/

//======================Campo de Teste Crud=================================//

?>

<body>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<!-- Materialize JS -->
		<script type="text/javascript" src="js/materialize.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
      M.AutoInit();
    </script>

    <script>
      $(document).ready(function(){
        //Button Menu
        $(".button-collapse").sideNav();
        //Slider
        $(".slider").slider();
      });
    </script>
    
	</body>
</html>