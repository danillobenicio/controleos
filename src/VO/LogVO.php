<<<<<<< HEAD
<?php

    namespace Src\VO;
    
    use Src\VO\UsuarioVO;
    use Src\_Public\Util;
    class LogVO extends UsuarioVO{

        private $id_log;
        private $data;

        public function setIdLog($id_log) : void {
            $this->id_log = $id_log;
        }

        public function getIdLog() : int {
            return $this->id_log;
        }

        public function getDataLog() : int {
            return $this->Util::DataHoraAtual();
        }

    }

=======
<?php

    namespace Src\VO;
    
    use Src\VO\UsuarioVO;
    use Src\_Public\Util;
    class LogVO extends UsuarioVO{

        private $id_log;
        private $data;

        public function setIdLog($id_log) : void {
            $this->id_log = $id_log;
        }

        public function getIdLog() : int {
            return $this->id_log;
        }

        public function getDataLog() : int {
            return $this->Util::DataHoraAtual();
        }

    }

>>>>>>> a42be89be5fa7bc1645a032ede1104aa0241ee8b
?>