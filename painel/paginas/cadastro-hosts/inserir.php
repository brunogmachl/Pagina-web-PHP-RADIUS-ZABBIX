<?php
@session_start();
require_once("../../../conexao-radius-db.php");


$ip = $_POST['enderecoip']; // IP DO DCM
$hostname = $_POST['hostname']; //HOSTNAME DO DCM
$cidade = $_POST['description']; //descrição do host ex: cidade


//validando se o dcm ja existe no banco de dados
$query = $pdo->query("SELECT * FROM nas WHERE nasname='$ip';");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
    echo "IP já cadastrado, repita a operação!";
    exit();
}

$query = $pdo->query("SELECT * FROM nas WHERE shortname='$hostname';");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
    echo "DCM já cadastrado, repita a operação!";
    exit();
}

// // inserindo O DCM NA TABELA APOS VALIDACAO
$query = $pdo->prepare("INSERT INTO nas(id,nasname,shortname,type,ports,secret,description) VALUES ('0', :ip, :hostname, 'cisco', '1812', 'xxxxxxxxxxx', :cidade)");

$query->bindValue(":ip", "$ip");
$query->bindValue(":hostname", "$hostname");
$query->bindValue(":cidade", "$cidade ");

$query->execute();

echo 'Host adicionado com sucesso!';


?>