<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

    use Src\VO\AlocarVO;
    use Src\Controller\AlocarCTRL;

    if(isset($_POST['btnCadastrar']))
    {
        $vo = new AlocarVO();
        $ctrl = new AlocarCTRL();

        $vo->setIdEquipamento((int)$_POST['equipamento']);
        $vo->setIdSetor((int)$_POST['setor']);

        $ret = $ctrl->AlocarEquipamento($vo);
        
    }


?>