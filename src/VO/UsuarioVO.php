<?php

    namespace Src\VO;

    use Src\_Public\Util;

    class UsuarioVO {

        private $id_usuario;
        private $nome_usuario;
        private $tipo_usuario;
        private $email_usuario;
        private $cpf_usuario;
        private $senha_usuario;
        private $status_usuario;
        private $tel_usuario;

        // GET E SET IDUSUARIO
        public function setIdUsuario($id_usuario){
            $this->id_usuario = $id_usuario;
        }

        public function getIdUsuario() : int {
            return $this->id_usuario;
        }

        //GET E SET TIPO
        public function setTipoUsuario($tipo_usuario) {
            $this->tipo_usuario = $tipo_usuario;
        }

        public function getTipoUsuario() : int {
            return $this->tipo_usuario;
        }

        //GET E SET NOME
        public function setNomeUsuario($nome_usuario){
            $this->nome_usuario = Util::TratarDados($nome_usuario);
        }

        public function getNomeUsuario() : string {
            return $this->nome_usuario;
        }

        //GET E SET EMAIL 
        public static function setEmailUsuario($email_usuario) : void{
            $this->email_usuario = Util::RemoverTags($email_usuario);
        }

        public function getEmailUsuario() : string {
            return $this->email_usuario;
        }



    }

?>