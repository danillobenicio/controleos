<?php

namespace Src\Resource\api\Classes;

use Src\Controller\ChamadoCTRL;
use Src\Resource\api\Classes\ApiRequest;
use Src\Controller\UsuarioCTRL;
use Src\VO\TecnicoVO;
use Src\VO\UsuarioVO;
use Src\Controller\EquipamentoCTRL;
use Src\VO\ChamadoVO;
use Src\_Public\Util;

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
        if (Util::AuthenticationTokenAccess()) {
            return $this->ctrl_user->DetalharUsuarioCtrl($this->params['id_user']);
        } else {
            return NAO_AUTORIZADO;
        }
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

        if (Util::AuthenticationTokenAccess()) {
            return $this->ctrl_user->alterarUsuarioCTRL($vo, false);
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function alterarSenhaApi()
    {
        if (Util::AuthenticationTokenAccess()) {
            $vo = new UsuarioVO();

            $vo->setIdUsuario($this->params['id_usuario']);
            $vo->setSenhaUsuario($this->params['nova_senha']);

            return $this->ctrl_user->alterarSenhaCtrl($vo, false);
        } else {
            return NAO_AUTORIZADO;
        }
    }


    public function verificarSenhaApi()
    {
        if (Util::AuthenticationTokenAccess()) {
            return $this->ctrl_user->verificarSenhaCtrl($this->params['id_usuario'], $this->params['senha_digitada']);
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function filtrarChamadosApi()
    {
        if (Util::AuthenticationTokenAccess()) {
            return (new ChamadoCTRL)->filtrarChamadoCtrl(
                $this->params['situacao']
            );
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function detalharChamadoApi()
    {
        if (Util::AuthenticationTokenAccess()) {
            return (new ChamadoCTRL)->detalharChamadoCtrl(
                $this->params['id']
            );
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function validarLoginApi(): int | string
    {
        return $this->ctrl_user->validarLoginApiCtrl(
            $this->params['login_usuario'],
            $this->params['senha_usuario']
        );
    }

    public function atenderChamadoApi()
    {
        if (Util::AuthenticationTokenAccess()) {
            $vo = new ChamadoVO();
            $vo->setFkTecAtendimento($this->params['fkTecAtendimento']);
            $vo->setIdChamado($this->params['idChamado']);

            return (new ChamadoCTRL)->atenderChamadoCtrl($vo);
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function finalizarChamadoApi()
    {
       
       if (Util::AuthenticationTokenAccess()) {
            $vo = new ChamadoVO();
            $vo->setFkTecEncerramento($this->params['fkTecEncerramento']);
            $vo->setIdChamado($this->params['idChamado']);
            $vo->setLaudo($this->params['laudo']);
            $vo->setFkIdAlocar($this->params['idAlocar']);
            return (new ChamadoCTRL)->finalizarChamadoCtrl($vo);

        } else {
            return NAO_AUTORIZADO;
        }
    }
}
