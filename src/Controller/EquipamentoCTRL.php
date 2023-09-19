<?php

    namespace Src\Controller;

    use Src\VO\EquipamentoVO;
    use Src\_Public\Util;
    use Src\Model\EquipamentoModel;

    class EquipamentoCTRL
    {

        private $model;
        public function __construct()
        {
            $this->model = new EquipamentoModel();
        }

        public function CadastrarEquipamento(EquipamentoVO $vo) : int
        {
            if(empty($vo->getIdentificacao()) || empty($vo->getFkModelo()) || empty($vo->getFkTipo()))
            {
                return 0;              
            }

            $vo->setSituacao(situacao_ativo);

            $ret = $this->model->CadastrarEquipamentoModel($vo);
            
            return $ret;

        }

        public function FiltrarEquipamentoCTRL($idTipo, $idModelo) : ?array 
        {
            return $this->model->FiltrarEquipamentoMODEL($idTipo, $idModelo);
        }

        public function DetalharEquipamentoCTRL(int $id) : array
        {
            return $this->model->DetalharEquipamentoMODEL($id);
        }

        public function ExcluirEquipamentoCTRL(EquipamentoVO $vo)
        {
            if(!empty($vo->getIdEquipamento()))
                return 0;

            return $this->model->ExcluirEquipamentoMODEL($vo);
        }

    }

?>