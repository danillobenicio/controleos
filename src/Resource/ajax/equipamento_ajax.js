function gravarEquipamento(formID) {

    if (validarCampos(formID)) {

        let tipo = $('#tipo').val();
        let modelo = $('#modelo').val();
        let identificacao = $('#identificacao').val();
        let descricao = $('#descricao').val();
        let id_equipamento = $('#id_equipamento').val();

        $.ajax({
            beforeSend: function () {
                load();
            },
            type: 'POST',
            url: baseUrlDataview('equipamento_dataview'),
            data: {
                tipo: tipo,
                modelo: modelo,
                identificacao: identificacao,
                descricao: descricao,
                id_equipamento: id_equipamento,
                btnGravar: id_equipamento == '' ? 'cadastrar' : 'alterar'
            },
            success: function (ret) {
                mostrarMensagem(ret);
                limparNotificacoes(formID);
            },
            complete: function () {
                removerLoad();
            }
        })
    }

}


function carregarTipos() {
    $.ajax({
        beforeSend: function () {
            load();
        },
        type: 'POST',
        url: baseUrlDataview('equipamento_dataview'),
        data: {
            carregar_tipos: 'ajx',
            id_tipo: $("#id_tipo").val()
        },
        success: function (dados) {
            $('#tipo').html(dados);
        },
        complete: function () {
            removerLoad();
        }
    })
}


function carregarModelos() {
    $.ajax({
        beforeSend: function () {
            load();
        },
        type: 'POST',
        url: baseUrlDataview('equipamento_dataview'),
        data: {
            carregar_modelos: 'ajx',
            id_modelo: $("#id_modelo").val()
        },
        success: function (dados) {
            $('#modelo').html(dados);
        },
        complete: function () {
            removerLoad();
        }
    })
}


function filtrarEquipamento() {
    let idTipo = $('#tipo').val();
    let idModelo = $('#modelo').val();

    $.ajax({
        beforeSend: function () {
            load();
        },
        type: 'POST',
        url: baseUrlDataview('equipamento_dataview'),
        data: {
            filtrarEquipamento: 'ajx',
            tipo: idTipo,
            modelo: idModelo,
        },
        cache: false,
        success: function (dados) {
            $('#resultTable').html(dados);
        },
        complete: function () {
            removerLoad();
        }
    })
}

function excluir() {

    let id_excluir = $('#id_excluir').val();
    let valor_tela = $('#tela').val() == 'tela_remover' ? 'remover' : 'excluir';

    $.ajax({
        beforeSend: function () {
            load();
        },
        type: 'POST',
        url: baseUrlDataview('equipamento_dataview'),
        data: {
            btnExcluir: valor_tela,
            id_equipamento: id_excluir
        },
        success: function (ret) {
            mostrarMensagem(ret);
            if(valor_tela == 'excluir') {
                filtrarEquipamento();
            }else {
                consultarEquipamentosAlocados($('#resultSetor').val());
            }
            $('#modal_excluir').modal('hide');          
        },
        complete: function () {
            removerLoad();
        }
    })
}

function inativar(formID) {

    let id_inativar = $('#id_inativar').val();
    let data_descarte = $('#dt_descarte').val();
    let motivo_descarte = $('#motivo_descarte').val();

    if (validarCampos(formID)) {
        $.ajax({
            beforeSend: function(){
                load();
            },
            type: 'POST',
            url: baseUrlDataview('equipamento_dataview'),
            data: {
                btnInativar: 'ajx',
                id_inativar: id_inativar,
                data_descarte: data_descarte,
                motivo_descarte: motivo_descarte
            },
            success: function (ret) {
                mostrarMensagem(ret);
                limparNotificacoes();
                $('#modal_inativar').modal('hide');
                filtrarEquipamento();
                
            },
            complete: function () {
                removerLoad();
            }

        })
    }

}


function carregarEquipamentosNaoAlocados() {

    $.ajax({
        beforeSend: function () {
            load();
        },
        type: 'POST',
        url: baseUrlDataview('equipamento_dataview'),
        data: {
            carregar_equipamentos_nao_alocados: 'ajx'
        },
        success: function (dados) {
            $('#resultEquipamentos').html(dados)
        },
        complete: function () {
            removerLoad();
        }
    })
}


function alocarEquipamento(formID) {

    if(validarCampos(formID)) {

        
        let id_equipamento = $('#resultEquipamentos').val();
        let id_setor = $('#resultSetor').val();

        $.ajax({
            beforeSend: function () {
                load();
            },
            type: 'POST',
            url: baseUrlDataview('equipamento_dataview'),
            data: {
                alocar_equipamento: 'ajx',
                id_equipamento: id_equipamento,
                id_setor: id_setor
            },
            success: function (ret) {
                mostrarMensagem(ret);
                carregarEquipamentosNaoAlocados();
            },
            complete: function () {
                removerLoad();
            }
        })
    }    

}


function consultarEquipamentosAlocados(idSetor) {
    if(idSetor != ''){
        $.ajax({
            beforeSend: function () {
                load();
            },
            type: 'POST',
            url: baseUrlDataview('equipamento_dataview'),
            data: {
                filtrar_equipamentos_alocados_setor: 'ajx',
                idSetor: idSetor
            },
            success: function (ret) {
                $('#resultTable').html(ret);
                $('#divResultado').show();
            },
            complete: function () {
                removerLoad();
            }
        })  
    }
}   


function removerEquipamentoAlocado(idAlocamento) {


        let id_excluir = $('#id_excluir').val();
    
        alert(id_excluir);
    
        /*$.ajax({
            beforeSend: function () {
                Load();
            },
            type: 'POST',
            url: BaseUrlDataview('equipamento_dataview'),
            data: {
                btnExcluir: 'ajx',
                id_equipamento: id_excluir,
                nome: nome
            },
            success: function (ret) {
                MostrarMensagem(ret);
                $('#modal_excluir').modal('hide');
                FiltrarEquipamento();
            },
            complete: function () {
                RemoverLoad();
            }
        })*/
}
