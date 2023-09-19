<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\VO\EquipamentoVO;
use Src\Controller\EquipamentoCTRL;
use Src\Controller\ModeloEquipamentoCTRL;
use Src\Controller\TipoEquipamentoCTRL;
use Src\_Public\Util;

//$ctrl_tipo = new TipoEquipamentoCTRL;
//$ctrl_modelo = new ModeloEquipamentoCTRL;
//$ctrl_equipamento = new EquipamentoCTRL;


if (isset($_POST['btnCadastrar'])) {
    $vo = new EquipamentoVO();
    $ctrl = new EquipamentoCTRL();

    $vo->setFkTipo((int)$_POST['tipo']);
    $vo->setFkModelo((int)$_POST['modelo']);
    $vo->setIdentificacao($_POST['identificacao']);
    $vo->setDescricao($_POST['descricao']);

    $ret = $ctrl->CadastrarEquipamento($vo);

    if ($_POST['btnCadastrar'] == 'ajx') {
        echo $ret;
    }
} elseif (isset($_POST['carregar_tipos'])) {
    $tipos = (new TipoEquipamentoCTRL)->ConsultarTipoEquipamentoCTRL();
?>
    <option value="" selected="selected">Selecione</option>
    <?php foreach ($tipos as $item) { ?>
        <option value="<?= $item['id_tipo'] ?>"><?= $item['nome_tipo'] ?></option>
    <?php } ?>
<?php
} elseif (isset($_POST['carregar_modelos'])) {
    $modelos = (new ModeloEquipamentoCTRL)->ConsultarModeloEquipamentoCTRL();
?>
    <option value="" selected="selected">Selecione</option>
    <?php foreach ($modelos as $modelo) { ?>
        <option value="<?= $modelo['id_modelo'] ?>"><?= $modelo['nome_modelo'] ?></option>
    <?php } ?>
<?php
} elseif (isset($_POST['filtrarEquipamento'])) {

    $idTipo = $_POST['tipo'];
    $idModelo = $_POST['modelo'];

    $equipamentos = (new EquipamentoCTRL)->FiltrarEquipamentoCTRL($idTipo, $idModelo);
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Tipo</th>
                <th>Modelo</th>
                <th>Identificação</th>
                <th>Descrição</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipamentos as $item) { ?>
                <tr>
                    <td><?= $item['nome_tipo'] ?></td>
                    <td><?= $item['nome_modelo'] ?></td>
                    <td><?= $item['identificacao'] ?></td>
                    <td><?= $item['descricao'] ?></td>
                    <td>
                        <a href="equipamento.php?id_equipamento=<?= $item['id_equipamento'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                        <a href="#" class="btn btn-danger btn-xs">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
} elseif (isset($_GET['id_equipamento'])) {
    $equipamento = (new EquipamentoCTRL)->DetalharEquipamentoCTRL($_GET['id_equipamento']);

    if (empty($equipamento))
        Util::ChamarPagina('gerenciar_consultar_equipamento');
}




//$tipos = $ctrl_tipo->ConsultarTipoEquipamentoCTRL();
//$modelos = $ctrl_modelo->ConsultarModeloEquipamentoCTRL();
//$equipamentos = $ctrl_equipamento->ConsultarEquipamentoCTRL();

?>