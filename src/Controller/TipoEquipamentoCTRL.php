<?php

    namespace Src\Controller;
    
    use Src\VO\TipoVO;
    use Src\Model\TipoEquipamentoModel;

    class TipoEquipamentoCTRL
    {

        private $model;

        public function __construct()
        {
            $this->model = new TipoEquipamentoModel;
        }

        public function CadastrarTipoEquipamentoCTRL(TipoVO $vo) : int
        {
            if(empty($vo->getNomeTipo()))
            {
                return 0;
            }

            $ret = $this->model->CadastrarTipoEquipamentoModel($vo);          
            return $ret;
        }

        public function ConsultarTipoEquipamentoCTRL()
        {
            return $this->model->ConsultarTipoEquipamentoModel();
        }


        public function AlterarTipoEquipamentoCTRL(TipoVO $vo)
        {
            if(empty($vo->getNomeTipo()) || empty($vo->getIdTipo()))
                return 0;
            
            $ret = $this->model->AlterarTipoEquipamentoModel($vo);
            return $ret;

        }

        public function ExcluirTipoEquipamentoCTRL(TipoVO $vo)
        {
            if(empty($vo->getIdTipo()))
                return 0;
                
            return $this->model->ExcluirTipoEquipamentoModel($vo);
        }
    }

?>