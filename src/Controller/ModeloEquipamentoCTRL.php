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

        public function CadastrarModelo(ModeloVO $vo) : int
        {
            if(empty($vo->getNomeModelo()))
            {
                return 0;
            }
            
            $ret = $this->model->CadastrarModelo($vo);

            return $ret;
        }

        public function ConsultarModeloEquipamentoCTRL()
        {
            return $this->model->ConsultarModeloModel();
        }

        public function AlterarModeloEquipamentoCTRL(ModeloVO $vo)
        {
            if(empty($vo->getNomeModelo()) || empty($vo->getIdModelo()))
                return 0;

            $ret = $this->model->AlterarModeloModel($vo);
            return $ret;
        }
    }

?>