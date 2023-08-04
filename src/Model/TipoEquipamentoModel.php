<?php

    namespace Src\Model;
    use Src\Model\Conexao;
    use Src\VO\TipoVO;
    use Src\Model\SQL\TipoEquipamentoSql;
    use Exception;

    class TipoEquipamentoModel extends Conexao
    {

        public function CadastrarTipoEquipamentoModel(TipoVo $vo)
        {

            $conexao = parent::retornarConexao();
            $sql = $conexao->prepare(TipoEquipamentoSql::InserirTipoEquipamento());
            $sql->bindValue(1, $vo->getNomeTipo());

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