<?php
@session_start();

// include("chamada/host.get.php");
require_once("verificar.php");


$pag = 'scripts-php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #contente {
            color: blue;
        }
    </style>
</head>

<body>
    <div class="conteudo">
        <div class="conteudo3">
            <div class="dcm1 scriptshell">
                <h1 id="">Downloads</h1>
                <!-- <a href="scripts/lucas_script_log.sh" download>lucas_script_log.sh</a></br>
                <a href="scripts/lucas_script.sh" download>lucas_script.sh</a> -->
            </div>
            <div class="dcm2">
            </div>
        </div>
    </div>

</body>

</html>