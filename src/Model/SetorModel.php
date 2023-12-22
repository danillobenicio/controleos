<?php

    namespace Src\Model;
    use Src\Model\Conexao;
    use Src\Model\SQL\SetorSql;
    use Src\VO\SetorVO;

    class SetorModel extends Conexao
    {
        private $conexao;

        public function __construct()
        {
            $this->conexao = parent::retornarConexao();
        }

        public function cadastrarSetorModel(SetorVO $vo) : int
        {
            $sql = $this->conexao->prepare(SetorSql::cadastrarSetorSql());
            $sql->bindValue(1, $vo->getNomeSetor());

            try
            {
                $sql->execute();
                return 1;
            }
            catch (\Exception $ex)
            {
                return -1;
            }
        }

        public function consultarSetorModel() : array
        {
            $sql = $this->conexao->prepare(SetorSql::consultarSetorSql());
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function alterarSetorModel(SetorVO $vo) : int
        {
            $sql = $this->conexao->prepare(SetorSql::alterarSetorSql());
            $sql->bindValue(1, $vo->getNomeSetor());
            $sql->bindValue(2, $vo->getIdSetor());

            try
            {
                $sql->execute();
                return 2;
            }
            catch (\Exception $ex)
            {
                return -1;
            }
        }

        public function excluirSetorModel(SetorVO $vo) : int
        {
            $sql = $this->conexao->prepare(SetorSql::excluirSetorSql());
            $sql->bindValue(1, $vo->getIdSetor());

            try {
                $sql->execute();
                return 3;
            } catch (\Exception $ex) {
                return -1;
            }

        }
    }

?>