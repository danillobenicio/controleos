<?php

    namespace Src\VO;

    use Src\_Public\Util;

    class UsuarioVO 
    {

        private $id_usuario;
        private $nome_usuario;
        private $tipo_usuario;
        private $email_usuario;
        private $cpf_usuario;
        private $senha_usuario;
        private $status_usuario;
        private $tel_usuario;

        // GET E SET ID
        public function setIdUsuario(int $p_id_usuario) : void 
        {
            $this->id_usuario = $p_id_usuario;
        }

        public function getIdUsuario() : int 
        {
            return $this->id_usuario;
        }


        //GET E SET TIPO
        public function setTipoUsuario(int $p_tipo_usuario) : void
        {

            $this->tipo_usuario = $p_tipo_usuario;
        }

        public function getTipoUsuario() : int 
        {
            return $this->tipo_usuario;
        }


        //GET E SET NOME
        public function setNomeUsuario(string $p_nome_usuario) : void
        {
            $this->nome_usuario = Util::TratarDados($p_nome_usuario);
        }

        public function getNomeUsuario() : string {
            return $this->nome_usuario;
        }


        //GET E SET EMAIL 
        public function setEmailUsuario(string $p_email_usuario) : void
        {
            $this->email_usuario = Util::RemoverTags($p_email_usuario);
        }

        public function getEmailUsuario() : string 
        {
            return $this->email_usuario;
        }


         //GET E SET CPF 
         public function setCpfUsuario(string $p_cpf_usuario) : void
         {
            $this->cpf_usuario = Util::TratarCaracteresEspeciais($p_cpf_usuario);
        }

        public function getCpfUsuario() : string 
        {
            return $this->cpf_usuario;
        }


        //GET E SET TELEFONE
        public function setTelUsuario(string $p_tel_usuario) : void
        {
            $this->tel_usuario = $p_tel_usuario;
        }

        public function getTelUsuario() : string
        {
            return $this->tel_usuario;
        }


        //GET E SET SENHA
        public function setSenhaUsuario(string $p_senha_usuario) : void
        {
            $this->senha_usuario = $p_senha_usuario;
        }

        public function getSenhaUsuario() : string
        {
            return $this->senha_usuario;
        }


        public function setStatusUsuario(int $p_status_usuario) : void
        {
            $this->status_usuario = $p_status_usuario;
        }

        public function getStatusUsuario() : int
        {
            return $this->status_usuario;
        }

    }

?>