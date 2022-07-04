<?php
@session_start();
require_once("../../../conexao-radius-db.php");
// require_once("../../auth.php");
$tabela = 'nas';
// $operacao1 = $_SESSION['department'];


$query = $pdo->query("SELECT shortname, nasname, description FROM $tabela  ORDER BY shortname asc;");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {

	echo <<<HTML
	<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr>
	<th class="esc">DCM</th> 
	<th class="esc">IP</th>	
	<th class="esc">Descrição</th>
	<th class="esc">Ações</th>	
	</tr> 
	</thead> 
	<tbody>	
HTML;

	for ($i = 0; $i < $total_reg; $i++) {
		$dcm = $res[$i]['shortname'];
		$ip = $res[$i]['nasname'];
		$descricao = $res[$i]['description'];

		echo <<<HTML
<tr class="{$classe_linha}">
<td class="esc">{$dcm}</td>
<td class="esc">{$ip}</td>
<td class="esc">{$descricao}</td>
		<td>

			<big><a href="#" onclick="deletar('{$dcm}','{$ip}')" title="Deletar Host"><i class="fa fa-trash-o" aria-hidden="true" style="color: red"
			></i></a></big>

		</td>

</tr>
HTML;
	}

	echo <<<HTML
</tbody>
<small><div align="center" id="mensagem-excluir"></div></small>
</table>
</small>
HTML;
} else {
	echo 'Não possui nenhum registro Cadastrado!';
}


?>




<script type="text/javascript">
	$(document).ready(function() {
		$('#tabela').DataTable({
			"ordering": false,
			"stateSave": true,
		});
	});
</script>



<script type="text/javascript">
	function deletar(dcm, ip) {
		$('#botao10').prop('disabled', false)
		$('#retornomsg10').text("");
		$('#nome10').html(dcm);
		// $('#nomehidden10').val(nome);
		$('#login10').html(ip);
		$('#loginhidden10').val(ip);
		$('#deletar_perfil').modal('show');
		// $('#target').attr('src','img/perfil/' + foto);
	}
</script>