<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';
    
    use Src\VO\UsuarioVO;
    use Src\VO\TecnicoVO;
    use Src\VO\FuncionarioVO;
    use Src\VO\EnderecoVO;
    use Src\Controller\UsuarioCTRL;

    $ctrl = new UsuarioCTRL();

    if (isset($_POST['VerificarEmailDuplicado'])) {

        echo $ctrl->VerificarEmailDuplicadoCTRL($_POST['email']);

    } else if (isset($_POST['btnCadastrarUsuario'])) {

        $vo = new UsuarioVO();
        $voEnd = new EnderecoVO();
        $voTec = null;
        $voFunc = null;

        switch ($_POST['tipoUsuario']) {

            case USUARIO_TEC:
                $voTec = new TecnicoVO();
                $voTec->setNomeEmpresa($_POST['empresaTec']);
                break;
            
            case USUARIO_FUNC:
                $voFunc = new FuncionarioVO();
                $voFunc->setIdSetor($_POST['setorFunc']);
                break;
        }
        
        //Dados em comum
        $vo->setTipoUsuario($_POST['tipoUsuario']);
        $vo->setNomeUsuario($_POST['nomeUsuario']);
        $vo->setEmailUsuario($_POST['emailUsuario']);
        $vo->setCpfUsuario($_POST['cpfUsuario']);
        $vo->setTelUsuario($_POST['telUsuario']);
        $voEnd->setRua($_POST['ruaUsuario']);
        $voEnd->setBairro($_POST['bairroUsuario']);
        $voEnd->setCep($_POST['cepUsuario']);
        $voEnd->setNomeCidade($_POST['cidadeUsuario']);
        $voEnd->setSiglaEstado($_POST['estadoUsuario']);

        $ret = $ctrl->CadastrarUsuarioCTRL($vo, $voEnd, $voTec, $voFunc);

        echo $ret;
    }

?>