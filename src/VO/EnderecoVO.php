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
    private $id_cidade;
    private $nome_cidade;
    private $fk_id_estado;
    private $id_estado;
    private $nome_estado;
    private $sigla;

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

    public function getFkCidade() : int 
    {
        return $this->fk_id_cidade;
    }

    public function setIdCidade(int $p_id_cidade) : void
    {
        $this->id_cidade = $p_id_cidade;
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
        return $this->fk_id_estado;
    }

    public function setIdEstado($id_estado) : void {
        $this->id_estado = $id_estado;
    }

    public function getIdEstado() : int {
        return $this->id_estado;
    }

    public function setNomeEstado($nome_estado) : void {
        $this->nome_estado = $nome_estado;
    }

    public function getNomeEstado() : string {
        return $this->nome_estado;
    }

    public function setSiglaEstado($sigla) : void {
        $this->sigla = $sigla;
    }

    public function getSiglaEstado() : string {
        return $this->sigla;
    }
}
?>