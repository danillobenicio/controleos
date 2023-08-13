<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\VO\EquipamentoVO;
use Src\Controller\EquipamentoCTRL;
use Src\Controller\ModeloEquipamentoCTRL;
use Src\Controller\TipoEquipamentoCTRL;

$ctrl_tipo = new TipoEquipamentoCTRL;
$ctrl_modelo = new ModeloEquipamentoCTRL;
$ctrl_equipamento = new EquipamentoCTRL;


if(isset($_POST['btnCadastrar']))
{
    $vo = new EquipamentoVO();
    $ctrl = new EquipamentoCTRL();

    $vo->setIdentificacao($_POST['identificacao']);
    $vo->setDescricao($_POST['descricao']);
    $vo->setFkTipo((int)$_POST['tipo']);
    $vo->setFkModelo((int)$_POST['modelo']);
    
    $ret = $ctrl->CadastrarEquipamento($vo);

}

$tipos = $ctrl_tipo->ConsultarTipoEquipamentoCTRL();
$modelos = $ctrl_modelo->ConsultarModeloEquipamentoCTRL();
$equipamentos = $ctrl_equipamento->ConsultarEquipamentoCTRL();

?>