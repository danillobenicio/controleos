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

            $sql->bindValue(1, $vo->getFkTipo());
            $sql->bindValue(2, $vo->getFkModelo());
            $sql->bindValue(3, $vo->getIdentificacao());
            $sql->bindValue(4, $vo->getDescricao());
            $sql->bindValue(5, $vo->getSituacao());
            
                     
            try 
            {
                $sql->execute();
                return 1;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -1;
            }

        }

        public function FiltrarEquipamentoMODEL($idTipo, $idModelo) : array
        {
            $sql = $this->conexao->prepare(EquipamentoSql::FiltrarEquipamento($idTipo, $idModelo));

            if($idTipo != '' && $idModelo != ''){
                $sql->bindValue(1, $idTipo);
                $sql->bindValue(2, $idModelo);
            }else if($idTipo == '' && $idModelo != ''){
                $sql->bindValue(1, $idModelo);
            }else if($idTipo != '' && $idModelo == ''){
                $sql->bindValue(1, $idTipo);
            }

            try {
                $sql->execute();
                return $sql->fetchAll(\PDO::FETCH_ASSOC);
            } catch (\Exception $ex) {
                echo $ex->getMessage();
            }
            

        }

        public function DetalharEquipamentoMODEL(int $id) : array | string
        {
            $sql = $this->conexao->prepare(EquipamentoSql::DetalharEquipamento());
            $sql->bindValue(1, $id);
            $sql->execute();
            return $sql->fetch(\PDO::FETCH_ASSOC);
        }
        
        public function ExcluirEquipamentoMODEL(EquipamentoVO $vo)
        {
            $sql = $this->conexao->prepare(EquipamentoSql::DeletarEquipamento());
            $sql->bindValue(1, $vo->getIdEquipamento());

            try{
                $sql->execute();
                return 1;
            }catch (Exception $ex){
                echo $ex->getMessage();
                return -1;
            }

        }
        
    }

?>