<?php
@session_start();
require_once("../../../conexao-radius-db.php");

$usuario = $_POST['loginhidden10'];

$query10 = $pdo->query("DELETE FROM radiusdb.radcheck WHERE username ='$usuario';");
$res10 = $query10->fetchAll(PDO::FETCH_ASSOC);
$total_reg10 = @count($res10);


// $result_usuario6 = "DELETE FROM radiusdb.userinfo WHERE username ='$usuario';";
// $resultado_usuario6 = mysqli_query($conn, $result_usuario6);
// $cont6 = mysqli_num_rows($resultado_usuario6);

$query20 = $pdo->query("DELETE FROM radiusdb.userinfo WHERE username ='$usuario';");
$res20 = $query20->fetchAll(PDO::FETCH_ASSOC);
$total_reg20 = @count($res20);


// $result_usuario7 = "DELETE FROM radiusdb.radusergroup WHERE username ='$usuario';";
// $resultado_usuario7 = mysqli_query($conn, $result_usuario7);
// $cont7 = mysqli_num_rows($resultado_usuario7);

$query30 = $pdo->query("DELETE FROM radiusdb.radusergroup WHERE username ='$usuario';");
$res30 = $query30->fetchAll(PDO::FETCH_ASSOC);
$total_reg30 = @count($res30);


if ($total_reg10 == 0){
    echo "Usuario deletado com sucesso!";
}else{
    echo "Erro ao deletar usuario!";
}

?>
    