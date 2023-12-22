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

        public function cadastrarEquipamentoCtrl(EquipamentoVO $vo) : int
        {
            if(empty($vo->getIdentificacao()) || empty($vo->getFkModelo()) || empty($vo->getFkTipo()))
                return 0;              

            $vo->setSituacao(SITUACAO_ATIVO);

            return $this->model->cadastrarEquipamentoModel($vo);
        }

        public function filtrarEquipamentoCtrl($idTipo, $idModelo) : ?array 
        {
            return $this->model->filtrarEquipamentoMODEL($idTipo, $idModelo, SITUACAO_EQUIPAMENTO_REMOVIDO);
        }


        public function detalharEquipamentoCtrl(int $id) : array | string
        {
            return $this->model->detalharEquipamentoMODEL($id);
        }


        public function excluirEquipamentoCtrl(EquipamentoVO $vo) : int
        {
            if(empty($vo->getIdEquipamento()))
                return 0;
            return $this->model->excluirEquipamentoMODEL($vo);
        }


        public function alterarEquipamentoCtrl(EquipamentoVO $vo) : int
        {
            if(empty($vo->getIdEquipamento()) || empty($vo->getFkModelo()) || empty($vo->getFkTipo()) || empty($vo->getIdentificacao()))
                return 0;

            return $this->model->alterarEquipamentoModel($vo);
        }

        public function inativarEquipamentoCtrl(EquipamentoVO $vo) : int
        {
            if(empty($vo->getIdEquipamento()) || empty($vo->getDataDescarte()) || empty($vo->getMotivoDescarte()))
                return 0;
            
            $vo->setSituacao(SITUACAO_INATIVO);

            return $this->model->inativarEquipamentoModel($vo);
        }

        public function selecionarEquipamentoNaoAlocadoCtrl() : array | string
        {            
            return $this->model->selecionarEquipamentoNaoAlocadoModel(SITUACAO_EQUIPAMENTO_REMOVIDO, SITUACAO_ATIVO);
        }

        public function alocarEquipamentoCtrl(AlocarVO $vo) : int
        {
            if(empty($vo->getIdEquipamento()) || empty($vo->getIdSetor()))
                return 0;
                
            $vo->setSituacao(SITUACAO_EQUIPAMENTO_ALOCADO);

            return $this->model->alocarEquipamentoModel($vo);
        }

        public function consultarEquipamentosAlocadosSetorCtrl($id_setor)  : array
        {
            return $this->model->consultarEquipamentosAlocadosSetorModel($id_setor);
        }

        public function removerEquipamentoSetorCtrl(AlocarVo $vo) : int
        {
            $vo->setSituacao(SITUACAO_EQUIPAMENTO_REMOVIDO);
            return $this->model->removerEquipamentoSetorModel($vo);
        }

    }

?>