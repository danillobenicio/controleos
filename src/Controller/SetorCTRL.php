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

        public function CadastrarSetor(SetorVO $vo)
        {
            if(empty($vo->getNomeSetor()))
            {
                return 0;
            }

            $ret = $this->model->CadastrarSetorModel($vo);
            return $ret;
            
        }

        public function ConsultarSetorCTRL()
        {
            return $this->model->ConsultarSetorModel();
        }

        public function AlterarSetorCTRL(SetorVO $vo)
        {
            if(empty($vo->getNomeSetor()) || empty($vo->getIdSetor()))
                return 0;

            $ret = $this->model->AlterarSetorModel($vo);
            return $ret;
            
        }

    }

?>