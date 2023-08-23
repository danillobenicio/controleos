function CadastrarNovoSetor(formID)
{
    if (ValidarCampos(formID))
    {
        let nome_setor = $('#setor').val();
    
        $.ajax({
            type: 'POST',
            url: BaseUrlDataview('novo_setor_dataview'),
            data: {setor: nome_setor, btnCadastrar: 'ajx'},
            success: function(ret){
                MostrarMensagem(ret);
                LimparNotificacoes(formID);
            }
        })

    }
    
}