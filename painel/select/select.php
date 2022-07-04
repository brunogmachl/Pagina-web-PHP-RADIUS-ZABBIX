<?php
@session_start();
$_SESSION['zabbixhost'] = $_POST['zabbix']; 
// $_SESSION['host'] = $_POST['allbooks'];
// print_r($_SESSION['host']);
// require_once("verificar.php");
require_once("../config/config.php");
// print_r($_POST);
execLogin('Admin', 'f0xk1ds!@#',$zabbix); 
$auth = $_SESSION['auth']; 
$query = array(
'output' => ['extend', 'name'],
'groupids' => $_POST['allbooks'],
);
// print_r($_SESSION['host']);
$output = execJSON($query, 'host.get', $auth);
print_r(json_encode($output)) ;
?>
