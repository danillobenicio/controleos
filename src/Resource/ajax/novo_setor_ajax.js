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
                ConsultarSetor();
            }
        })

    }
    
}

function ConsultarSetor()
{
    $.ajax({
        type: 'POST',
        url: BaseUrlDataview('novo_setor_dataview'),
        data: {consultar_setor: 'ajx'},
        success: function(dados){
            $('#resultTable').html(dados);
        }
    })
}



function AlterarSetor(formID)
{

    let id_alterar = $('#id_alterar').val();
    let setor_alterar = $('#setor_alterar').val();

    if(ValidarCampos(formID))
    {
        $.ajax({
            type: 'POST',
            url: BaseUrlDataview('novo_setor_dataview'),
            data: {id_alterar: id_alterar, setor_alterar: setor_alterar, btnAlterar: 'ajx'},
            success: function(ret){
                MostrarMensagem(ret);
                $('#alterar_setor').modal('hide');
                ConsultarSetor();
            }
        })
    }
}


function Excluir(formID)
{
        let id_excluir = $("#id_excluir").val();

        $.ajax({
            type: "POST",
            url: BaseUrlDataview('novo_setor_dataview'),
            data: {
                id_excluir: id_excluir,
                btnExcluir: 'ajx'
            },
            success: function(ret){
                MostrarMensagem(ret);
                ConsultarSetor();
                $('#modal_excluir').modal('hide');
            }
        })

}