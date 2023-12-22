<?php

    namespace Src\Controller;

    use Src\VO\SetorVO;
    use Src\Model\SetorModel;

    class SetorCTRL
    {
        private $model;

        public function __construct()
        {
            $this->model = new SetorModel();
        }

        public function cadastrarSetorCtrl(SetorVO $vo) : int
        {
            if(empty($vo->getNomeSetor()))
                return 0;

            return $this->model->cadastrarSetorModel($vo);
           
        }

        public function consultarSetorCtrl() : array
        {
            return $this->model->consultarSetorModel();
        }

        public function alterarSetorCtrl(SetorVO $vo) : int
        {
            if(empty($vo->getNomeSetor()) || empty($vo->getIdSetor()))
                return 0;

            return $this->model->alterarSetorModel($vo);
           
        }

        public function excluirSetorCtrl(SetorVO $vo)
        {
            if(empty($vo->getIdSetor()))
                return 0;
            
            return $this->model->excluirSetorModel($vo);
        }
    }

?>