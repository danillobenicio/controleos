<?php

    namespace Src\Model;

    use Src\Model\Conexao;
    use Src\VO\ChamadoVO;
    use Src\Model\SQL\ChamadoSql;
    use Exception;

    class ChamadosModel extends Conexao
    {

        private $conexao;
        public function __construct()
        {
            $this->conexao = parent::retornarConexao();
        }

        public function filtrarChamadoModel($situacao, $id_setor)
        {
            $tem_setor = $id_setor == -1 ? false : true;

            $sql = $this->conexao->prepare(ChamadoSql::filtrarChamado($situacao, $tem_setor));
            if ($tem_setor) {
                $sql->bindValue(1, $id_setor);
            }
            $sql->execute();
            return $sql->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function detalharChamadoModel($id)
        {
            $sql = $this->conexao->prepare(ChamadoSql::detalharChamado());
            $sql->bindValue(1, $id);
            $sql->execute();
            return $sql->fetch(\PDO::FETCH_ASSOC);
        }

        public function abrirChamadoModel(ChamadoVO $vo)
        {
            $sql = $this->conexao->prepare(ChamadoSql::abrirChamado());
            $sql->bindValue(1, $vo->getDataAbertura());
            $sql->bindValue(2, $vo->getHoraAbertura());
            $sql->bindValue(3, $vo->getProblema());
            $sql->bindValue(4, $vo->getFkUsuario());
            $sql->bindValue(5, $vo->getFkIdAlocar());

            try {
                $sql->execute();
                return 1;
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
        }

        public function numerosChamadoAtualModel()
        {
            $sql = $this->conexao->prepare(ChamadoSql::numerosChamadoAtual());
            $sql->execute();
            return $sql->fetch(\PDO::FETCH_ASSOC);
        }

        public function atenderChamadoModel(ChamadoVO $vo, $situacao) {
            $sql = $this->conexao->prepare(ChamadoSql::atenderChamadoSql());
            $sql->bindValue(1, $vo->getFkTecAtendimento());
            $sql->bindValue(2, $vo->getDataAtendimento());
            $sql->bindValue(3, $vo->getHoraAtendimento());
            $sql->bindValue(4, $vo->getIdChamado());

            $this->conexao->beginTransaction();
            try {
                $sql->execute();
                $sql = $this->conexao->prepare(ChamadoSql::atualizarAlocarSql());
                $sql->bindValue(1, $situacao);
                $sql->bindValue(2, $vo->getFkIdAlocar());
                $sql->execute();
                $this->conexao->commit();
                return 1;
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
        }

        public function finalizarChamadoModel(ChamadoVO $vo, $situacao) {
            $sql = $this->conexao->prepare(ChamadoSql::finalizarChamadoSql());
            $sql->bindValue(1, $vo->getFkTecEncerramento());
            $sql->bindValue(2, $vo->getLaudo());
            $sql->bindValue(3, $vo->getDataEncerramento());
            $sql->bindValue(4, $vo->getHoraEncerramento());
            $sql->bindValue(5, $vo->getIdChamado());

            $this->conexao->beginTransaction();

            try {
                $sql->execute();
                $sql = $this->conexao->prepare(ChamadoSql::atualizarAlocarSql());
                $sql->bindValue(1, $situacao);
                $sql->bindValue(2, $vo->getFkIdAlocar());
                $sql->execute();
                $this->conexao->commit();
                return 1;
            } catch (\Exception $ex) {
                return $ex->getMessage();
            }
        }
    }