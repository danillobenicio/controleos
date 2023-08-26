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

            $ret = $this->model->CadastrarEquipamentoModel($vo);
            
            return $ret;

        }

        public function ConsultarEquipamentoCTRL()
        {
            return $this->model->ConsultarEquipamentoModel();


        }

    }

?>