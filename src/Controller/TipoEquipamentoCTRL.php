<?php

    namespace Src\Controller;
    
    use Src\VO\TipoVO;

    class TipoEquipamentoCTRL
    {
        public function CadastrarTipoEquipamentoCTRL(TipoVO $vo) : int
        {
            if(empty($vo->getNomeTipo()))
            {
                return 0;
            }
            return 1;
        }
    }

?>