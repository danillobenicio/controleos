<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';
    use Src\VO\TipoVO;
    use Src\Controller\TipoEquipamentoCTRL;

    $ctrl = new TipoEquipamentoCTRL();
    $vo = new TipoVO();

    if(isset($_POST['btnCadastrar']))
    {
      
       //Setar as informações de acordo preenchimento dos campos
       $vo->setNomeTipo($_POST['tipo']);
       
       //Chama a função da Controller
       $ret = $ctrl->CadastrarTipoEquipamentoCTRL($vo);

    }
    else if(isset($_POST['btnAlterar']))
    {
        $vo->setNomeTipo($_POST['tipo_alterar']);
        $vo->setIdTipo($_POST['id_alterar']);

        $ret = $ctrl->AlterarTipoEquipamentoCTRL($vo);
    }
    else if(isset($_POST['btnExcluir']))
    {
        $vo->setIdTipo($_POST['id_excluir']);
        $ret = $ctrl->ExcluirTipoEquipamentoCTRL($vo);
    }

    $tipos_equipamento = $ctrl->ConsultarTipoEquipamentoCtrl();

?>