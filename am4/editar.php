<?php
// Conexão
require_once 'App\model\conexao.php';
require_once 'control\update.php';

//busca os dados da tabela noticia
if(isset($_GET['id'])):
  $id = mysqli_escape_string($connect, $_GET['id']);

  $sql = "SELECT * FROM noticia WHERE id = '$id'";
  $resultado = mysqli_query($connect, $sql);
  $dados = mysqli_fetch_array($resultado);
endif;
?>


<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Pagina de atualização de notícias </title>
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
            <a href="#!" class="brand-logo" id="logo"><i class="material-icons left">account_circle</i>Am4 - Mateus Pereira</a>
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

<?php require_once 'control\update.php'; ?>

<div class="row">
  <div class="container">
    <h3 class="light">Editar Noticia</h3>
    <form action="editar.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
      <div class="input-field">
        <input type="text" name="titulo" id="titulo" value="<?php echo $dados['titulo']; ?>">
        <label for="titulo">Título</label>
      </div>
      <div class="input-field">
        <input type="text" name="descricao" id="descricao" value="<?php echo $dados['descricao']; ?>">
        <label for="descricao">Descricao</label>
      </div>
      <div class="input-field">
        <input type="text" name="arquivo" id="arquivo" value="<?php echo $dados['arquivo']; ?>">
        <label for="email">Imagem</label>
      </div>
      <div class="input-field">
        <input type="text" name="data" id="data" value="<?php echo $dados['data']; ?>">
        <label for="data">Data</label>
      </div>

      <button type="submit" name="btn-editar" class="btn green waves-effect">Atualizar</button>
      <a href="gestor.php" type="submit" class="btn waves-effect">Lista de clientes</a>
    </form>
  </div>
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
  </body>
</html>
