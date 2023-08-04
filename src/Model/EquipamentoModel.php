<?php

    namespace Src\Model;

    use Src\Model\Conexao;
    use Src\VO\EquipamentoVO;
    use Src\Model\SQL\EquipamentoSql;
    use Exception;

    class EquipamentoModel extends Conexao
    {
        public function CadastrarEquipamentoModel(EquipamentoVO $vo)
        {
            $conexao = parent::retornarConexao();
            $sql = $conexao->prepare(EquipamentoSql::CadastrarEquipamento());

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
    }

?>