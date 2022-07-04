<?php
session_start();
$pagina =$_SESSION['pagina'];

include('../config/config.php');
include('../verificar.php');

if(empty($_POST['allipcontribution'])){
    echo "Necessario selecionario um host";
    exit();
}
               
if(!empty($_POST['allipcontribution'])){

    $discovery = trim($_POST['allipcontribution']);
    if($pagina == 'allip-contribution'){
        $_SESSION['host'] = $_POST['allipcontribution'];
    }

    

    $query = array(
        'output'=>['hostid','name'],
        // 'groupids'=>'19',
        'filter'=>array('name'=>$discovery)

    );

    $auth = execLogin($user="xxxx",$password="yyyyy");
    $output = execJSON($query,'host.get',$auth);
    // print_r($output[0]->hostid);
    $numberhostid = $output[0]->hostid;

    $query = array(
        'output'=>['itemid', 'name'],
        'hostids'=> $numberhostid,
    );

    $output = execJSON($query,'discoveryrule.get',$auth);
    // print_r($output);
    $bruno = array();
    foreach($output as $allip){
        // print_r($allip->itemid . "</br>");
        $loop = $allip->itemid;
        $loopname = $allip->name;
        $bruno[] = $loopname;
        $query = array(
            'type'=>'6',
            "request"=> array("itemid"=>$loop),
        );
        
        execJSON($query,'task.create',$auth);
    }

    if(empty($bruno)){
        echo "Esse Host não existe Discovery";
        exit();
    }else{
        // echo "Discovery Realizado com sucesso";
        if($_SESSION['pagina'] == 'allip-contribution');
        // $_SESSION['allip'] = $bruno;
        print_r(json_encode($bruno));
        exit(); 
    }

} 

?>