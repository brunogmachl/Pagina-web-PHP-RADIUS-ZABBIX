<?php 

$banco = 'radiusdb';
$usuario = 'xxxxxxxxxx';
$senha = 'yyyyyyyyy';
$servidor = '192.168.0.11';

date_default_timezone_set('America/Sao_Paulo');

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
	echo 'Não conectado ao Banco de Dados! <br><br>' .$e;
}


//VARIAVEIS DO SISTEMA
$nome_sistema = 'Chamados VOC';


 ?>