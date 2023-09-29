<?php

    namespace Src\VO;

    use Src\_Public\Util;

    class TipoVO
    {

        private $id_tipo;
        private $nome_tipo;

        public function setIdTipo(int $p_id_tipo) : void 
        {
            $this->id_tipo = $p_id_tipo;
        }

        public function getIdTipo() : int 
        {
            return $this->id_tipo;
        }

        
        public function setNomeTipo(string $p_nome_tipo) : void 
        {
            $this->nome_tipo = Util::TratarDados($p_nome_tipo);
        }

        public function getNomeTipo() : string 
        {
            return $this->nome_tipo;
        }

    }
?>