<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

    use Src\VO\ModeloVO;
    use Src\Controller\ModeloEquipamentoCTRL;

    if(isset($_POST['btnCadastrar']))
    {
        $vo = new ModeloVO();
        $ctrl = new ModeloEquipamentoCTRL();

        $vo->setNomeModelo($_POST['modelo']);

        $ret = $ctrl->CadastrarModelo($vo);

    }

?>