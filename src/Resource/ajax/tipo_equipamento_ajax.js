function cadastrarTipoEquipamento(formID) {

    if (validarCampos(formID)) {

        let nome_tipo = $("#tipo").val();

        $.ajax({
            beforeSend: function(){
                load();
            },
            type: "POST",
            url: BaseUrlDataview('tipo_equipamento_dataview'),
            data: {
                tipo: nome_tipo,
                btnCadastrar: 'ajx'
            },
            success: function(ret){
                mostrarMensagem(ret);
                consultarTipoEquipamento();
                limparNotificacoes(formID);
            },
            complete: function(){
                removerLoad();
            }
        })
    }
}


function consultarTipoEquipamento() {
    $.ajax({
        beforeSend: function(){
            load();
        },
        type: "POST",
        url: BaseUrlDataview('tipo_equipamento_dataview'),
        data: {
            consultarTipo: 'ajx'
        },
        success: function(dados){
            $("#tableResult").html(dados);
        },
        complete: function(){
            removerLoad();
        }
    })
}

function alterarTipoEquipamento(formID)
{
   let id_alterar = $("#id_alterar").val();
   let tipo_alterar = $("#tipo_alterar").val();

    if(validarCampos(formID))
    {

        $.ajax({
            beforeSend: function(){
                load();
            },
            type: "POST",
            url: BaseUrlDataview('tipo_equipamento_dataview'),
            data: {
                id_alterar: id_alterar,
                tipo_alterar: tipo_alterar,
                btnAlterar: 'ajx'
            },
            success: function(ret){
                mostrarMensagem(ret);
                $('#alterar_tipo').modal('hide');
                consultarTipoEquipamento();         
            },
            complete: function(){
                removerLoad();
            }
        })
    }
}


function excluir(formID)
{
        let id_excluir = $("#id_excluir").val();

        $.ajax({
            beforeSend: function(){
                load();
            },
            type: "POST",
            url: BaseUrlDataview('tipo_equipamento_dataview'),
            data: {
                id_excluir: id_excluir,
                btnExcluir: 'ajx'
            },
            success: function(ret){
                mostrarMensagem(ret);
                consultarTipoEquipamento();
                limparNotificacoes(formID);
                $('#modal_excluir').modal('hide');
            },
            complete: function(){
                removerLoad();
            }
        })

}