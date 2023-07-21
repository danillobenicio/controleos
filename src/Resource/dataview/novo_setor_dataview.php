<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

    use Src\VO\SetorVO;
    use Src\Controller\NovoSetorCTRL;

    if(isset($_POST['btnCadastrar']))
    {
        $vo = new SetorVO();
        $ctrl = new NovoSetorCTRL();

        $vo->setNomeSetor($_POST['setor']);

        $ret = $ctrl->CadastrarSetor($vo);

    }

?>