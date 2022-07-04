<?php
@session_start();
require_once("../../../conexao-radius-db.php");
// require_once("../../auth.php");
$tabela = 'userinfo';
// $operacao1 = $_SESSION['department'];


$query = $pdo->query("SELECT username, city, firstname FROM $tabela  ORDER BY firstname asc;");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {

	echo <<<HTML
	<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr>
	<th class="esc">Nome</th> 
	<th class="esc">Setor</th> 
	<th class="esc">Login</th>	
	<th class="esc">DCM</th>	
	<th class="esc">RFGW</th>	
	<th class="esc">HE ONLINE</th>	
	<th class="esc">Ações</th> 
	</tr> 
	</thead> 
	<tbody>	
HTML;

	for ($i = 0; $i < $total_reg; $i++) {
		$nome = $res[$i]['firstname'];
		$city = $res[$i]['city'];
		$login = $res[$i]['username'];
		$headendonline = 'HE-ONLINE';
		//buscando informacoes de acesso ao dcm e rfgw
		$query1 = $pdo->query("SELECT * FROM radusergroup where username = '$login' order by priority asc");
		$res1 = $query1->fetchAll(PDO::FETCH_ASSOC);
		$total_reg1 = @count($res1);
		if ($total_reg1 > 0) {
			// echo"oi";
			if($res1[0]['priority'] == 0){
				$dcm = $res1[0]['groupname'];
				$rfgw = $res1[1]['groupname'] ? $res1[1]['groupname'] : "-";
			}
			else if($res1[0]['priority'] == 1){
				$rfgw = $res1[0]['groupname'];
				$dcm = $res1[1]['groupname'] ? $res1[1]['groupname'] : "-";
			}
			// else if($res1[0]['priority'] == false){
			// 	$dcm = "-";
			// 	$rfgw = "-";
				
			// }
			// $dcm = $res1[0]['groupname'];
			// $rfgw = $res1[1]['groupname'];
		}
		// else{
		// 	$dcm = "-";
		// 	$rfgw = "-";
		// }
	


		// $nome = $res[$i]['firstname'];
		// $login = $res[$i]['username'];
		echo <<<HTML
<tr class="{$classe_linha}">
<td class="esc">{$nome}</td>
<td class="esc">{$city}</td>
<td class="esc">{$login}</td>
<td class="esc">{$dcm}</td>
<td class="esc">{$rfgw}</td>
<td class="esc">{$headendonline}</td>
		<td>
			<!-- <big><a href="#" onclick="editar()" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big> -->

			<big><a href="#" onclick="alterar('{$nome}','{$login}','{$dcm}','{$rfgw}')" title="alterar permissão"><i class="fa fa-cog" aria-hidden="true"></i></a></big>
			
			<big><a href="#" onclick="deletar('{$nome}','{$login}')" title="Deletar usuário"><i class="fa fa-trash-o" aria-hidden="true" style="color: red"
			></i></a></big>


			<big><a href="#" onclick="ativar('{$id}', '{$acao}')" title="{$titulo_link}"><i class="fa {$icone} text-success"></i></a></big>

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
	function alterar(nome,login,dcm,rfgw) {
		$('#botao').prop('disabled', false)
		$('#retornomsg').text("");
		$('#nome').html(nome);
		$('#nomehidden').val(nome);
		$('#login').html(login);
		$('#loginhidden').val(login);
		// $('#login').html(dcm);
		$('#dcmhidden').val(dcm);
		// $('#login').html(rfgw);
		$('#rfgwhidden').val(rfgw);
		// $('#titulo_inserir').text('Editar Registro');
		$('#alterar_perfil').modal('show');
		// $('#target').attr('src','img/perfil/' + foto);
	}
</script>

<script type="text/javascript">
	function deletar(nome,login) {
		$('#botao10').prop('disabled', false)
		$('#retornomsg10').text("");
		$('#nome10').html(nome);
		// $('#nomehidden10').val(nome);
		$('#login10').html(login);
		$('#loginhidden10').val(login);
		$('#deletar_perfil').modal('show');
		// $('#target').attr('src','img/perfil/' + foto);
	}
</script>
