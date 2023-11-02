<?php

    namespace Src\Controller;

    use Src\VO\EquipamentoVO;
    use Src\_Public\Util;
    use Src\Model\EquipamentoModel;
    use Src\Config\fixos;
    use Src\VO\AlocarVO;

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
            return $this->model->FiltrarEquipamentoMODEL($idTipo, $idModelo, SITUACAO_EQUIPAMENTO_REMOVIDO);
        }


        public function DetalharEquipamentoCTRL(int $id) : array | string
        {
            return $this->model->DetalharEquipamentoMODEL($id);
        }


        public function ExcluirEquipamentoCTRL(EquipamentoVO $vo)
        {
            if(empty($vo->getIdEquipamento()))
                return 0;

            return $this->model->ExcluirEquipamentoMODEL($vo);
        }


        public function AlterarEquipamentoCTRL(EquipamentoVO $vo) : int
        {
            if(empty($vo->getIdEquipamento()) || empty($vo->getFkModelo()) || empty($vo->getFkTipo()) || empty($vo->getIdentificacao()))
                return 0;

            return $this->model->AlterarEquipamentoModel($vo);
        }

        public function InativarEquipamentoCTRL(EquipamentoVO $vo)
        {
            if(empty($vo->getIdEquipamento()) || empty($vo->getDataDescarte()) || empty($vo->getMotivoDescarte()))
                return 0;
            
            $vo->setSituacao(situacao_inativo);

            return $this->model->InativarEquipamentoModel($vo);
        }

        public function SelecionarEquipamentoNaoAlocadoCTRL()
        {            
            return $this->model->SelecionarEquipamentoNaoAlocadoModel(SITUACAO_EQUIPAMENTO_REMOVIDO, situacao_ativo);
        }

        public function AlocarEquipamentoCTRL(AlocarVO $vo)
        {
            if(empty($vo->getIdEquipamento()) || empty($vo->getIdSetor()))
                return 0;
                
            $vo->setSituacao(SITUACAO_EQUIPAMENTO_ALOCADO);

            return $this->model->AlocarEquipamentoModel($vo);
        }

        public function ConsultarEquipamentosAlocadosSetorCTRL($id_setor) {
            return $this->model->ConsultarEquipamentosAlocadosSetorModel($id_setor);
        }

        public function RemoverEquipamentoSetorCTRL(AlocarVo $vo) {
            
            $vo->setSituacao(SITUACAO_EQUIPAMENTO_REMOVIDO);
            return $this->model->RemoverEquipamentoSetorModel($vo);
        }

    }

?>