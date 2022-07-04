<?php
@session_start();

if($_SESSION['zabbixhost']  == 'Zabbix Video' ){
	define('URL','http://x.x.x.x/zabbix/api_jsonrpc.php');
}else{
	define('URL','http://x.x.x.x/zabbix/api_jsonrpc.php');
}
/*
	Definir as informações de acordo com os dados da sua infraestrutura

	URL: 		Endereço completo da API do Zabbix em seu servidor
*/
	// define('URL','http://189.4.129.185/zabbix/api_jsonrpc.php');

/*
	Função para pesquisa do JSON da API do Zabbix
*/
	function execJSON($query,$method,$auth){

		// echo"chegou!!! \n";
	    try{

			$post = ['jsonrpc' => '2.0',

	    		'method' => $method,

	    		'params' => $query,

	    		'auth' => $auth,

	    		'id' => 1

		];

			$data = json_encode($post);

			$curl = exec("which curl");

			$curlStr = "$curl -s -X POST -H 'Content-Type: application/json' -d '$data' " . URL;

			/* Exibe saida do JSON */
			//echo $curlStr;
			
			$execCurl = exec($curlStr);
			// echo"deu certo!";
			$curlOutput = json_decode($execCurl);

			return $curlOutput->result;

		}catch (Exception $e){

	      	echo "Exceção: ",  $e->getMessage(), "\n";

	    }

	}

/*
	Função que realiza o login na API do Zabbix
*/
	function execLogin($user,$password){
		// $usuario = 'Admin';
		// $senha = 'f0xk1ds!@#';

		try{

			$queryAuth = array(

							'user' => $user,
			                'password' => $password

			            );

			$auth = execJSON($queryAuth,'user.login',null);

			if(strlen($auth) == 32){

				// $auth = execJSON($queryAuth,'user.login',null);

				
				
				// session_start();
				$_SESSION['auth'] = $auth;
				$_SESSION['login'] = true;

				return $auth;
				
				// $redirect = 'http://192.168.0.13/userdalo/dcm.php';
				// header("Location: $redirect");


			}else{

				// echo '<script>alert("Usuario ou Senha incorretos!")</script>';//window.location = "http://192.168.0.13/userdalo/dcm.php";</script>';
				//  die();
			}

		}catch (Exception $e){

	      	echo "Exceção: ",  $e->getMessage(), "\n";

	    }

	}

/*
	Função que protege a sessão de login
*/
	function protegeLogin(){
		
		$login_ok = $_SESSION['login'];
		
		if($login_ok != true){
    		
    		$redirecionar = "index.php";
    		header("Location: $redirecionar");
		
		}

	}

?>