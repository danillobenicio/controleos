function CarregarExcluir(id, nome) {
    $('#id_excluir').val(id);
    $('#nome_excluir').val(nome);
}

function CarregarTipoEquipamento(id, tipo) {
    $('#id_alterar').val(id);
    $('#tipo_alterar').val(tipo);
}

function CarregarModeloEquipamento(id, modelo) {
    $('#id_alterar').val(id);
    $('#modelo_alterar').val(modelo);
}

function CarregarSetor(id, setor) {
    $('#id_alterar').val(id);
    $('#setor_alterar').val(setor);
}

function CarregarInativar(id) {
    $('#id_inativar').val(id);
}

function CarregarInativarInfo(data, motivo) {
    $('#data_descarte').html(data);
    $('#motivo_descartar').html(motivo);
}