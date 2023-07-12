<?php

    namespace Src\VO;

    use Src\_Public\Util;

    class ModeloVO {

        private $id_modelo;
        private $nome_modelo;

        public function setIdModelo($id_modelo) : void {
            $this->id_modelo = $id_modelo;
        }

        public function getIdModelo() : int {
            return $this->id_modelo;
        }

        public function setNomeModelo($nome_modelo) : void {
            $this->nome_modelo = $nome_modelo;
        }

        public function getNomeTipo() : string {
            return $this->nome_modelo;
        }

       

    }

?>