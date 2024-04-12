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

    public function filtrarChamadoCtrl($situacao, $id_setor = -1)
    {
        return $this->model->filtrarChamadoModel($situacao, $id_setor);
    }

    public function detalharChamadoCtrl($id)
    {
        return $this->model->detalharChamadoModel($id);
    }

    public function abrirChamadoCtrl(ChamadoVO $vo)
    {
        if (empty($vo->getProblema()) || empty($vo->getFkIdAlocar()))
            return 0;

        return $this->model->abrirChamadoModel($vo);
    }

    public function numerosChamadoAtualCtrl()
    {
        return $this->model->numerosChamadoAtualModel();
    }

    public function atenderChamadoCtrl(ChamadoVO $vo)
    {
        if (empty($vo->getFkTecAtendimento()) || empty($vo->getIdChamado()))
            return 0;
        
        return $this->model->atenderChamadoModel($vo);
    }

    public function finalizarChamadoCtrl(ChamadoVO $vo)
    {
        if (empty($vo->getFkTecEncerramento()) || empty($vo->getIdChamado()) || empty($vo->getLaudo()))
            return 0;
        $situacao = SITUACAO_CHAMADO_ENCERRADO;
        return $this->model->finalizarChamadoModel($vo, $situacao);
    }
}
