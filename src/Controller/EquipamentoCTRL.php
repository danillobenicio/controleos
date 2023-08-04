<?php

    namespace Src\Controller;

    use Src\VO\EquipamentoVO;
    use Src\_Public\Util;
    use Src\Model\EquipamentoModel;

    class EquipamentoCTRL
    {

        public function CadastrarEquipamento(EquipamentoVO $vo) : int
        {
            if(empty($vo->getIdentificacao()) || empty($vo->getFkModelo()) || empty($vo->getFkTipo()))
            {
                return 0;
            }
            $model = new EquipamentoModel();

            $ret = $model->CadastrarEquipamentoModel($vo);
            return $ret;
            return 1;
        }

    }

?>