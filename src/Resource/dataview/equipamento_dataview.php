<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\VO\EquipamentoVO;
use Src\Controller\EquipamentoCTRL;
use Src\Controller\ModeloEquipamentoCTRL;
use Src\Controller\TipoEquipamentoCTRL;

//$ctrl_tipo = new TipoEquipamentoCTRL;
//$ctrl_modelo = new ModeloEquipamentoCTRL;
//$ctrl_equipamento = new EquipamentoCTRL;


if(isset($_POST['btnCadastrar']))
{
    $vo = new EquipamentoVO();
    $ctrl = new EquipamentoCTRL();

    $vo->setFkTipo((int)$_POST['tipo']);
    $vo->setFkModelo((int)$_POST['modelo']);
    $vo->setIdentificacao($_POST['identificacao']);
    $vo->setDescricao($_POST['descricao']);
    
    $ret = $ctrl->CadastrarEquipamento($vo);

    if($_POST['btnCadastrar'] == 'ajx'){
        echo $ret;
    }
    

}
elseif(isset($_POST['carregar_tipos']))
{
    $tipos = (new TipoEquipamentoCTRL)->ConsultarTipoEquipamentoCTRL();
    ?>
        <label>Tipo</label>
        <select class="form-control obg" style="width: 100%;" name="tipo" id="tipo">
            <option value="" selected="selected">Selecione</option>
            <?php foreach($tipos as $item) { ?>
                <option value="<?=$item['id_tipo']?>"><?=$item['nome_tipo']?></option>
            <?php } ?>
        </select>
    <?php
}
elseif(isset($_POST['carregar_modelos']))
{
    $modelos = (new ModeloEquipamentoCTRL)->ConsultarModeloEquipamentoCTRL();
    ?>
        <label>Modelo</label>
        <select class="form-control obg" style="width: 100%;" name="modelo" id="modelo">
            <option value="" selected="selected">Selecione</option>
            <?php foreach($modelos as $modelo) { ?> 
                <option value="<?=$modelo['id_modelo']?>"><?=$modelo['nome_modelo']?></option>             
            <?php } ?>
        </select>
    <?php
}




//$tipos = $ctrl_tipo->ConsultarTipoEquipamentoCTRL();
//$modelos = $ctrl_modelo->ConsultarModeloEquipamentoCTRL();
//$equipamentos = $ctrl_equipamento->ConsultarEquipamentoCTRL();

?>