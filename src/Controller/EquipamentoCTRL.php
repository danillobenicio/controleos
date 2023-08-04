<?php

    namespace Src\Controller;

    use Src\VO\EquipamentoVO;
    use Src\_Public\Util;

    class EquipamentoCTRL
    {

        public function CadastrarEquipamento(EquipamentoVO $vo) : int
        {
            if(empty($vo->getIdentificacao()) || empty($vo->getFkModelo()) || empty($vo->getFkTipo()))
            {
                return 0;
            }
            return 1;
        }

    }

?>