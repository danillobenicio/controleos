<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\VO\EquipamentoVO;
use Src\Controller\EquipamentoCTRL;
use Src\Controller\ModeloEquipamentoCTRL;
use Src\Controller\TipoEquipamentoCTRL;
use Src\_Public\Util;

if (isset($_POST['btnGravar']) && $_POST['btnGravar'] == 'cadastrar') {
    
    $vo = new EquipamentoVO();
    $ctrl = new EquipamentoCTRL();

    $vo->setFkTipo((int)$_POST['tipo']);
    $vo->setFkModelo((int)$_POST['modelo']);
    $vo->setIdentificacao($_POST['identificacao']);
    $vo->setDescricao($_POST['descricao']);

    $ret = $ctrl->CadastrarEquipamento($vo);

    if ($_POST['btnGravar'] == 'cadastrar') {
        echo $ret;
    }
} elseif (isset($_POST['carregar_tipos'])) {
    $tipos = (new TipoEquipamentoCTRL)->ConsultarTipoEquipamentoCTRL();
    $id_tipo = isset($_POST['id_tipo']) ? $_POST['id_tipo'] : '';
?>
<option value="" selected="selected">Selecione</option>
<?php foreach ($tipos as $item) { ?>
<option <?= $id_tipo == $item['id_tipo'] ? 'selected' : '' ?> value="<?= $item['id_tipo'] ?>"><?= $item['nome_tipo'] ?>
</option>
<?php } ?>
<?php
} elseif (isset($_POST['carregar_modelos'])) {
    $modelos = (new ModeloEquipamentoCTRL)->ConsultarModeloEquipamentoCTRL();
    $id_modelo = isset($_POST['id_modelo']) ? $_POST['id_modelo'] : '';
?>
<option value="" selected="selected">Selecione</option>
<?php foreach ($modelos as $modelo) { ?>
<option <?= $id_modelo == $modelo['id_modelo'] ? 'selected' : '' ?> value="<?= $modelo['id_modelo'] ?>">
    <?= $modelo['nome_modelo'] ?></option>
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
            <th>Situação</th>
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
            <td><?= $item['situacao'] ?></td>
            <td>
                <a href="equipamento.php?id_equipamento=<?= $item['id_equipamento'] ?>"
                    class="btn btn-warning btn-sm">Alterar</a>
                <button data-toggle="modal" data-target="#modal_excluir"
                    onclick="CarregarExcluir('<?= $item['id_equipamento'] ?>', '<?= $item['nome_tipo'] ?>')"
                    class="btn btn-danger btn-sm">Excluir</button>
                <?php if($item['esta_alocado'] == 0 && $item['situacao'] <> 'Inativo') { ?>
                <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal_inativar"
                    onclick="CarregarInativar('<?= $item['id_equipamento'] ?>')">Inativar</button>
                <?php  } ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php
} elseif (isset($_GET['id_equipamento'])) {
    $equipamento = (new EquipamentoCTRL)->DetalharEquipamentoCTRL($_GET['id_equipamento']);

    if(empty($equipamento))
        Util::ChamarPagina('gerenciar_consultar_equipamento');

}else if(isset($_POST['btnGravar']) && $_POST['btnGravar'] == 'alterar'){
   
        $vo = new EquipamentoVO();
        $ctrl = new EquipamentoCTRL();
    
        $vo->setIdEquipamento($_POST['id_equipamento']);
        $vo->setFkTipo((int)$_POST['tipo']);
        $vo->setFkModelo((int)$_POST['modelo']);
        $vo->setIdentificacao($_POST['identificacao']);
        $vo->setDescricao($_POST['descricao']);

        $ret = $ctrl->AlterarEquipamentoCTRL($vo);
    
        if ($_POST['btnGravar'] == 'alterar') {
            echo $ret;
        }
}else if(isset($_POST['btnExcluir'])){

    $vo = new EquipamentoVO();
    $ctrl = new EquipamentoCTRL();

    $vo->setIdEquipamento($_POST['id_equipamento']);

    $ret = $ctrl->ExcluirEquipamentoCTRL($vo);
    
    echo $ret;
}else if(isset($_POST['btnInativar'])){
    $vo = new EquipamentoVO;
    $ctrl = new EquipamentoCTRL;

    $vo->setIdEquipamento($_POST['id_inativar']);
    $vo->setDataDescarte($_POST['data_descarte']);
    $vo->setMotivoDescarte($_POST['motivo_descarte']);
    $vo->setSituacao(situacao_inativo);

    $ret = $ctrl->InativarEquipamentoCTRL($vo);

    echo $ret;

}