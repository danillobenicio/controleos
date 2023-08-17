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

        public function CadastrarSetorModel(SetorVO $vo)
        {
            $sql = $this->conexao->prepare(SetorSql::InserirSetor());
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

        public function ConsultarSetorModel()
        {
            $sql = $this->conexao->prepare(SetorSql::ConsultarSetor());
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function AlterarSetorModel(SetorVO $vo)
        {
            $sql = $this->conexao->prepare(SetorSql::AlterarSetor());
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
    }

?>