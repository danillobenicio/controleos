function CadastrarTipoEquipamento(formID)
{
    let nome_tipo = $("#tipo").val();

    if(ValidarCampos(formID))
    {
        $.ajax({
            type: "POST",
            url: BaseUrlDataview('tipo_equipamento_dataview'),
            data: {
                tipo: nome_tipo,
                btnCadastrar: 'ajx'
            },
            success: function(ret){
                MostrarMensagem(ret);
                ConsultarTipoEquipamento();
                LimparNotificacoes(formID);
            }
        })
    }
}

function ConsultarTipoEquipamento()
{
    $.ajax({
        type: "POST",
        url: BaseUrlDataview('tipo_equipamento_dataview'),
        data: {consultarTipo: 'ajx'},
        success: function(dados){
            $("#tableResult").html(dados);
        }
    })
}

function AlterarTipoEquipamento(formID)
{
   let id_alterar = $("#id_alterar").val();
   let tipo_alterar = $("#tipo_alterar").val();

   //console.log(id_tipo_alterar + " " + nome_tipo_alterar);
    if(ValidarCampos(formID))
    {

        $.ajax({
            type: "POST",
            url: BaseUrlDataview('tipo_equipamento_dataview'),
            data: {
                id_alterar: id_alterar,
                tipo_alterar: tipo_alterar,
                btnAlterar: 'ajx'
            },
            success: function(ret){
                MostrarMensagem(ret);
                $('#alterar_tipo').modal('hide');
                ConsultarTipoEquipamento();         
            }
        })
    }
}


function ExcluirTipoEquipamento(formID)
{
        let id_excluir = $("#id_excluir").val();

        $.ajax({
            type: "POST",
            url: BaseUrlDataview('tipo_equipamento_dataview'),
            data: {
                id_excluir: id_excluir,
                btnExcluir: 'ajx'
            },
            success: function(ret){
                MostrarMensagem(ret);
                ConsultarTipoEquipamento();
                LimparNotificacoes(formID);
                $('#modal_excluir').modal('hide');
            }
        })

}