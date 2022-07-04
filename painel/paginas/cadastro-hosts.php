<?php
@session_start();
require_once("verificar.php");
require_once("../conexao-radius-db.php");


$pag = 'cadastro-hosts';

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
	<div class="">
		<a class="btn btn-primary btn-novo-chamado" data-toggle="modal" data-target="#modalchamados" id="criar-usuario">CRIAR HOST</a>
	</div>

	<div class="bs-example widget-shadow" style="padding:15px" id="listar">
	</div>

	<!-- MODAL INSERIR USUARIO -->
	<div class="modal fade" id="modalchamados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="width:700px ;">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Adiconar Hosts</h4>
					<button id="btn-fechar-perfil" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post" id="form_inserir_host">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="exampleInputEmail1">Hostname </label>
									<input type="text" class="form-control" id="hostname" name="hostname" placeholder="Nome" value="" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="exampleInputEmail1">Endereço IP </label>
									<input type="text" class="form-control" id="enderecoip" name="enderecoip" placeholder="IP" value="" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Cidade</label>
									<input type="text" class="form-control" id="description" name="description" placeholder="Cidade" value="" required>
								</div>
							</div>
						</div>
					</div>


					<!-- <div id="recuperar" style="display:block; text-align: center;"></div> -->
					<div id="retornomsg70" style="text-align:center ;">
						<br>
						<br>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" id="botao70">CRIAR USUARIO</button>
					</div>
				</form>
			</div>

		</div>
	</div>
	<!-- MODAL DELETAR PERFIL -->
	<div class="modal fade" id="deletar_perfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="width:700px;margin-left:-100px">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Deletar Host<span id="nome_dados"></span></h4>
					<button id="btn-fechar-perfil" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!-- <form method="POST" id="processa_cad_alterar.php" action="paginas/cadastro-radius/alterar.php"> -->
				<form method="POST" id="form_deletar_host">
					<div class="modal-body">

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									Deletar Host: <label id="nome10" name="nome10" for="exampleInputEmail1"></label>
									(<label id="login10" name="login10" for="exampleInputEmail1"></label>)</br>
									<input type="hidden" class="form-control" placeholder="Detalhes do encerramento" id="loginhidden10" name="loginhidden10" required>

								</div>
								<div id="retornomsg10" style="text-align:center ;">
									<br>
									<br>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary" id="botao10">Deletar</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


<script>
	$("#criar-usuario").click(function(){
		$("#retornomsg70").text("")
		$('#botao70').prop('disabled', false);
	})
</script>


</body>

</html>


<script type="text/javascript">
	var pag = "<?= $pag ?>"
</script>

<script src="js/ajax.js"></script>
<script type="text/javascript"></script>