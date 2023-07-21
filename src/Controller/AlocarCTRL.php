<?php

    namespace Src\Controller;

    use Src\VO\AlocarVO;

    class AlocarCTRL
    {
        public function AlocarEquipamento(AlocarVO $vo)
        {
            if(empty($vo->getIdEquipamento()) || empty($vo->getIdSetor()))
            {
                return 0;
            }
            return 1;
        }
    }

?>