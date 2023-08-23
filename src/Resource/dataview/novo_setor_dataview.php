<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

    use Src\VO\SetorVO;
    use Src\Controller\SetorCTRL;

    $ctrl = new SetorCTRL();
    $vo = new SetorVO();

    if(isset($_POST['btnCadastrar']))
    {
               
        $vo->setNomeSetor($_POST['setor']);

        $ret = $ctrl->CadastrarSetor($vo);

        if ($_POST['btnCadastrar'] == 'ajx')
            echo $ret;
    }
    else if(isset($_POST['btnAlterar']))
    {
        $vo->setNomeSetor($_POST['setor_alterar']);
        $vo->setIdSetor($_POST['id_alterar']);

        $ret = $ctrl->AlterarSetorCTRL($vo);
    }
    else if (isset($_POST['btnExcluir']))
    {
        $vo->setIdSetor($_POST['id_excluir']);
        $ret = $ctrl->ExcluirSetorCTRL($vo);
    }

    $setores =  $ctrl->ConsultarSetorCTRL();



?>