<?php
@session_start();
require_once("../../../conexao-radius-db.php");

// $nome = 'holanda'; //nomne do usuario
// $login = 'n1000000'; // login´é o N5922681
// $perfil_selecionado = "DCM ADM";

$nome = $_POST['nome-perfil']; //nomne do usuario
$login = $_POST['N-perfil']; // login´é o N5922681
$perfil_selecionado = $_POST['alterar_perfil']; // perfil selecionado
$Headendcity = $_POST['Headendcity']; // headend que o usuario trabalha
$city = $_POST['city']; // headend que o usuario trabalha

$loginmd5 = md5($login);
$currDate = date('Y-m-d H:i:s');


//validando se o usuario ja existe no banco de dados
$query = $pdo->query("SELECT * FROM radcheck WHERE username='$login'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
    echo "Usuário já possui cadastro!";
    exit();
}

// // inserindo no tabela radcheck
$query = $pdo->prepare("INSERT INTO radcheck(id,Username,Attribute,op,Value) VALUES ('0', :Username, 'MD5-Password', ':=', :Valor)");

$query->bindValue(":Username", "$login");
$query->bindValue(":Valor", "$loginmd5");

$query->execute();


// // inserindo no tabela userinfo
$query = $pdo->prepare("INSERT INTO userinfo(id,username,changeuserinfo,portalloginpassword,enableportallogin, creationdate, creationby,firstname, department, city) VALUES ('0', :Username, '1', :portalloginpassword, '1', :creationdate, 'administrator', :firstname, :Headendcity, :city)");

$query->bindValue(":Username", "$login");
$query->bindValue(":firstname", "$nome");
$query->bindValue(":Headendcity", "$Headendcity");
$query->bindValue(":city", "$city");
$query->bindValue(":creationdate", "$currDate");
$query->bindValue(":portalloginpassword", "$loginmd5");

$query->execute();


//inserindo no radusergroup
if($perfil_selecionado == "RFGW - CISCO"){
    $query = $pdo->prepare("INSERT INTO radusergroup(username,groupname,priority) VALUES (:Username, :perfilselecionado, '1')");

    $query->bindValue(":Username", "$login");
    $query->bindValue(":perfilselecionado", "$perfil_selecionado");

    $query->execute();
}else{
    $query = $pdo->prepare("INSERT INTO radusergroup(username,groupname,priority) VALUES (:Username, :perfilselecionado, '0')");

    $query->bindValue(":Username", "$login");
    $query->bindValue(":perfilselecionado", "$perfil_selecionado");

    $query->execute();
    
}
echo 'Usuário adicionado com sucesso!';


?>