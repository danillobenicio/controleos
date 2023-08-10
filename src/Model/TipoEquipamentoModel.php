<?php

    namespace Src\Model;
    use Src\Model\Conexao;
    use Src\VO\TipoVO;
    use Src\Model\SQL\TipoEquipamentoSql;
    use Exception;

    class TipoEquipamentoModel extends Conexao
    {

        private $conexao;

        public function __construct()
        {
          $this->conexao = parent::retornarConexao();  
        }


        public function CadastrarTipoEquipamentoModel(TipoVo $vo)
        {
            $sql = $this->conexao->prepare(TipoEquipamentoSql::InserirTipoEquipamento());
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

        public function ConsultarTipoEquipamentoModel()
        {
            $sql = $this->conexao->prepare(TipoEquipamentoSql::SelecionarTipoEquipamento());
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function AlterarTipoEquipamentoModel(TipoVO $vo)
        {
            $sql= $this->conexao->prepare(TipoEquipamentoSql::AlterarTipoEquipamento());
            $i = 1;
            $sql->bindValue($i++, $vo->getNomeTipo());
            $sql->bindValue($i++, $vo->getIdTipo());
        }

    }

?>