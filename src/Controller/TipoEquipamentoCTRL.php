<?php

    namespace Src\Controller;
    
    use Src\VO\TipoVO;
    use Src\Model\TipoEquipamentoModel;

    class TipoEquipamentoCTRL {

        private $model;

        public function __construct() {
            $this->model = new TipoEquipamentoModel;
        }

        public function cadastrarTipoEquipamentoCTRL(TipoVO $vo) : int {          
            if (empty($vo->getNomeTipo()))
                return 0;
            return $this->model->cadastrarTipoEquipamentoModel($vo);          
        }

        public function consultarTipoEquipamentoCtrl() : array {
            return $this->model->consultarTipoEquipamentoModel();
        }

        public function alterarTipoEquipamentoCTRL(TipoVO $vo) : int {
            if(empty($vo->getNomeTipo()) || empty($vo->getIdTipo()))
                return 0;            
            return $this->model->alterarTipoEquipamentoModel($vo);
        }

        public function excluirTipoEquipamentoCTRL(TipoVO $vo) : int {
            if(empty($vo->getIdTipo()))
                return 0;              
            return $this->model->excluirTipoEquipamentoModel($vo);
        }
    }

?>