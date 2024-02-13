<?php

    namespace Src\Resource\api\Classes;

use Src\Controller\EquipamentoCTRL;
use Src\Controller\UsuarioCTRL;
    use Src\Resource\api\Classes\ApiRequest;
    use Src\VO\FuncionarioVO;
    use Src\VO\EnderecoVO;
    use Src\VO\UsuarioVO;

    class FuncionarioEndPoints extends ApiRequest
    {
        private $ctrl_user;
        private $params;

        public function __construct()
        {
            $this->ctrl_user = new UsuarioCTRL();
        }

        public function addParameters($p)
        {
            $this->params = $p;
        }

        public function checkEndPoint($endpoint)
        {
            return method_exists($this, $endpoint);
        }

        public function detalharUsuarioApi()
        {
            return $this->ctrl_user->DetalharUsuarioCtrl($this->params['id_user']);
        }

        public function alterarMeusDadosApi()
        {
            $vo = new FuncionarioVO();
            $voEnd = new EnderecoVO();
            $voTec = null;
            $voFunc = null;
        
            //Dados em comum
            $vo->setIdUsuario($this->params['idUsuario']);
            $vo->setTipoUsuario($this->params['tipoUsuario']);
            $vo->setNomeUsuario($this->params['nomeUsuario']);
            $vo->setEmailUsuario($this->params['emailUsuario']);
            $vo->setCpfUsuario($this->params['cpfUsuario']);
            $vo->setTelUsuario($this->params['telUsuario']);
            $voEnd->setRua($this->params['ruaUsuario']);
            $voEnd->setBairro($this->params['bairroUsuario']);
            $voEnd->setCep($this->params['cepUsuario']);
            $voEnd->setNomeCidade($this->params['cidadeUsuario']);
            $voEnd->setSiglaEstado($this->params['estadoUsuario']);
            $voEnd->setIdEndereco($this->params['idEndereco']);

            return $this->ctrl_user->alterarUsuarioCTRL($vo, $voEnd, $voTec, $voFunc, false);
        }

        public function alterarSenhaApi() 
        {
            $vo = new UsuarioVO();

            $vo->setIdUsuario($this->params['id_usuario']);
            $vo->setSenhaUsuario($this->params['senha_usuario']);

            return $this->ctrl_user->alterarSenhaCtrl($vo, false);
        }


        public function consultarEquipamentosAlocadosSetorApi($id_setor) {
            return (new EquipamentoCTRL)->consultarEquipamentosAlocadosSetorCtrl($id_setor);
        }
    }
?>