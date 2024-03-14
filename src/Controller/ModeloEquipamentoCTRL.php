<?php

    namespace Src\Controller;
    use Src\VO\ModeloVO;
    use Src\Model\ModeloEquipamentoModel;

    class ModeloEquipamentoCTRL
    {
        private $model;

        public function __construct()
        {
            $this->model = new ModeloEquipamentoModel();
        }

        public function cadastrarModeloCtrl(ModeloVO $vo) : int
        {
            if(empty($vo->getNomeModelo()))
                return 0;
          
            return $this->model->cadastrarModeloModel($vo);
        }

        public function consultarModeloEquipamentoCtrl() : array
        {
            return $this->model->consultarModeloModel();
        }

        public function alterarModeloEquipamentoCtrl(ModeloVO $vo) : int
        {
            if(empty($vo->getNomeModelo()) || empty($vo->getIdModelo()))
                return 0;

            return $this->model->AlterarModeloModel($vo);
        }

        public function excluirModeloEquipamentoCtrl(ModeloVO $vo) : int
        {
            if(empty($vo->getIdModelo()))
                return 0;
            return $this->model->excluirModeloEquipamentoModel($vo);
        }
    }
?>