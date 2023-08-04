<?php

    namespace Src\Controller;
    use Src\VO\ModeloVO;
    use Src\Model\ModeloEquipamentoModel;

    class ModeloEquipamentoCTRL
    {
        public function CadastrarModelo(ModeloVO $vo) : int
        {
            if(empty($vo->getNomeModelo()))
            {
                return 0;
            }
            
            $model = new ModeloEquipamentoModel();

            $ret = $model->CadastrarModelo($vo);

            return $ret;
        }
    }

?>