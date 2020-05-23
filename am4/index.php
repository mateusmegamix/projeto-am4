<?php
// Conexão
require_once 'App\model\conexao.php';

global $connect;

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
			      <a href="#!" class="brand-logo" id="logo"><i class="material-icons left">account_circle</i>Am4</a>
			      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			      <ul class="right hide-on-med-and-down">
			        <li><a href="logout.php"><i class="material-icons right">exit_to_app</i>Sair</a></li>
			      </ul>
			      <ul class="side-nav" id="mobile-demo">
			        <li><a href="logout.php"><i class="material-icons left">exit_to_app</i>Sair</a></li>
			      </ul>
			    </div>
			    </div>
	</nav>
</HEADER>

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
  </div>
</div>

<body>
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<!-- Materialize JS -->
		<script type="text/javascript" src="js/materialize.js"></script>
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