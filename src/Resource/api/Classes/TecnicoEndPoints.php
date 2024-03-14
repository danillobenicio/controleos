<?php

    namespace Src\Resource\api\Classes;

    use Src\Controller\ChamadoCTRL;
    use Src\Resource\api\Classes\ApiRequest;
    use Src\Controller\UsuarioCTRL;
    use Src\VO\TecnicoVO;
    use Src\VO\UsuarioVO;
    use Src\Controller\EquipamentoCTRL;
    use Src\VO\ChamadoVO;

    class TecnicoEndPoints extends ApiRequest
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

        public function alterarDadosApi()
        {
            $vo = new TecnicoVO(); 

            $vo->setNomeEmpresa($this->params['empresa']);
            $vo->setIdUsuario($this->params['id_user']);        
            $vo->setTipoUsuario($this->params['tipo_usuario']);
            $vo->setNomeUsuario($this->params['nome']);
            $vo->setEmailUsuario($this->params['email']);
            $vo->setCpfUsuario($this->params['cpf']);
            $vo->setTelUsuario($this->params['telefone']);       
            $vo->setRua($this->params['rua']);
            $vo->setBairro($this->params['bairro']);
            $vo->setCep($this->params['cep']);
            $vo->setNomeCidade($this->params['cidade']);
            $vo->setSiglaEstado($this->params['estado']);
            $vo->setIdEndereco($this->params['id_endereco']);

            return $this->ctrl_user->alterarUsuarioCTRL($vo, false);
        }

        public function alterarSenhaApi() 
        {
            $vo = new UsuarioVO();

            $vo->setIdUsuario($this->params['id_usuario']);
            $vo->setSenhaUsuario($this->params['nova_senha']);

            return $this->ctrl_user->alterarSenhaCtrl($vo, false);
        }


        public function verificarSenhaApi()
        {
            return $this->ctrl_user->verificarSenhaCtrl($this->params['id_usuario'], $this->params['senha_digitada']);
        }

        public function filtrarChamadosApi()
        {
            return (new ChamadoCTRL)->filtrarChamadoCtrl(
                $this->params['situacao']
            );
        }

        public function detalharChamadoApi()
        {
            return (new ChamadoCTRL)->detalharChamadoCtrl(
                $this->params['id']
            );
        }
    }
?>