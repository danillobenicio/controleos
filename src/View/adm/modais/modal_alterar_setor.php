<div class="modal fade" id="alterar_setor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alterar Setor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="id_alterar" name="id_alterar">
                        <input type="text" class="form-control obg" id="setor_alterar" name="setor_alterar">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button onclick="return AlterarSetor('formAlt')" type="button" name="btnAlterar"
                    class="btn btn-secondary" id="btnAlterar">Alterar</button>
            </div>
        </div>
    </div>
</div>