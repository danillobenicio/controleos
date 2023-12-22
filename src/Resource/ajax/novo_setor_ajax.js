function cadastrarNovoSetor(formID)
{
    if (validarCampos(formID))
    {
        let nome_setor = $('#setor').val();
    
        $.ajax({
            beforeSend: function(){
                load();
            },
            type: 'POST',
            url: BaseUrlDataview('novo_setor_dataview'),
            data: {setor: nome_setor, btnCadastrar: 'ajx'},
            success: function(ret){
                mostrarMensagem(ret);
                limparNotificacoes(formID);
                consultarSetor();
            },
            complete: function(){
                removerLoad();
            }
        })

    }
    
}

function consultarSetor()
{

    let tipoTela = $('#tipoTela').val();

    $.ajax({
        beforeSend: function(){
            load();
        },
        type: 'POST',
        url: BaseUrlDataview('novo_setor_dataview'),
        data: {
            consultar_setor: 'ajx',
            tipo_tela: tipoTela
        },
        success: function(dados){
            $('#resultSetor').html(dados);
        },
        complete: function(){
            removerLoad();
        }
    })
}



function alterarSetor(formID)
{

    let id_alterar = $('#id_alterar').val();
    let setor_alterar = $('#setor_alterar').val();

    if(validarCampos(formID))
    {
        $.ajax({
            beforeSend: function(){
                load();
            },
            type: 'POST',
            url: BaseUrlDataview('novo_setor_dataview'),
            data: {id_alterar: id_alterar, setor_alterar: setor_alterar, btnAlterar: 'ajx'},
            success: function(ret){
                mostrarMensagem(ret);
                $('#alterar_setor').modal('hide');
                consultarSetor();
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
            url: BaseUrlDataview('novo_setor_dataview'),
            data: {
                id_excluir: id_excluir,
                btnExcluir: 'ajx'
            },
            success: function(ret){
                mostrarMensagem(ret);
                consultarSetor();
                $('#modal_excluir').modal('hide');
            },
            complete: function(){
                removerLoad();
            }
        })
}