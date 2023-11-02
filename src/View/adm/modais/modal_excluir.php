<div class="modal fade" id="modal_excluir">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmar Remoção</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_excluir" id="id_excluir">
                    <input type="hidden" name="nome_excluir" id="nome_excluir">
                    <label>Deseja realmente remover esse registro?</label>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button onclick="Excluir('formAlt')" type="button" name="btnExcluir"
                    class="btn btn-secondary">Sim</button>
            </div>
        </div>
    </div>
</div>






<!--
    <div class="modal fade" id="modal_excluir">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmar Exclusão</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="id_excluir" id="id_excluir">
                    <input type="hidden" name="nome_excluir" id="nome_excluir">
                    <label>Deseja realmente excluir esse registro?</label>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button onclick="" type="submit" name="btnExcluir"
                    class="btn btn-secondary">Sim</button>
            </div>
        </div>
    </div>
</div>
-->