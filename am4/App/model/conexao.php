<?php
namespace App\model;

// Conexão com banco de dados usando API MYSQL
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "am4";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if(mysqli_connect_error()):
	echo "Falha na conexão: ".mysqli_connect_error();
endif;


// Conexao com PDO
class Conexao {
	private static $instance;

	public static function getConn(){
		if(!isset(self::$instance)):
			self::$instance = new \PDO('mysql:host=localhost; dbname=am4; charset=utf8','root','');
		endif;
			return self::$instance;
	}
}

//======== Foi feito conexao com o SQL SERVER porém tive problemas com as DLL do PHP por isso refiz o projeto com
//======== MYSQL para caso troque para sql server trocar tudo que for (msqli) para (sqlsrv)

/*

define('DB_HOST', "127.0.0.1");
define('DB_USER', "sa");
define('DB_PASSWORD', "1234");
define('DB_NAME', "am4");
define('DB_DRIVER', "sqlsrv");


class Conexao
{
	private static $connection;

	private function __construct(){}

	public static function getConnection(){

		$pdoConfig = DB_DRIVER . ":" . "Server=" . DB_HOST . ";";
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
			throw new Exception($mensagem);
		}
	}

}
*/