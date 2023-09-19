function CadastrarTipoEquipamento(formID)
{
    let nome_tipo = $("#tipo").val();

    if(ValidarCampos(formID))
    {
        $.ajax({
            beforeSend: function(){
                Load();
            },
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
            },
            complete: function(){
                RemoverLoad();
            }
        })
    }
}


function ConsultarTipoEquipamento()
{
    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: "POST",
        url: BaseUrlDataview('tipo_equipamento_dataview'),
        data: {consultarTipo: 'ajx'},
        success: function(dados){
            $("#tableResult").html(dados);
        },
        complete: function(){
            RemoverLoad();
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
            beforeSend: function(){
                Load();
            },
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
            },
            complete: function(){
                RemoverLoad();
            }
        })
    }
}


function Excluir(formID)
{
        let id_excluir = $("#id_excluir").val();

        $.ajax({
            beforeSend: function(){
                Load();
            },
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
            },
            complete: function(){
                RemoverLoad();
            }
        })

}