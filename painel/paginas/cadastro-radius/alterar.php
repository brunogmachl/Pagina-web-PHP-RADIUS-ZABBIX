<?php
@session_start();
require_once("../../../conexao-radius-db.php");

$perfil_escolhido = trim($_POST['alterar_perfil']);
$dcm_atual = $_POST['alterar_dcm'];
$rfgw_atual = $_POST['alterar_rfgw'];
$cityheadend = $_POST['cityheadend'];

$nome = $_POST['alterar_nome']; //nomne do usuario
$login = $_POST['alterar_login']; // login´é o N5922681

// if (strpos($perfil_escolhido,'DCM') !== false) {

$listadcm = ['DCM ADM', 'DCM USER', 'DCM GUEST', 'vDCM ADMIN'];
if (in_array($perfil_escolhido, $listadcm)) {

    if($perfil_escolhido == $dcm_atual){
        echo "Usuario já cadastrado com a permissão {$perfil_escolhido}";
        exit();
    }
    
    else if($dcm_atual == "-"){
        $query = $pdo->query("INSERT INTO radusergroup(username,groupname,priority) VALUES ('$login', '$perfil_escolhido', '0')");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = @count($res);
        echo "Usuario cadastrado com sucesso ao perfil {$perfil_escolhido}.";
        exit();
    }else{
        $query = $pdo->query("UPDATE radusergroup set groupname = '$perfil_escolhido' where username = '$login' and groupname IN ('DCM ADM', 'DCM GUEST', 'DCM USER', 'vDCM ADMIN')");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = @count($res);
        echo "Usuario atualizado com sucesso ao perfil {$perfil_escolhido}.";
        exit();
    }
}

else if (strpos($perfil_escolhido,'RFGW') !== false) {

    if($perfil_escolhido == $rfgw_atual){
        echo "Usuario já cadastrado com a permissão {$perfil_escolhido}";
        exit();
    }
    
    else if($rfgw_atual == "-"){
        $query = $pdo->query("INSERT INTO radusergroup(username,groupname,priority) VALUES ('$login', '$perfil_escolhido', '1')");
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_reg = @count($res);
        echo "Usuario cadastrado com sucesso ao perfil {$perfil_escolhido}.";
        exit();
    }
}

else if ($perfil_escolhido == 'CIDADE'){

    $query = $pdo->query("SELECT * FROM radiusdb.userinfo where  username = '$login' and city = '$cityheadend';");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    $total_reg = @count($res);
    if($total_reg > 0){
        echo "Usuario ja se encontra nesse setor - {$cityheadend}.";
        exit();
    }else{
    // $query = $pdo->prepare("INSERT INTO radiusdb.userinfo(department) VALUES ('$cityheadend')");
    $query = $pdo->query("UPDATE userinfo set city = '$cityheadend' where username = '$login';");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    echo "Usuario cadastrado com sucesso - {$cityheadend}.";
    // if($total_reg > 0){
    //     echo "Usuario cadastrado com sucesso no - {$cityheadend}.";
    //     exit();
    // }
    }
    
}






// else if($perfil_escolhido == $rfgw_atual){
//     echo "Usuario já cadastrado com o permissão {$rfgw_atual}";
//     exit();
// }

?>
