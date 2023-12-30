<?php

    namespace Src\Controller;

use Dompdf\Positioner\NullPositioner;
use Src\_Public\Util;
    use Src\VO\UsuarioVO;
    use Src\Model\UsuarioModel;
    use Src\VO\EnderecoVO;

    class UsuarioCTRL {
        private $model;

        public function __construct() {
            $this->model = new UsuarioModel();
        }

        public function VerificarEmailDuplicadoCTRL(string $email) : bool {
            return $this->model->VerificarEmailDuplicadoModel($email);
        }

        public function cadastrarUsuarioCTRL($vo, $voEnd, $voTec, $voFunc) {

            //Valida as propriedades comuns entre todos os tipos de usuário.
            if( 
                empty($vo->getNomeUsuario()) || 
                empty($vo->getEmailUsuario()) || 
                empty($vo->getTipoUsuario()) || 
                empty($vo->getCpfUsuario()) || 
                empty($vo->getTelUsuario()) ||
                empty($voEnd->getNomeCidade()) ||
                empty($voEnd->getSiglaEstado()) ||
                empty($voEnd->getBairro()) ||
                empty($voEnd->getRua()) ||
                empty($voEnd->getCep())
              ) {               
                return 0;
              }

            if($vo->getTipoUsuario() == USUARIO_TEC && empty($voTec->getNomeEmpresa())){
                return 0;
            }

            if($vo->getTipoUsuario() == USUARIO_FUNC && empty($voFunc->getIdSetor())){
                return 0;
            }

            //Set status usuário
            $vo->setStatusUsuario(SITUACAO_ATIVO);

            //Set Senha
            $vo->setSenhaUsuario(Util::CriptografarSenha($vo->getCpfUsuario()));

            return $this->model->cadastrarUsuarioModel($vo, $voEnd, $voTec, $voFunc);
            
        }


        public function FiltrarUsuarioCtrl($nome) {

            return $this->model->FiltrarUsuarioModel($nome);

        }


        public function AlterarStatusUsuarioCtrl(UsuarioVo $vo) {

            $vo->setStatusUsuario($vo->getStatusUsuario() == 1 ? 0 : 1);

            return $this->model->AlterarStatusUsuarioModel($vo);

        }


        public function DetalharUsuarioCtrl($id) {

            if ($id == '' || $id == 0) {
                return 0;
            }

            return $this->model->DetalharUsuarioModel($id);

        }


        public function alterarUsuarioCTRL($vo, $voEnd, $voTec, $voFunc) {

            //Valida as propriedades comuns entre todos os tipos de usuário.
            if( 
                empty($vo->getNomeUsuario()) || 
                empty($vo->getEmailUsuario()) ||  
                empty($vo->getCpfUsuario()) || 
                empty($vo->getTelUsuario()) ||
                empty($voEnd->getNomeCidade()) ||
                empty($voEnd->getSiglaEstado()) ||
                empty($voEnd->getBairro()) ||
                empty($voEnd->getRua()) ||
                empty($voEnd->getCep())
              ) {               
                return 0;
              }

            if($vo->getTipoUsuario() == USUARIO_TEC && empty($voTec->getNomeEmpresa())){
                return 0;
            }

            return $this->model->alterarUsuarioModel($vo, $voEnd, $voTec, $voFunc);
            
        }

        public function validarLoginCtrl(string $login, string $senha) : int
        {
            if (empty($login) || empty($senha))
                return 0;

            $usuario = $this->model->validarLoginModel($login, SITUACAO_ATIVO);

            if (empty($usuario))
                return 13;

            if (!Util::VerificarSenha($senha, $usuario['senha_usuario']))
                return 13;

            $this->model->gravarLogAcessoModel($usuario['id_usuario']);

            Util::criarSessao($usuario['id_usuario'], $usuario['nome_usuario']);

            Util::chamarPagina('../adm/gerenciar_novo_usuario');

        }

    }

?>