<?php 

namespace Src\VO;

use Src\_Public\Util;

class ChamadoVO 
{

    private $id_chamado;
    private $problema;
    private $laudo;
    private $fk_id_usuario;
    private $fk_id_equipamento;
    private $fk_id_tecnico_encerramento;
    private $fk_id_tecnico_atendimento;

    public function setIdChamado(int $p_id_chamado) : void
    {
        $this->id_chamado=$p_id_chamado;
    }

    public function getIdChamado() : int
    {
        return $this->id_chamado;
    }


    public function getDataAbertura() : datetime
    {
        return Util::DataAtual();
    }


    public function getHoraAbertura() : datetime
    {
        return Util::HoraAtual();
    }


    public function getDataEncerramento() : datetime
    {
        return Util::DataAtual();
    }


    public function setProblema(string $p_problema) : void 
    {
        $this->problema = $p_problema;
    }

    public function getProblema() : string 
    {
        return $this->problema;
    }


    public function getDataAtendimento() : datetime
    {
        return Util::DataAtual();
    }


    public function getHoraAtendimento() : datetime
    {
        return Util::HoraAtual();
    }



    public function getHoraEncerramento() : datetime
    {
        return Util::HoraAtual();
    }


    public function setLaudo(string $p_laudo) : void 
    {
        $this->laudo = $p_laudo;
    }

    public function getLaudo() : string 
    {
        return $this->laudo;
    }


    public function setFkUsuario(int $p_usuario) : void 
    {
        $this->fk_id_usuario = $p_usuario;
    }

    public function getFkUsuario() : int 
    {
        return $this->fk_id_usuario;
    }


    public function setFkEquipamento(int $p_equipamento) : void 
    {
        $this->fk_id_equipamento = $p_equipamento;
    }

    public function getFkEquipamento() : int 
    {
        return $this->fk_id_equipamento;
    }


    public function setFkTecEncerramento(int $p_tec_encerramento) : void 
    {
        $this->fk_id_tecnico_encerramento = $p_tec_encerramento;
    }

    public function getFkTecEncerramento() : int 
    {
        return $this->fk_id_tecnico_encerramento;
    }


    public function setFkTecAtendimento(int $p_tec_atendimento) : void 
    {
        $this->fk_id_tecnico_atendimento = $p_tec_atendimento;
    }

    public function getFkTecAtendimento() : int 
    {
        return $this->fk_id_tecnico_atendimento;
    }



}

?>