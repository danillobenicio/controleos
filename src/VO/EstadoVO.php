<?php

    namespace Src\VO;

    use Src\_Public\Util;

    class EstadoVO {

        private $id_estado;
        private $nome_estado;
        private $sigla;

        public function setIdEstado($id_estado) : void {
            $this->id_estado = $id_estado;
        }

        public function getIdEstado() : int {
            return $this->id_estado;
        }

        public function setNomeEstado($nome_estado) : void {
            $this->nome_estado = $nome_estado;
        }

        public function getNomeEstado() : string {
            return $this->nome_estado;
        }

        public function setSiglaEstado($sigla) : void {
            $this->sigla = $sigla;
        }

        public function getSiglaEstado() : string {
            return $this->sigla;
        }

    }

?>