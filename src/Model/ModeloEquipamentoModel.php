<?php

    namespace Src\Model;
    use Src\Model\Conexao;
    use Src\VO\ModeloVO;
    use Src\Model\SQL\ModeloEquipamentoSql;
    Use Exception;

    class ModeloEquipamentoModel extends Conexao
    {

        public function CadastrarModelo(ModeloVO $vo)
        {

            $conexao = parent::retornarConexao();
            $sql = $conexao->prepare(ModeloEquipamentoSql::InserirModeloEquipamento());
            $sql->bindValue(1, $vo->getNomeModelo());

            try 
            {
                $sql->execute();
                return 1;
            } 
            catch (Exception $ex) 
            {
                return -1;
            }

        }

    }

?>