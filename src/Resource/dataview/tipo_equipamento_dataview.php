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

    $tipos_equipamento = $ctrl->ConsultarTipoEquipamentoCtrl();

?>