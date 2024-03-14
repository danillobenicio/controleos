<?php

    namespace Src\Controller;

use Dompdf\Positioner\NullPositioner;
use Src\_Public\Util;
    use Src\VO\UsuarioVO;
    use Src\Model\UsuarioModel;

    class UsuarioCTRL 
    {
        private $model;
        public function __construct() 
        {
            $this->model = new UsuarioModel();
        }

        public function verificarEmailDuplicadoCTRL(string $email) : bool 
        {
            return $this->model->verificarEmailDuplicadoModel($email);
        }

        public function cadastrarUsuarioCTRL($vo)
        {
            //Valida as propriedades comuns entre todos os tipos de usuário.
            if
            ( 
                empty($vo->getNomeUsuario()) || 
                empty($vo->getEmailUsuario()) || 
                empty($vo->getTipoUsuario()) || 
                empty($vo->getCpfUsuario()) || 
                empty($vo->getTelUsuario()) ||
                empty($vo->getNomeCidade()) ||
                empty($vo->getSiglaEstado()) ||
                empty($vo->getBairro()) ||
                empty($vo->getRua()) ||
                empty($vo->getCep())
              ) 
              {               
                return 0;
              }

            if($vo->getTipoUsuario() == USUARIO_TEC && empty($vo->getNomeEmpresa())){
                return 0;
            }

            if($vo->getTipoUsuario() == USUARIO_FUNC && empty($vo->getIdSetor())){
                return 0;
            }

            //Set status usuário
            $vo->setStatusUsuario(SITUACAO_ATIVO);

            //Set Senha
            $vo->setSenhaUsuario(Util::criptografarSenha($vo->getCpfUsuario()));

            return $this->model->cadastrarUsuarioModel($vo);
            
        }


        public function FiltrarUsuarioCtrl($nome) {

            return $this->model->FiltrarUsuarioModel($nome);

        }


        public function AlterarStatusUsuarioCtrl(UsuarioVo $vo) {

            $vo->setStatusUsuario($vo->getStatusUsuario() == 1 ? 0 : 1);

            return $this->model->AlterarStatusUsuarioModel($vo);

        }


        public function DetalharUsuarioCtrl($id) : array | int | bool
        {
            if ($id == '' || $id == 0) {
                return 0;
            }

            return $this->model->DetalharUsuarioModel($id);
        }


        public function alterarUsuarioCTRL($vo, bool $tem_sessao = true) {
            
            //Valida as propriedades comuns entre todos os tipos de usuário.
            if( 
                empty($vo->getNomeUsuario()) || 
                empty($vo->getEmailUsuario()) ||  
                empty($vo->getCpfUsuario()) || 
                empty($vo->getTelUsuario()) ||
                empty($vo->getNomeCidade()) ||
                empty($vo->getSiglaEstado()) ||
                empty($vo->getBairro()) ||
                empty($vo->getRua()) ||
                empty($vo->getCep())
              ) {               
                return 0;
              }

            if($vo->getTipoUsuario() == USUARIO_TEC && empty($vo->getNomeEmpresa())){
                return 0;
            }

            return $this->model->alterarUsuarioModel($vo);           
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

        public function validarLoginApiCtrl($login, $senha) : string | int 
        {
            if (empty($login) || empty($senha)) {
                return 0;
            }

            $usuario = $this->model->validarLoginModel($login, SITUACAO_ATIVO);

            if (empty($usuario))
                return -7;

            if (!Util::verificarSenha($senha, $usuario['senha_usuario']))
                return -7;

            $this->model->gravarLogAcessoModel($usuario['id_usuario']);

            $dados_usuario = [
                'cod_user' => $usuario['id_usuario'],
                'nome_user' => $usuario['nome_usuario'],
                'cod_setor' => $usuario['fk_id_setor']
            ];

            $token = Util::CreateTokenAuthentication($dados_usuario);

            return $token;
        }

        public function alterarSenhaCtrl(UsuarioVO $vo, bool $tem_sessao = true) : int
        {
            if (empty($vo->getIdUsuario()) || empty($vo->getSenhaUsuario()))
                return 0;

            $vo->setSenhaUsuario(Util::CriptografarSenha($vo->getSenhaUsuario()));
            
            return $this->model->alterarSenhaModel($vo);
        }

        public function verificarSenhaCtrl(int $id, string $senha_digitada)
        {
            $dados = $this->model->verificarSenhaModel($id);

            if (empty($dados)) {
                return 13;
            } else {
                $senha_hash = $dados['senha_usuario'];
                $ret = Util::verificarSenha($senha_digitada, $senha_hash);
                return $ret ? 1 : 13;
            }
        }
    }

?>