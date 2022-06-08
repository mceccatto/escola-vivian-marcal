<?php
//DEFINIÇÕES DE CACHE
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

//DEFINIÇÕES DE RETORNO DE ERROS DO PHP
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

//DEFINIÇÃO DO TIME ZONE DO SERVIDOR PHP
date_default_timezone_set('America/Sao_Paulo');

//DEFINIÇÕES DE CONEXÃO COM BANCO DE DADOS
define('HOST', 'localhost');
define('DBNAME', 'codelabs_evm');
define('USER', 'codelabs_evm');
define('PASSWORD', 'codelabs_evm');

//EFETUA CONEXÃO COM BANCO DE DADOS
class conexao {

	private static $pdo;

	private static function verificaExtensao() {
		$extensao = 'pdo_mysql';
		if(!extension_loaded($extensao)):
			echo 'Extensão {$extensao} não habilitada!';
			die();
		endif;
	}

	public static function getInstance() {
		self::verificaExtensao();
		if(!isset(self::$pdo)) {
			try {
				$opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
				self::$pdo = new \PDO('mysql:host='.HOST.'; dbname='.DBNAME.';', USER, PASSWORD, $opcoes);
				self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				if ($e->getCode() == 2002) {
					echo 'Não foi possível conectar-se com o banco de dados!';
					die();
				}
			}
		}
		return self::$pdo;
	}
}

$conexao = conexao::getInstance();

//EFETUA CONSTRUÇÃO DA URL DO WEBSITE
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
	$protocolo = 'https';
}else{
	$protocolo = 'http';
}
$url = $protocolo.'://'.$_SERVER['HTTP_HOST'];
$urlCheck = $protocolo.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

//COLETA PARAMETROS GERAIS DO WEBSITE
$sql = '
SELECT *
FROM tb_parametros_gerais
';
$stm = $conexao->prepare($sql);
$stm->execute();
$parametros = $stm->fetch(PDO::FETCH_OBJ);
?>