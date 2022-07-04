<?php
@session_start();

// include("chamada/host.get.php");
require_once("verificar.php");
require_once("config/config.php");
// require_once("select/select.php");
$_SESSION['pagina'] = 'allip-contribution';

$pag = 'allip-contribution';

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
        <div class=" row conteudo3">
            <form id="form_rodar_discovery" method="POST" action="chamada/host.get.php">
                <div name="select" id="select" class="dcm1 col-md-4">
                    <!-- <form action="" id="listanew"> -->
                    <label for="exampleFormControlSelect1">Selecione o zabbix</label>
                    <select class="form-control" id="zabbixselect" id="zabbixselect">
                        <!-- <option value=""></option> -->
                        <option value="" disabled selected>Selecione o Zabbix</option>
                        <option value="Zabbix Video">Zabbix Video</option>
                        <option value="Zabbix Lapa">Zabbix Lapa</option>
                    </select>
                </div>
                <div name="list" id="list" class="dcm1 col-md-4">
                    <!-- <form action="" id="listanew"> -->
                    <label for="exampleFormControlSelect1">Selecione o grupo</label>
                    <select class="form-control" id="disciplina" required>
                        <!-- <option value=""></option> -->
                        <option value="" disabled selected id="teste">Selecione o grupo</option>
                        <option value="25" class="zabbixvideo">RECEPTORES SANTOS</option>
                        <option value="23" class="zabbixvideo">UPS CIDADES</option>
                        <option value="22" class="zabbixvideo">SWITCHES</option>
                        <option value="21" class="zabbixvideo">SENSOR TEMPERATURA</option>
                        <option value="16" class="zabbixlapa">AR CONDICIONADO</option>
                        <option value="18" class="zabbixlapa">GERADORES</option>
                    </select>
                </div>
                <!-- <form id="form_rodar_discovery" method="POST" action="chamada/host.get.php"> -->
                <div class="col-md-4">
                    <label for="exampleFormControlSelect1">Selecione o Host</label>
                    <!-- <form id="form_rodar_discovery" method="POST" action="chamada/host.get.php"> -->
                    <select class="form-control" name="allipcontribution" id="estados">
                        <option value="" disabled selected>Selecione o Host</option>
                    </select>
                    <!-- <input type="submit" value="APLICAR DISCOVERY"> -->
                    <br>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btndiscovery" style="margin-top: 23px">Aplicar Discovery</button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="dcm2 col-md-3">

                </br>
                </br>
                </br>
                <label for="exampleFormControlSelect1">Templates atualizadas</label>
                <select class="form-control" name="allipcontribution" id="discovery10">
                </select>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<script type="text/javascript">
    var pag = "<?= $pag ?>"
</script>

<script>
    $('.btndiscovery').prop('disabled', true)
</script>
<script>
    $('#document').ready(function() {
        $('#disciplina').on('change', function() {
            var cursodisciplina_id = $("#disciplina option:selected").val()
            var zabbixhost = $("#zabbixselect option:selected").val()
            var dataString = { allbooks : cursodisciplina_id, zabbix: zabbixhost};
            console.log(dataString)
            // $('.dcm2').text("")
            $.ajax({
                method: 'POST',
                url: "select/select.php",
                data: dataString,
                dataType: "json",
                success: function(data) {
                    let estadosHtml = '';
                    for (dados of data) {
                        estadosHtml += `<option value="${dados.name}">${dados.name}</option>`;
                        // console.log(estadosHtml)
                    }
                    $('#estados').html(estadosHtml);
                }
            });
        })
    });
</script>

<script src="js/ajax.js"></script>
<script type="text/javascript"></script>

<script>
    $('#document').ready(function() {
        $("#disciplina").prop('disabled', true);
        $("#estados").prop('disabled', true);
        $("#zabbixselect").on('change', function() {
            var selectvalor = $(this).val();
            // alert(selectvalor)
            $("#disciplina").val("")
            $("#estados").val("")
            $("#disciplina").prop('disabled', false);
            $("#estados").prop('disabled', true);
            // alert("olaaa")
            // $("#estados").prop('disabled', true);

            if (selectvalor == "Zabbix Lapa") {
                // $('#disciplina').children('option').hide();
                $('.zabbixvideo').hide();
                $('.zabbixlapa').show();
                // $("#estados").prop('disabled', true);
                $("#disciplina").on('change', function() {
                    $('.btndiscovery').prop('disabled', false)
                    $("#estados").prop('disabled', false);
                })
            }
            if (selectvalor == "Zabbix Video") {
                // $('#disciplina').children('option').hide();
                $('.zabbixlapa').hide();
                $('.zabbixvideo').show();

                $("#disciplina").on('change', function() {
                    $('.btndiscovery').prop('disabled', false)
                    $("#estados").prop('disabled', false);
                })
            }
        })
    })
</script>