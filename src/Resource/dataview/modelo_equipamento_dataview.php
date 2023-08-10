<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

    use Src\VO\ModeloVO;
    use Src\Controller\ModeloEquipamentoCTRL;

    $vo = new ModeloVO();
    $ctrl = new ModeloEquipamentoCTRL();

    if(isset($_POST['btnCadastrar']))
    {         
        $vo->setNomeModelo($_POST['modelo']);
        $ret = $ctrl->CadastrarModelo($vo);
    }

    $modelos = $ctrl->ConsultarModeloEquipamentoCTRL();

?>