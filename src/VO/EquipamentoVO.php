<?php 

    namespace Src\VO;

    use Src\_Public\Util;
    use datetime;

    class EquipamentoVO 
    {

        private $id_equipamento;
        private $identificacao;
        private $descricao;
        private $situacao;
        private $motivo_descarte;
        private $fk_id_modelo;
        private $fk_id_tipo;
        private $dt_descarte;

        public function setIdEquipamento(int $p_id_equipamento) : void
        {
            $this->id_equipamento=$p_id_equipamento;
        }

        public function getIdEquipamento() : int
        {
            return $this->id_equipamento;
        }


        public function setIdentificacao(string $p_identificacao) : void 
        {
            $this->identificacao = Util::RemoverTags($p_identificacao);
        }

        public function getIdentificacao() : string 
        {
            return $this->identificacao;
        }


        public function setDescricao(string $p_descricao) : void 
        {
            $this->descricao = Util::TratarCaracteresEspeciais($p_descricao);
        }

        public function getDescricao() : string 
        {
            return $this->descricao;
        }


        public function setSituacao(int $p_situacao) : void 
        {
            $this->situacao = $p_situacao;
        }

        public function getSituacao() : int 
        {
            return $this->situacao;
        }

        public function setDataDescarte($p_dt_descarte) : void
        {
            $this->dt_descarte = $p_dt_descarte;
        }

        public function getDataDescarte()
        {
            return $this->dt_descarte;
        }

        public function setMotivoDescarte(string $p_motivo_descarte) : void 
        {
            $this->motivo_descarte = Util::RemoverTags($p_motivo_descarte);
        }

        public function getMotivoDescarte() : string 
        {
            return $this->motivo_descarte;
        }


        public function setFkModelo(int $p_modelo) : void 
        {
            $this->fk_id_modelo = $p_modelo;
        }

        public function getFkModelo() : int 
        {
            return $this->fk_id_modelo;
        }


        public function setFkTipo(int $p_tipo) : void 
        {
            $this->fk_id_tipo = $p_tipo;
        }

        public function getFkTipo() : int 
        {
            return $this->fk_id_tipo;
        }



    }

?>