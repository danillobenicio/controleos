<div class="modal fade" id="modal_inativar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Inativar Equipamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control obg" type="hidden" name="id_inativar" id="id_inativar">                   
                    <label for="dt_descarte">Data descarte</label>
                    <input type="date" class="form-control obg" id="dt_descarte" name="dt_descarte">
                    <br>
                    <label for="descricao">Motivo Descarte</label>
                    <textarea class="form-control obg" id="motivo_descarte" rows="2"
                     name="motivo_descarte"></textarea>                               
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button onclick="Inativar('formAlt')" type="button" name="btnInativar"
                    class="btn btn-secondary">Inativar</button>
            </div>
        </div>
    </div>
</div>