function cadastrarModelo(formID) {

    if (validarCampos(formID)) {

        let nome_modelo = $("#modelo").val();

        $.ajax({
            beforeSend: function(){
                load();
            },
            type: "POST",
            url: baseUrlDataview('modelo_equipamento_dataview'),
            data: {
                modelo: nome_modelo,
                btnCadastrar: 'ajx'
            },
            success: function (ret) {
                mostrarMensagem(ret);
                limparNotificacoes(formID);
                consultarModeloEquipamento();
            },
            complete: function(){
                removerLoad();
            }
        })
    }
}


function consultarModeloEquipamento() {
    $.ajax({
        beforeSend: function(){
            load();
        },
        type: "POST",
        url: baseUrlDataview('modelo_equipamento_dataview'),
        data: {
            consultarModelo: "ajx"
        },
        success: function (dados) {
            $("#tableResult").html(dados);
        },
        complete: function(){
            removerLoad();
        }
    })
}


function alterarModeloEquipamento(formID) {

    let id_alterar = $("#id_alterar").val();
    let modelo_alterar = $("#modelo_alterar").val();

    if (validarCampos(formID)) {
        $.ajax({
            beforeSend: function(){
                load();
            },
            type: "POST",
            url: baseUrlDataview("modelo_equipamento_dataview"),
            data: {
                id_alterar: id_alterar,
                modelo_alterar: modelo_alterar,
                btnAlterar: "ajx"
            },
            success: function (ret) {
                mostrarMensagem(ret);
                $("#alterar_modelo").modal("hide");
                consultarModeloEquipamento();
            },
            complete: function(){
                removerLoad();
            }

        })
    }

}


function excluir(formID){

    let id_excluir = $("#id_excluir").val();

    $.ajax({
        beforeSend: function(){
            load();
        },
        type: "POST",
        url: baseUrlDataview("modelo_equipamento_dataview"),
        data: {btnExcluir: "ajx", id_excluir: id_excluir},
        success: function(ret){
            mostrarMensagem(ret);
            $("#modal_excluir").modal("hide");
            consultarModeloEquipamento();
        },
        complete: function(){
            removerLoad();
        }
    })

}