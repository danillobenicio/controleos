<?php

    namespace Src\VO;

    use Src\_Public\Util;

    class TipoVO {

        private $id_tipo;
        private $nome_tipo;

        public function setIdTipo($id_tipo) : void {
            $this->id_tipo = $id_tipo;
        }

        public function getIdTipo() : int {
            return $this->id_tipo;
        }

        public function setNomeTipo($nome_tipo) : void {
            $this->nome_tipo = $nome_tipo;
        }

        public function getNomeTipo() : int {
            return $this->nome_tipo;
        }

       

    }

?>