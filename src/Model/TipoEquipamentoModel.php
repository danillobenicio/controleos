<?php

    namespace Src\Model;
    use Src\Model\Conexao;
    use Src\VO\TipoVO;
    use Src\Model\SQL\TipoEquipamentoSql;
    use Exception;

    class TipoEquipamentoModel extends Conexao {

        private $conexao;

        public function __construct() {
          $this->conexao = parent::retornarConexao();  
        }

        public function cadastrarTipoEquipamentoModel(TipoVo $vo) : int {
           // $sql = $this->conexao->prepare(TipoEquipamentoSql::cadastrarTipoEquipamentoSql());
            $sql = $this->conexao->prepare('call proc_cadastrar_tipo_equipamento (?)');
            $sql->bindValue(1, $vo->getNomeTipo());
            try {
                $sql->execute();
                return 1; 
            } catch (Exception $ex) {
                return -1;
            }
        }

        public function consultarTipoEquipamentoModel() : array {
            $sql = $this->conexao->prepare('call proc_consultar_tipo_equipamento');
            //$sql = $this->conexao->prepare(TipoEquipamentoSql::consultarTipoEquipamentoSql());
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }


        public function alterarTipoEquipamentoModel(TipoVO $vo) : int {
            $sql = $this->conexao->prepare('call proc_alterar_tipo_equipamento(?, ?)');
            //$sql = $this->conexao->prepare(TipoEquipamentoSql::alterarTipoEquipamentoSql());
            $sql->bindValue(1, $vo->getNomeTipo());
            $sql->bindValue(2, $vo->getIdTipo());
            try {
                $sql->execute();
                return 2;
            } catch (\Exception $ex) {
                return -1;
            }
        }

        public function excluirTipoEquipamentoModel(TipoVO $vo) : int {
            $sql = $this->conexao->prepare('call proc_exccluir_tipo_equipamento (?)');
            //$sql = $this->conexao->prepare(TipoEquipamentoSql::excluirTipoEquipamentoSql());
            $sql->bindValue(1, $vo->getIdTipo());
            try {
                $sql->execute();
                return 3;
            } catch (\Exception $ex) {
                return -1;
            }
        }

    }

?>