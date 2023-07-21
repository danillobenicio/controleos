<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';
    use Src\VO\TipoVO;
    use Src\Controller\TipoEquipamentoCTRL;

    if(isset($_POST['btnCadastrar']))
    {
       //Criar o meu VO
       $vo = new TipoVO();

       //Setar as informações de acordo preenchimento dos campos
       $vo->setNomeTipo($_POST['tipo']);
       //Passa a bola para frente, ou seja, cria o obj da controller desta página
       $ctrl = new TipoEquipamentoCTRL();

       //Chama a função da Controller
       $ret = $ctrl->CadastrarTipoEquipamentoCTRL($vo);

    }

?>