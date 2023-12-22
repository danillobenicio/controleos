<?php

    namespace Src\VO;

    use Src\_Public\Util;

    class ModeloVO 
    {

        private $id_modelo;
        private $nome_modelo;

        public function setIdModelo(int $p_id_modelo) : void
        {
            $this->id_modelo = $p_id_modelo;
        }

        public function getIdModelo() : int 
        {
            return $this->id_modelo;
        }


        public function setNomeModelo(string $p_nome_modelo) : void 
        {
            $this->nome_modelo = Util::TratarCaracteresEspeciais($p_nome_modelo);
        }

        public function getNomeModelo() : string 
        {
            return $this->nome_modelo;
        }

    }
?>