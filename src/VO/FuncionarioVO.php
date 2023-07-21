<<<<<<< HEAD
<?php

    namespace Src\VO;
    
    use Src\VO\UsuarioVO;

    class FuncionarioVO extends UsuarioVO
    {

        private $id_setor;

        public function setIdSetor(int $p_id_setor) : void
        {
            $this->id_setor = $p_id_setor;
        }

        public function getIdSetor() : int
        {
            return $this->id_setor;
        }

    }

=======
<?php

    namespace Src\VO;
    
    use Src\VO\UsuarioVO;

    class FuncionarioVO extends UsuarioVO{

        private $id_setor;

        public function setIdSetor($id_setor) : void {
            $this->id_setor = $id_setor;
        }

        public function getIdSetor() : int {
            return $this->id_setor;
        }

    }

>>>>>>> a42be89be5fa7bc1645a032ede1104aa0241ee8b
?>