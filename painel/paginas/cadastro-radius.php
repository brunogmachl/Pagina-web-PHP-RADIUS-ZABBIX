<?php
@session_start();
require_once("verificar.php");
require_once("cidades/headendscity.php");
require_once("../conexao-radius-db.php");


$pag = 'cadastro-radius';

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
        <a class="btn btn-primary btn-novo-chamado" data-toggle="modal" data-target="#modalchamados" id="criar-usuario">CRIAR USUARIO</a>
    </div>

    <div class="bs-example widget-shadow" style="padding:15px" id="listar">
    </div>

    <!-- MODAL INSERIR USUARIO -->
    <div class="modal fade" id="modalchamados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:700px ;">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Criação de usuario</h4>
                    <button id="btn-fechar-perfil" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="form-inserir-usuario">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome </label>
                                    <input type="text" class="form-control" id="nome-perfil" name="nome-perfil" placeholder="Nome" value="" required>
                                </div>
                            </div>
                            <!-- <div class="row"> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">N </label>
                                    <input type="text" class="form-control" id="N-perfil" name="N-perfil" placeholder="N" value="" required>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Headend</label>
                                    <input type="text" class="form-control" id="Headendcity" name="Headendcity" placeholder="HeadendSPO" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cidade</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="São Paulo" value="" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Groupname </label>
                                    <select name="alterar_perfil" id="PERFIL">
                                        <?php
                                        $query2 = $pdo->query("SELECT * FROM radgroupreply");
                                        $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                                        $total_reg2 = @count($res2);
                                        if ($total_reg2 > 0) {
                                            for ($i = 0; $i < $total_reg2; $i++) { ?>
                                                <option value="<?= $res2[$i]['groupname']; ?>"><?= $res2[$i]['groupname']; ?></option> <?php
                                                                                                                                    }
                                                                                                                                } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div id="recuperar" style="display:block; text-align: center;"></div> -->
                    <div id="retornomsg20" style="text-align:center ;">
                        <br>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="botao20">CRIAR USUARIO</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL ALTERAR PERFIL -->
    <div class="modal fade" id="alterar_perfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:700px;margin-left:-100px">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Alterar perfil<span id="nome_dados"></span></h4>
                    <button id="btn-fechar-perfil" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- <form method="POST" id="processa_cad_alterar.php" action="paginas/cadastro-radius/alterar.php"> -->
                <form method="POST" id="form_alterar_perfil">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    Alterar permissão: <label id="nome" name="nome" for="exampleInputEmail1"></label>
                                    (<label id="login" name="login" for="exampleInputEmail1"></label>)
                                    <!-- <div id="retornomsg" style="text-align:center ;">
									</div> -->
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
							<label for="exampleInputEmail1">Perfil:</label>
                                <select name="alterar_perfil" id="PERFIL">
                                    <?php
                                    $query2 = $pdo->query("SELECT * FROM radgroupreply");
                                    $res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
                                    $total_reg2 = @count($res2);
                                    if ($total_reg2 > 0) {
                                        for ($i = 0; $i < $total_reg2; $i++) { ?>
                                            <option value="<?= $res2[$i]['groupname']; ?>"><?= $res2[$i]['groupname']; ?></option> <?php                                                                    }
                                                                                                                            } ?>
                                </select>

                            </div>


                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cidade:</label>
                                    <select name="cityheadend" id="cityheadend">
                                        <?php
                                            foreach ($headends as $headend) { ?>
                                                <option value="<?= $headend; ?>"><?= $headend; ?></option> <?php
												}
											?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>


                        <div>
                            <input type="hidden" class="form-control" id="nomehidden" name="alterar_nome" required>
                            <input type="hidden" class="form-control" id="loginhidden" name="alterar_login" required>
                            <input type="hidden" class="form-control" id="dcmhidden" name="alterar_dcm" required>
                            <input type="hidden" class="form-control" id="rfgwhidden" name="alterar_rfgw" required>
                        </div>
                        </br>
                        <div id="retornomsg" style="text-align:center ;">
                            <br>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="botao">Alterar</button>
                        </div>
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
                    <h4 class="modal-title" id="exampleModalLabel">Deletar usuário<span id="nome_dados"></span></h4>
                    <button id="btn-fechar-perfil" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- <form method="POST" id="processa_cad_alterar.php" action="paginas/cadastro-radius/alterar.php"> -->
                <form method="POST" id="form_deletar_perfil">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    Deletar usuário: <label id="nome10" name="nome10" for="exampleInputEmail1"></label>
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



</body>

</html>


<script type="text/javascript">
    var pag = "<?= $pag ?>"
</script>

<script src="js/ajax.js"></script>
<script type="text/javascript"></script>