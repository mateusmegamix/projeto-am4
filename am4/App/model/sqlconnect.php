<?php
/*
    $serverName = "PROJETO-PC\MATEUS";
    $connectionOptions = array(
        "Database" => "am4",
        "Uid" => "sa",
        "PWD" => "1234"
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn)
        echo "Connected!"

*/
define('DB_HOST', "PROJETO-PC\MATEUS");
define('DB_USER', "sa");
define('DB_PASSWORD', "1234");
define('DB_NAME', "am4");
define('DB_DRIVER', "sqlsrv");


//
class Conexao
{
	public static $connection;

	private function __construct(){}

	public static function getConnection(){

		$pdoConfig = DB_DRIVER . ":", "SERVER=" . DB_HOST . ";";
		$pdoConfig = "Database=" . DB_NAME . ";";

		try {
			if(!isset($connection)){
				$connection = new PDO($pdoConfig, DB_USER, DB_PASSWORD);
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			return $connection;
		}catch (PDOException $e){
			$mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
			$mensagem = "\n Erro: " . $e->getMessage();
			throw now Exception($mensagem);
		}
	}

}

try{
	$conexao = Conexao::getConnection();
	$query = $conexao->query("SELECT nome, preco, quantidade FROM produto");
	$produtos = $query->fetchAll();
}catch(Exception $e){
	echo $e->getMessage();
	exit;
}
?>

<table border=1>
	<tr>
		<td>Nome</td>
		<td>Preço</td>
		<td>Quantidade</td>
	</tr>
	<?php
		foreach ($produtos as $produto) {
			
	?>
		<tr>
			<td><?php echo $produto['nome']; ?></td>
			<td><?php echo $produto['preco']; ?></td>
			<td><?php echo $produto['quantidade']; ?></td>
		</tr>
	<?php
	}
?>
</table>
