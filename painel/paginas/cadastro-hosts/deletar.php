<?php
@session_start();
require_once("../../../conexao-radius-db.php");

$ip = $_POST['loginhidden10'];

$query10 = $pdo->query("DELETE FROM radiusdb.nas WHERE nasname ='$ip';");
$res10 = $query10->fetchAll(PDO::FETCH_ASSOC);
$total_reg10 = @count($res10);


if ($total_reg10 == 0){
    echo "Usuario deletado com sucesso!";
}else{
    echo "Erro ao deletar usuario!";
}

?>
    