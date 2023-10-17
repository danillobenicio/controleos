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

        public function FiltrarEquipamentoMODEL($idTipo, $idModelo, $situacao) : array
        {
            $sql = $this->conexao->prepare(EquipamentoSql::FiltrarEquipamento($idTipo, $idModelo, $situacao));

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
                return 3;
            }catch (Exception $ex){
                echo $ex->getMessage();
                return -1;
            }

        }

        public function AlterarEquipamentoModel(EquipamentoVO $vo) : int
        {
            $sql = $this->conexao->prepare(EquipamentoSql::AlterarEquipamento());

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

        public function InativarEquipamentoModel(EquipamentoVO $vo)
        {
            $sql = $this->conexao->prepare(EquipamentoSql::InativarEquipamento());

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

        public function SelecionarEquipamentoNaoAlocadoModel(int $sit_alocar, int $sit_equipamento) : array | string
        {
            $sql = $this->conexao->prepare(EquipamentoSql::SelecionarEquipamentoNaoAlocado());
            $sql->bindvalue(1, $sit_alocar);
            $sql->bindvalue(2, $sit_equipamento);
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }


        public function AlocarEquipamentoModel(AlocarVo $vo)
        {
            $sql = $this->conexao->prepare(EquipamentoSql::AlocarEquipamento());
            $sql->bindValue(1, $vo->getDataAlocar());
            $sql->bindValue(2, $vo->getSituacao());
            $sql->bindValue(3, $vo->getIdEquipamento());
            $sql->bindValue(4, $vo->getIdSetor());

            try {
                $sql->execute();
                return 1;
            } catch (\Exception $ex) {
                return -1;
            }

        }

        public function ConsultarEquipamentosAlocadosSetorModel($id_setor) {
            $sql = $this->conexao->prepare(EquipamentoSql::ConsultarEquipamentosAlocadosSetor());
            $sql->bindvalue(1, $id_setor);
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

?>