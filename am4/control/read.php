<?php

// Conexão
require_once 'App\model\conexao.php';
require_once 'vendor\autoload.php';

$crud = new \App\model\Crud();

//$crud->update($noticia);
$crud->read();

foreach($crud->read() as $noticia):
	echo $noticia['titulo']."<br>".$noticia['descricao']."<br>".$noticia['arquivo']."<br>".$noticia['data']."<hr>";
endforeach;

?>