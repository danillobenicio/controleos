<?php

    namespace Src\Model;
    use Src\Model\Conexao;
    use Src\VO\ModeloVO;
    use Src\Model\SQL\ModeloEquipamentoSql;
    Use Exception;

    class ModeloEquipamentoModel extends Conexao
    {
        private $conexao;

        public function __construct()
        {
            $this->conexao = parent::retornarConexao();
        }

        public function cadastrarModeloModel(ModeloVO $vo) : int
        {
            $sql = $this->conexao->prepare(ModeloEquipamentoSql::cadastrarModeloEquipamentoSql());
            $sql->bindValue(1, $vo->getNomeModelo());

            try {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                return -1;
            }
        }

        public function consultarModeloModel() : array
        {
            $sql = $this->conexao->prepare(ModeloEquipamentoSql::consultarModeloEquipamentoSql());
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function alterarModeloModel(ModeloVO $vo) : int
        {
            $sql = $this->conexao->prepare(ModeloEquipamentoSql::alterarModeloEquipamentoSql());
            $sql->bindValue(1, $vo->getNomeModelo());
            $sql->bindValue(2, $vo->getIdModelo());
            try {
                $sql->execute();
                return 2;
            } catch (\Exception $ex) {
                return -1;
            }
        }

        public function excluirModeloEquipamentoModel($vo) : int
        {
            $sql = $this->conexao->prepare(ModeloEquipamentoSql::excluirModeloEquipamentoSql());
            $sql->bindValue(1, $vo->getIdModelo());
            try {
                $sql->execute();
                return 3;
            } catch (\Exception $ex) {
                return -1;
            }
        }        
    }
?>