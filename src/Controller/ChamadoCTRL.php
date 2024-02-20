<?php

    namespace Src\Controller;

use Dompdf\Positioner\NullPositioner;
use Src\VO\ChamadoVO;
    use Src\_Public\Util;
    use Src\Model\ChamadosModel;
    use Src\Config\fixos;

    class ChamadoCTRL
    {

        private $model;
        public function __construct()
        {
            $this->model = new ChamadosModel();
        }


        public function filtrarChamadoCtrl(int $situacao, int $id_setor) : array | null
        {
            return $this->model->filtrarChamadoModel($situacao, $id_setor);
        }

        public function abrirChamadoCtrl(ChamadoVO $vo, $tem_sessao = true) : int
        {
            if(empty($vo->getDataAbertura()) || empty($vo->getHoraAbertura()) || empty($vo->getFkUsuario()) || empty($vo->getProblema()) || empty($vo->getFkIdAlocar()))
                return 0;              

            $vo->setFkUsuario(9);

            return $this->model->abrirChamadoModel($vo);
        }

    }

?>