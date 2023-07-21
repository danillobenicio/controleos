<?php 

namespace Src\VO;

class CidadeVO 
{

    private $id_cidade;
    private $nome_cidade;
    private $fk_id_estado;

    public function setIdCidade(int $p_id_cidade) : void
    {
        $this->id_cidade=$p_id_cidade;
    }

    public function getIdCidade() : int
    {
        return $this->id_cidade;
    }


    public function setNomeCidade(string $p_nome) : void 
    {
        $this->nome_cidade=$p_nome;
    }

    public function getNomeCidade() : string 
    {
        return $this->nome_cidade;
    }


    public function setFkEstado(int $p_estado) : void 
    {
        $this->fk_id_estado = $p_estado;
    }

    public function getFkEstado() : int 
    {
        return $this->fk_id_Estado;
    }


}

?>