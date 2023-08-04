<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\VO\EquipamentoVO;
use Src\Controller\EquipamentoCTRL;

if(isset($_POST['btnCadastrar']))
{
    $vo = new EquipamentoVO();
    $ctrl = new EquipamentoCTRL();

    $vo->setIdentificacao($_POST['identificacao']);
    $vo->setFkTipo((int)$_POST['tipo']);
    $vo->setFkModelo((int)$_POST['modelo']);
    
    $ret = $ctrl->CadastrarEquipamento($vo);


}

?>