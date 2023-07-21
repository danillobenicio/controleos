<?php

    namespace Src\Controller;

    use Src\VO\SetorVO;

    class NovoSetorCTRL
    {

        public function CadastrarSetor(SetorVO $vo)
        {
            if(empty($vo->getNomeSetor()))
            {
                return 0;
            }
            return 1;
        }

    }

?>