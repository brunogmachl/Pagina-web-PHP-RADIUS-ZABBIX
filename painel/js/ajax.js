$(document).ready(function() {
    listar();
	} );

function listar(){
    $.ajax({
        url: 'paginas/' + pag + "/listar.php",
        method: 'POST',
        data: $('#form').serialize(),
        dataType: "html",

        success:function(result){
            $("#listar").html(result);
            $('#mensagem-excluir').text('');
        }
    });
}


$("#form_alterar_perfil").submit(function() { //nome do formulario
    event.preventDefault(); //nao atualiza a pagina
    var formData = new FormData(this); //pega os dados do formulario
    $.ajax({
        // url: "./paginas/chamado-api-encerrar-tkt.php", //local onde esta o arquivo a ser executado
        url: 'paginas/'+ pag +"/alterar.php", //local onde esta o arquivo a ser executado
        type: 'POST',
        data: formData,
        success: function(mensagem) {
            // alert("chegou")
            $('#retornomsg').text("")
            $('#retornomsg').removeClass()
            console.log('aqui>>>>>>>>>>',mensagem)
            if (mensagem.indexOf("com sucesso")!= -1) { //o que é devolvido do arquivo chamadoapi.php
                //$('#btn-fechar-usu').click();
                listar()
                $('#retornomsg').addClass('text-success') //cor da msg
                $('#retornomsg').text(mensagem)
                $('#botao').prop('disabled', true)
            } else {
                $('#retornomsg').addClass('text-danger')
                $('#retornomsg').text(mensagem)
                // $('#retornomsg').text(mensagem)
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    });

});

$("#form_deletar_perfil").submit(function() { //nome do formulario
    event.preventDefault(); //nao atualiza a pagina
    var formData = new FormData(this); //pega os dados do formulario
    $.ajax({
        // url: "./paginas/chamado-api-encerrar-tkt.php", //local onde esta o arquivo a ser executado
        url: 'paginas/'+ pag +"/deletar.php", //local onde esta o arquivo a ser executado
        type: 'POST',
        data: formData,
        success: function(mensagem) {
            
            $('#retornomsg10').text("")
            $('#retornomsg10').removeClass()
            console.log('aqui>>>>>>>>>>',mensagem)
            if (mensagem.indexOf("Usuario deletado com sucesso!")!= -1) { //o que é devolvido do arquivo chamadoapi.php
                //$('#btn-fechar-usu').click();
                // alert("chegou")
                listar()
                $('#retornomsg10').addClass('text-success') //cor da msg
                $('#retornomsg10').text(mensagem)
                $('#botao10').prop('disabled', true)
            } else {
                $('#retornomsg10').addClass('text-danger')
                $('#retornomsg10').text(mensagem)
                // $('#retornomsg10').text(mensagem)
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    });

});


$("#form_deletar_host").submit(function() { //nome do formulario
    event.preventDefault(); //nao atualiza a pagina
    var formData = new FormData(this); //pega os dados do formulario
    $.ajax({
        // url: "./paginas/chamado-api-encerrar-tkt.php", //local onde esta o arquivo a ser executado
        url: 'paginas/'+ pag +"/deletar.php", //local onde esta o arquivo a ser executado
        type: 'POST',
        data: formData,
        success: function(mensagem) {
            
            $('#retornomsg10').text("")
            $('#retornomsg10').removeClass()
            console.log('aqui>>>>>>>>>>',mensagem)
            if (mensagem.indexOf("Usuario deletado com sucesso!")!= -1) { //o que é devolvido do arquivo chamadoapi.php
                //$('#btn-fechar-usu').click();
                // alert("chegou")
                listar()
                $('#retornomsg10').addClass('text-success') //cor da msg
                $('#retornomsg10').text(mensagem)
                $('#botao10').prop('disabled', true)
            } else {
                $('#retornomsg10').addClass('text-danger')
                $('#retornomsg10').text(mensagem)
                // $('#retornomsg10').text(mensagem)
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    });

});


$("#form-inserir-usuario").submit(function() { //nome do formulario
    event.preventDefault(); //nao atualiza a pagina
    var formData = new FormData(this); //pega os dados do formulario
    $.ajax({
        // url: "./paginas/chamado-api-encerrar-tkt.php", //local onde esta o arquivo a ser executado
        url: 'paginas/'+ pag +"/inserir.php", //local onde esta o arquivo a ser executado
        type: 'POST',
        data: formData,
        success: function(mensagem) {
            // alert("cheguei")
            $('#retornomsg20').text("")
            $('#retornomsg20').removeClass()
            console.log('aqui>>>>>>>>>>',mensagem)
            if (mensagem.indexOf("Usuário adicionado com sucesso!")!= -1) { //o que é devolvido do arquivo chamadoapi.php
                //$('#btn-fechar-usu').click();
                // alert("chegou")
                listar()
                $('#retornomsg20').addClass('text-success') //cor da msg
                $('#retornomsg20').text(mensagem)
                $('#botao20').prop('disabled', true)
            } else {
                $('#retornomsg20').addClass('text-danger')
                $('#retornomsg20').text(mensagem)
                // $('#retornomsg10').text(mensagem)
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    });

});

$("#criar-usuario").click(function () {
    $('#retornomsg20').text("")
    $('#nome-perfil').val("")
    $('#N-perfil').val("")
    $('#Headendcity').val("")
    $('#city').val("")
    $('#botao20').prop('disabled', false);
});

$("#form_rodar_discovery").submit(function() { //nome do formulario
    event.preventDefault(); //nao atualiza a pagina
    var formData = new FormData(this); //pega os dados do formulario
    $("#zabbixselect").val("")
    $('.btndiscovery').prop('disabled', true)
    $.ajax({
        // url: "./paginas/chamado-api-encerrar-tkt.php", //local onde esta o arquivo a ser executado
        url: 'chamada/host.get.php', //local onde esta o arquivo a ser executado
        type: 'POST',
        data: formData,
        // dataType: "json",
        
        success: function(mensagem) {
            
            $('#retornomsg50').text("")
            $('#retornomsg50').removeClass()
            console.log('aqui>>>>>>>>>>',mensagem)
            if (mensagem.indexOf("[")!= -1) { //o que é devolvido do arquivo chamadoapi.php
                // if(Array.isNumber(mensagem)){
                //$('#btn-fechar-usu').click();
                // listar()
                alert('Discovery Realizado com sucesso')
                let select_discovery = '';
                let mensagem_new =  JSON.parse(mensagem)
                console.log('%%%%%>>>',mensagem_new)
                for (dados of mensagem_new) {
                    select_discovery += `<option value="${dados}">${dados}</option>`;
                    // console.log(estadosHtml)
                }
                $('#discovery10').html(select_discovery);
                $("#zabbixselect").val("")
                $("#disciplina").val("")
                $("#estados").val("")
                $("#disciplina").prop('disabled', true);
                $("#estados").prop('disabled', true);
            } else {
                // console.log('aqui>>>>>>>>>>',select_discovery)
                // $('#retornomsg50').addClass('text-danger')
                alert(mensagem)
                
                $("#disciplina").val("")
                $("#discovery10").val("")
                $("#estados").val("")
                $("#disciplina").prop('disabled', true);
                $("#estados").prop('disabled', true);
                // $('#retornomsg50').text(mensagem)
                // $('#retornomsg').text(mensagem)
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    });

});

$("#form_inserir_host").submit(function() { //nome do formulario
    event.preventDefault(); //nao atualiza a pagina
    var formData = new FormData(this); //pega os dados do formulario
    $.ajax({
        // url: "./paginas/chamado-api-encerrar-tkt.php", //local onde esta o arquivo a ser executado
        url: 'paginas/'+ pag +"/inserir.php", //local onde esta o arquivo a ser executado
        type: 'POST',
        data: formData,
        success: function(mensagem) {
            // alert("chegou")
            $('#retornomsg70').text("")
            $('#retornomsg70').removeClass()
            console.log('aqui>>>>>>>>>>',mensagem)
            if (mensagem.indexOf("Host adicionado com sucesso!")!= -1) { //o que é devolvido do arquivo chamadoapi.php
                //$('#btn-fechar-usu').click();
                listar()
                $('#retornomsg70').addClass('text-success') //cor da msg
                $('#retornomsg70').text(mensagem)
                $('#botao70').prop('disabled', true)
            } else {
                $('#retornomsg70').addClass('text-danger')
                $('#retornomsg70').text(mensagem)
                // $('#retornomsg').text(mensagem)
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    });

});
