<?php

    namespace Src\Model;

    use Src\Model\Conexao;
    use Src\VO\EquipamentoVO;
    use Src\Model\SQL\EquipamentoSql;
    use Src\VO\AlocarVo;
    use Exception;

    class EquipamentoModel extends Conexao
    {

        private $conexao;
        public function __construct()
        {
            $this->conexao = parent::retornarConexao();
        }

        public function cadastrarEquipamentoModel(EquipamentoVO $vo) : int
        {
            $sql = $this->conexao->prepare(EquipamentoSql::cadastrarEquipamentoSql());

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

        public function filtrarEquipamentoMODEL($idTipo, $idModelo, $situacao) : array
        {
            $sql = $this->conexao->prepare(EquipamentoSql::filtrarEquipamentoSql($idTipo, $idModelo, $situacao));

            $i = 1;

            $sql->bindValue($i++, $situacao);

            if($idTipo != '' && $idModelo != ''){
                $sql->bindValue($i++, $idTipo);
                $sql->bindValue($i++, $idModelo);
            }else if($idTipo == '' && $idModelo != ''){
                $sql->bindValue($i++, $idModelo);
            }else if($idTipo != '' && $idModelo == ''){
                $sql->bindValue($i++, $idTipo);
            }

            try {
                $sql->execute();
                return $sql->fetchAll(\PDO::FETCH_ASSOC);
            } catch (\Exception $ex) {
                echo $ex->getMessage();
            }
            

        }

        public function detalharEquipamentoMODEL(int $id) : array | string
        {
            $sql = $this->conexao->prepare(EquipamentoSql::detalharEquipamentoSql());
            $sql->bindValue(1, $id);
            $sql->execute();
            return $sql->fetch(\PDO::FETCH_ASSOC);
        }
        
        public function excluirEquipamentoMODEL(EquipamentoVO $vo) : int
        {
            $sql = $this->conexao->prepare(EquipamentoSql::deletarEquipamentoSql());
            $sql->bindValue(1, $vo->getIdEquipamento());

            try{
                $sql->execute();
                return 3;
            }catch (Exception $ex){
                echo $ex->getMessage();
                return -1;
            }
        }

        public function alterarEquipamentoModel(EquipamentoVO $vo) : int
        {
            $sql = $this->conexao->prepare(EquipamentoSql::alterarEquipamentoSql());

            $sql->bindValue(1, $vo->getFkTipo());
            $sql->bindValue(2, $vo->getFkModelo());
            $sql->bindValue(3, $vo->getIdentificacao());
            $sql->bindValue(4, $vo->getDescricao());
            $sql->bindValue(5, $vo->getIdEquipamento());         
                     
            try 
            {
                $sql->execute();
                return 2;
            } catch (Exception $ex) {
                echo $ex->getMessage();
                return -1;
            }
        }

        public function inativarEquipamentoModel(EquipamentoVO $vo) : int
        {
            $sql = $this->conexao->prepare(EquipamentoSql::inativarEquipamentoSql());

            $sql->bindValue(1, $vo->getDataDescarte());
            $sql->bindValue(2, $vo->getMotivoDescarte());          
            $sql->bindValue(3, $vo->getSituacao());
            $sql->bindValue(4, $vo->getIdEquipamento());

            try {
                $sql->execute();
                return 4;
            } catch (\Exception $ex) {
                return -1;
            }
        }

        public function selecionarEquipamentoNaoAlocadoModel(int $sit_alocar, int $sit_equipamento) : array | string
        {
            $sql = $this->conexao->prepare(EquipamentoSql::selecionarEquipamentoNaoAlocadoSql());
            $sql->bindvalue(1, $sit_alocar);
            $sql->bindvalue(2, $sit_equipamento);
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function alocarEquipamentoModel(AlocarVo $vo) : int
        {
            $sql = $this->conexao->prepare(EquipamentoSql::alocarEquipamentoSql());
            $sql->bindValue(1, $vo->getDataAlocar());
            $sql->bindValue(2, $vo->getSituacao());
            $sql->bindValue(3, $vo->getIdEquipamento());
            $sql->bindValue(4, $vo->getIdSetor());

            try {
                $sql->execute();
                return 7;
            } catch (\Exception $ex) {
                return -1;
            }

        }

        
        public function consultarEquipamentosAlocadosSetorModel($id_setor) : array
        {
            $sql = $this->conexao->prepare(EquipamentoSql::consultarEquipamentosAlocadosSetorSql());
            $sql->bindvalue(1, $id_setor);
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }


        public function removerEquipamentoSetorModel(AlocarVo $vo) : int
        {
            $sql = $this->conexao->prepare(EquipamentoSql::removerEquipamentoSetorSql());
            $sql->bindValue(1, $vo->getDataRemover());
            $sql->bindValue(2, $vo->getSituacao());
            $sql->bindValue(3, $vo->getIdAlocar());

            try {
                $sql->execute();
                return 6;
            } catch (\Exception $ex) {
                return -1;
            }

        }
    }

?>