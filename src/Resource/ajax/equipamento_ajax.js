function CadastrarEquipamento(formID)
{

    console.log('Olá');
   if(ValidarCampos(formID))
    {
        let tipo = $('#tipo').val();
        let modelo = $('#modelo').val();
        let identificacao = $('#identificacao').val();
        let descricao = $('#descricao').val();
        
        //alert(tipo_eq + " " + modelo_eq + " " + identificacao_eq + " " + descricao_eq);
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