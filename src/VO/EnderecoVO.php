<?php 

namespace Src\VO;

class EnderecoVO 
{

    private $id_endereco;
    private $rua;
    private $bairro;
    private $cep;
    private $fk_id_usuario;
    private $fk_id_cidade;


    public function setIdEndereco(int $p_id_endereco) : void
    {
        $this->id_endereco=$p_id_endereco;
    }

    public function getIdEndereco() : int
    {
        return $this->id_endereco;
    }


    public function setRua(string $p_rua) : void 
    {
        $this->rua=$p_rua;
    }

    public function getRua() : string 
    {
        return $this->rua;
    }


    public function setBairro(string $p_bairro) : void 
    {
        $this->bairro=$p_bairro;
    }

    public function getBairro() : string 
    {
        return $this->bairro;
    }


    public function setCep(string $p_cep) : void 
    {
        $this->cep=$p_cep;
    }

    public function getCep() : string 
    {
        return $this->cep;
    }


    public function setFkUsuario(int $p_usuario) : void 
    {
        $this->fk_id_usuario=$p_usuario;
    }

    public function getFkUsuario() : int 
    {
        return $this->fk_id_usuario;
    }


    public function setFkCidade(int $p_cidade) : void 
    {
        $this->fk_id_cidade = $p_cidade;
    }

    public function getFkTipo() : int 
    {
        return $this->fk_id_tipo;
    }



}

?>