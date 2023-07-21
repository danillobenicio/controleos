<?php

    namespace Src\VO;

    use Src\_Public\Util;

    class AlocarVO
    {
        private $id_alocar;
        private $equipamento_id;
        private $setor_id;

        //GET E SET ID
        public function setIdAlocar(int $p_id_alocar) : void
        {
            $this->id_alocar = $p_id_alocar;
        }
        
        public function getIdAlocar() : int
        {
            return $this->id_alocar;
        }


        //GET E SET ID EQUIPAMENTO
        public function setIdEquipamento(int $p_id_equipamento) : void 
        {
            $this->equipamento_id = $p_id_equipamento;
        }
        
        public function getIdEquipamento() : int
        {
            return $this->equipamento_id;
        }


        //GET E SET ID EQUIPAMENTO
        public function setIdSetor(int $p_id_setor) : void 
        {
            $this->setor_id = $p_id_setor;
        }
        
        public function getIdSetor() : int
        {
            return $this->setor_id;
        }

        
        public function getDataAlocar() : string
        {
            return Util::DataAtual();
        }

        public function getDataRemover() : string
        {
            return Util::DataAtual();
        }

        
        
    }

?>