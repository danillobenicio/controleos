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
                LimparNotificacoes(formID);
            }
        })
    }
}