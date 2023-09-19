function CadastrarModelo(formID) {
    if (ValidarCampos(formID)) {
        let nome_modelo = $("#modelo").val();

        $.ajax({
            beforeSend: function(){
                Load();
            },
            type: "POST",
            url: BaseUrlDataview('modelo_equipamento_dataview'),
            data: {
                modelo: nome_modelo,
                btnCadastrar: 'ajx'
            },
            success: function (ret) {
                MostrarMensagem(ret);
                LimparNotificacoes(formID);
                ConsultarModeloEquipamento();
            },
            complete: function(){
                RemoverLoad();
            }
        })
    }
}


function ConsultarModeloEquipamento() {
    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: "POST",
        url: BaseUrlDataview('modelo_equipamento_dataview'),
        data: {
            consultarModelo: "ajx"
        },
        success: function (dados) {
            $("#tableResult").html(dados);
        },
        complete: function(){
            RemoverLoad();
        }
    })
}


function AlterarModeloEquipamento(formID) {

    let id_alterar = $("#id_alterar").val();
    let modelo_alterar = $("#modelo_alterar").val();

    if (ValidarCampos(formID)) {
        $.ajax({
            beforeSend: function(){
                Load();
            },
            type: "POST",
            url: BaseUrlDataview("modelo_equipamento_dataview"),
            data: {
                id_alterar: id_alterar,
                modelo_alterar: modelo_alterar,
                btnAlterar: "ajx"
            },
            success: function (ret) {
                MostrarMensagem(ret);
                $("#alterar_modelo").modal("hide");
                ConsultarModeloEquipamento();
            },
            complete: function(){
                RemoverLoad();
            }

        })
    }

}


function Excluir(formID){

    let id_excluir = $("#id_excluir").val();

    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: "POST",
        url: BaseUrlDataview("modelo_equipamento_dataview"),
        data: {btnExcluir: "ajx", id_excluir: id_excluir},
        success: function(ret){
            MostrarMensagem(ret);
            $("#modal_excluir").modal("hide");
            ConsultarModeloEquipamento();
        },
        complete: function(){
            RemoverLoad();
        }
    })

}