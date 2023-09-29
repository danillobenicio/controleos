function GravarEquipamento(formID)
{

   if(ValidarCampos(formID))
    {
        let tipo = $('#tipo').val();
        let modelo = $('#modelo').val();
        let identificacao = $('#identificacao').val();
        let descricao = $('#descricao').val();
        let id_equipamento = $('#id_equipamento').val();
        let id_tipo = $('#id_tipo').val();
        let id_modelo = $('#id_modelo').val();

        $.ajax({
            beforeSend: function(){
                Load();
            },
            type: 'POST',
            url: BaseUrlDataview('equipamento_dataview'),
            data: {tipo: tipo, 
                   modelo: modelo, 
                   identificacao: identificacao, 
                   descricao: descricao, 
                   id_equipamento: id_equipamento,
                   btnGravar: id_equipamento == '' ? 'cadastrar' : 'alterar',
                   id_tipo: id_tipo,
                   id_modelo: id_modelo
                },
            success: function(ret){
                console.log(ret);
                MostrarMensagem(ret);
                LimparNotificacoes(formID);
            },
            complete: function(){
                RemoverLoad();
            }
        })
    }

}


function CarregarTipos()
{
    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: 'POST',
        url: BaseUrlDataview('equipamento_dataview'),
        data: {
            carregar_tipos: 'ajx', 
            id_tipo: $("#id_tipo").val()
        },
        success: function(dados){
            $('#tipo').html(dados);
        },
        complete: function(){
            RemoverLoad();
        }
    })
}


function CarregarModelos()
{
    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: 'POST',
        url: BaseUrlDataview('equipamento_dataview'),
        data: {
            carregar_modelos: 'ajx',
            id_modelo: $("#id_modelo").val()
        },
        success: function(dados){
            $('#modelo').html(dados);
        },
        complete: function(){
            RemoverLoad();
        }
    })
}


function FiltrarEquipamento()
{
    let idTipo = $('#tipo').val();
    let idModelo = $('#modelo').val();

    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: 'POST',
        url: BaseUrlDataview('equipamento_dataview'),
        data: {
               filtrarEquipamento: 'ajx', 
               tipo: idTipo, 
               modelo: idModelo,
        },
        success: function(dados){
            console.log(dados);
            $('#resultTable').html(dados);
        },
        complete: function(){
            RemoverLoad();
        }
    })
}

function Excluir(){
 
    let id_excluir = $('#id_excluir').val();

    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: 'POST',
        url: BaseUrlDataview('equipamento_dataview'),
        data: {
               btnExcluir: 'ajx', 
               id_equipamento: id_excluir
        },
        success: function(ret){
            MostrarMensagem(ret);
            $('#modal_excluir').modal('hide');
            FiltrarEquipamento();
        },
        complete: function(){
            RemoverLoad();
        }
    })
}
