<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\VO\EquipamentoVO;
use Src\Controller\EquipamentoCTRL;
use Src\Controller\ModeloEquipamentoCTRL;
use Src\Controller\TipoEquipamentoCTRL;
use Src\_Public\Util;
use Src\VO\AlocarVO;

if (isset($_POST['btnGravar']) && $_POST['btnGravar'] == 'cadastrar') {
    
    $vo = new EquipamentoVO();
    $ctrl = new EquipamentoCTRL();

    $vo->setFkTipo((int)$_POST['tipo']);
    $vo->setFkModelo((int)$_POST['modelo']);
    $vo->setIdentificacao($_POST['identificacao']);
    $vo->setDescricao($_POST['descricao']);

    $ret = $ctrl->cadastrarEquipamentoCtrl($vo);

    if ($_POST['btnGravar'] == 'cadastrar')
        echo $ret;

} elseif (isset($_POST['carregar_tipos'])) {
    $tipos = (new TipoEquipamentoCTRL)->consultarTipoEquipamentoCtrl();
    $id_tipo = isset($_POST['id_tipo']) ? $_POST['id_tipo'] : '';
?>
<option value="" selected="selected">Selecione</option>
<?php foreach ($tipos as $item) { ?>
<option <?= $id_tipo == $item['id_tipo'] ? 'selected' : '' ?> value="<?= $item['id_tipo'] ?>"><?= $item['nome_tipo'] ?>
</option>
<?php } ?>
<?php
} elseif (isset($_POST['carregar_modelos'])) {
    $modelos = (new ModeloEquipamentoCTRL)->consultarModeloEquipamentoCtrl();
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

    $equipamentos = (new EquipamentoCTRL)->filtrarEquipamentoCtrl($idTipo, $idModelo);
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
            <td><?= Util::TratarExibicao($item['descricao']) ?></td>
            <td><?= $item['situacao'] ?></td>
            <td>
                <a href="equipamento.php?id_equipamento=<?= $item['id_equipamento'] ?>"
                    class="btn btn-warning btn-sm">Alterar</a>


                <?php if($item['esta_alocado'] == 0 && $item['situacao'] <> 'Inativo') { ?>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_inativar"
                    onclick="carregarInativar('<?= $item['id_equipamento'] ?>')">Inativar</button>
                <?php  } else if ($item['situacao'] == 'Inativo'){ ?>
                    <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal_inativar_info"
                    onclick="carregarInativarInfo('<?= $item['data_descarte']?>', '<?=$item['motivo_descarte']?>')">Ver Dados</button>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php
} elseif (isset($_GET['id_equipamento'])) {
    $equipamento = (new EquipamentoCTRL)->detalharEquipamentoCtrl($_GET['id_equipamento']);

    if(empty($equipamento))
        Util::chamarPagina('gerenciar_consultar_equipamento');

}else if(isset($_POST['btnGravar']) && $_POST['btnGravar'] == 'alterar'){
   
        $vo = new EquipamentoVO();
        $ctrl = new EquipamentoCTRL();
    
        $vo->setIdEquipamento($_POST['id_equipamento']);
        $vo->setFkTipo((int)$_POST['tipo']);
        $vo->setFkModelo((int)$_POST['modelo']);
        $vo->setIdentificacao($_POST['identificacao']);
        $vo->setDescricao($_POST['descricao']);

        $ret = $ctrl->alterarEquipamentoCtrl($vo);
    
        if ($_POST['btnGravar'] == 'alterar')
            echo $ret;
        
}else if(isset($_POST['btnExcluir']) && $_POST['btnExcluir'] == 'excluir'){

    $vo = new EquipamentoVO();
    $ctrl = new EquipamentoCTRL();

    $vo->setIdEquipamento($_POST['id_equipamento']);

    $ret = $ctrl->excluirEquipamentoCtrl($vo);
    
    echo $ret;
}else if(isset($_POST['btnInativar'])){
    $vo = new EquipamentoVO;
    $ctrl = new EquipamentoCTRL;

    $vo->setIdEquipamento($_POST['id_inativar']);
    $vo->setDataDescarte($_POST['data_descarte']);
    $vo->setMotivoDescarte($_POST['motivo_descarte']);
    
    $ret = $ctrl->inativarEquipamentoCtrl($vo);

    echo $ret;

} else if (isset($_POST['carregar_equipamentos_nao_alocados'])) {
    $equipamentos = (new EquipamentoCTRL)->selecionarEquipamentoNaoAlocadoCtrl();
    ?>
<select class="form-control obg" style="width: 100%;">
    <option value="">Selecione</option>
    <?php foreach($equipamentos as $equipamento) { ?>
    <option value="<?=$equipamento['id_equipamento']?>">
        <?=$equipamento['identificacao'] . ' | ' . $equipamento['nome_tipo'] . ' | ' . $equipamento['nome_modelo']?>
    </option>
    <?php } ?>
</select>
<?php
} else if(isset($_POST['alocar_equipamento'])) {

    $vo = new AlocarVO;
    $ctrl = new EquipamentoCTRL;

    $vo->setIdEquipamento($_POST['id_equipamento']);
    $vo->setIdSetor($_POST['id_setor']);

    $ret = $ctrl->alocarEquipamentoCtrl($vo);

    echo $ret;

} else if (isset($_POST['filtrar_equipamentos_alocados_setor'])) {

    $ctrl = new EquipamentoCTRL;

    $equipamentos = $ctrl->consultarEquipamentosAlocadosSetorCtrl($_POST['idSetor']);
    ?>
        <thead>
            <tr>
                <th>Equipamento</th>
                <th>Alocado Em</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($equipamentos as $equipamento) { ?>
            <tr>
                <td><?=$equipamento['identificacao'] . ' | ' .$equipamento['tipo'] . ' | ' . $equipamento['nome_modelo']?></td>
                <td><?=$equipamento['data_alocacao']?></td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#modal_excluir" onclick="carregarExcluir('<?=$equipamento['id_alocar']?>')" class="btn btn-danger btn-sm">Remover</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    <?php
    

}else if(isset($_POST['btnExcluir']) && $_POST['btnExcluir'] == 'remover'){
    $vo = new AlocarVO();
    $ctrl = new EquipamentoCTRL();
    $vo->setIdAlocar($_POST['id_equipamento']); //id alocar
    $ret = $ctrl->removerEquipamentoSetorCtrl($vo);
    echo $ret;
}