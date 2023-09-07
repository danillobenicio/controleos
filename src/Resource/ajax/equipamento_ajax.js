function CadastrarEquipamento(formID)
{

   if(ValidarCampos(formID))
    {
        let tipo = $('#tipo').val();
        let modelo = $('#modelo').val();
        let identificacao = $('#identificacao').val();
        let descricao = $('#descricao').val();

        $.ajax({
            type: 'POST',
            url: BaseUrlDataview('equipamento_dataview'),
            data: {tipo: tipo, modelo: modelo, identificacao: identificacao, descricao: descricao, btnCadastrar: 'ajx'},
            success: function(ret){
                MostrarMensagem(ret);
                LimparNotificacoes(formID);
            }
        })
    }

}


function CarregarTipos()
{

    $.ajax({
        type: 'POST',
        url: BaseUrlDataview('equipamento_dataview'),
        data: {carregar_tipos: 'ajx'},
        success: function(dados){
            $('#resultTipos').html(dados);
        }
    })
}


function CarregarModelos()
{
    $.ajax({
        type: 'POST',
        url: BaseUrlDataview('equipamento_dataview'),
        data: {carregar_modelos: 'ajx'},
        success: function(dados){
            $('#resultModelos').html(dados);
        }
    })
}
