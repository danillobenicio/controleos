<?php

    namespace Src\VO;
    
    use Src\_Public\Util;

    class SetorVO {

        private $id_setor;
        private $nome_setor;

        public function setIdSetor($id_setor) : void {
            $this->id_setor = $id_setor;
        }

        public function getIdSetor() : int {
            return $this->id_setor;
        }

        public function setNomeSetor($nome_setor) : void {
            $this->nome_setor = Util::TratarCaracteresEspeciais($nome_setor);
        }

        public function getNomeSetor() : int {
            return $this->nome_setor;
        }

    }

?>