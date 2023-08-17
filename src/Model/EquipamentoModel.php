<?php

    namespace Src\Model;

    use Src\Model\Conexao;
    use Src\VO\EquipamentoVO;
    use Src\Model\SQL\EquipamentoSql;
    use Exception;

    class EquipamentoModel extends Conexao
    {

        private $conexao;
        public function __construct()
        {
            $this->conexao = parent::retornarConexao();
        }

        public function CadastrarEquipamentoModel(EquipamentoVO $vo)
        {
            $sql = $this->conexao->prepare(EquipamentoSql::CadastrarEquipamento());

            $sql->bindValue(1, $vo->getIdentificacao());
            $sql->bindValue(2, $vo->getDescricao());
            $sql->bindValue(3, $vo->getFkModelo());
            $sql->bindValue(4, $vo->getFkTipo());

            try 
            {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -1;
            }

        }

        public function ConsultarEquipamentoModel()
        {
            $sql = $this->conexao->prepare(EquipamentoSql::ConsultarEquipamento());
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);

        }
        
    }

?>