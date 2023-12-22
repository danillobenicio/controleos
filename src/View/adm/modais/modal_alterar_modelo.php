<div class="modal fade" id="alterar_modelo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Modelo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_alterar" id="id_alterar">
                    <input type="text" class="form-control obg" id="modelo_alterar" name="modelo_alterar">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button onclick="return alterarModeloEquipamento('formAlt')" type="button" id="btnAlterar" name="btnAlterar"
                    class="btn btn-secondary">Alterar</button>
            </div>
        </div>
    </div>
</div>