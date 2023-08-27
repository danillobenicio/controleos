function CadastrarModelo(formID)
{
    if (ValidarCampos(formID))
    {
        let nome_modelo = $("#modelo").val();

        $.ajax
        ({
            type: "POST",
            url: BaseUrlDataview('modelo_equipamento_dataview'),
            data:{ modelo: nome_modelo, btnCadastrar: 'ajx' },
            success: function(ret)
            {
                MostrarMensagem(ret);
                LimparNotificacoes(formID);
                ConsultarModeloEquipamento();
            }
        })
    }
}


function ConsultarModeloEquipamento()
{
    $.ajax({
        type: "POST",
        url: BaseUrlDataview('modelo_equipamento_dataview'),
        data: {consultarModelo: "ajx"},
        success: function(dados){
            $("#tableResult").html(dados);
        }
    })
}