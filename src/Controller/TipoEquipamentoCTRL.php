<?php

    namespace Src\Controller;
    
    use Src\VO\TipoVO;
    use Src\Model\TipoEquipamentoModel;

    class TipoEquipamentoCTRL
    {
        public function CadastrarTipoEquipamentoCTRL(TipoVO $vo) : int
        {
            if(empty($vo->getNomeTipo()))
            {
                return 0;
            }

            $model = new TipoEquipamentoModel();
            $ret = $model->CadastrarTipoEquipamentoModel($vo);
            
            return $ret;
        }
    }

?>