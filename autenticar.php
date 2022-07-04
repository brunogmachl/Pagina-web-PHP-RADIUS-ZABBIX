<?php 
@session_start();
require_once("conexao-radius-db.php");


$email = $_POST['email'];
$senha = $_POST['senha'];
$senha_crip = md5($senha);

$usuarios = array('nxxxxx','nxxxxx','nxxxxxx','nxxxxxx','nxxxxxxx','xxxxxxxxx');

if(!in_array("$email",$usuarios)) {
    echo "usuario invalido";
    echo "<script>window.alert('usuario invalido')</script>";
	echo "<script>window.location='index.php'</script>";
}

$query = $pdo->prepare("SELECT * from userinfo where username = :email and portalloginpassword = :senha");
$query->bindValue(":email", "$email");
$query->bindValue(":senha", "$senha_crip");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);

$total_reg = @count($res);
if($total_reg > 0){
	// $ativo = $res[0]['ativo'];
    $_SESSION['id'] = $res[0]['id'];
    $_SESSION['firstname'] = $res[0]['firstname'];
    $_SESSION['department'] = $res[0]['department'];
    // $_SESSION['nome'] = $res[0]['nome'];

    //ir para o painel
    echo "<script>window.location='painel'</script>";
	
	
}else{
	echo "<script>window.alert('Senha Incorreta!')</script>";
	echo "<script>window.location='index.php'</script>";
}

 ?>