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


        public function CadastrarModelo(ModeloVO $vo)
        {

            $sql = $this->conexao->prepare(ModeloEquipamentoSql::InserirModeloEquipamento());
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


        public function ConsultarModeloModel()
        {
            $sql = $this->conexao->prepare(ModeloEquipamentoSql::ConsultarModeloEquipamento());
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

    }

?>