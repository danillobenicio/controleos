<<<<<<< HEAD
<?php

    namespace Src\VO;
    
    use Src\_Public\Util;

    class SetorVO {

        private $id_setor;
        private $nome_setor;

        public function setIdSetor(int $p_id_setor) : void 
        {
            $this->id_setor = $p_id_setor;
        }

        public function getIdSetor() : int 
        {
            return $this->id_setor;
        }

        public function setNomeSetor(string $p_nome_setor) : void 
        {
            $this->nome_setor = Util::TratarCaracteresEspeciais($p_nome_setor);
        }

        public function getNomeSetor() : string 
        {
            return $this->nome_setor;
        }

    }

=======
<?php

    namespace Src\VO;
    
    use Src\_Public\Util;

    class SetorVO {

        private $id_setor;
        private $nome_setor;

        public function setIdSetor($id_setor) : void {
            $this->id_setor = $id_setor;
        }

        public function getIdSetor() : int {
            return $this->id_setor;
        }

        public function setNomeSetor($nome_setor) : void {
            $this->nome_setor = Util::TratarCaracteresEspeciais($nome_setor);
        }

        public function getNomeSetor() : int {
            return $this->nome_setor;
        }

    }

>>>>>>> a42be89be5fa7bc1645a032ede1104aa0241ee8b
?>