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

        public function filtrarChamadoModel(int $situacao, int $id_setor) : array | null
        {
            $tem_setor = $id_setor == -1 ? false : true;

            $sql = $this->conexao->prepare(ChamadoSql::filtrarChamado($situacao, $tem_setor));
            if ($tem_setor)
                $sql->bindValue(1, $tem_setor);
            $sql->execute();
            return $sql->fetch(\PDO::FETCH_ASSOC);
        }

        public function abrirChamadoModel(ChamadoVO $vo)
        {
            $sql = new $this->conexao->prepare(ChamadoSql::abrirChamado());
            $sql->bindValue(1, $vo->getDataAbertura());
            $sql->bindValue(2, $vo->getHoraAbertura());
            $sql->bindValue(3, $vo->getProblema());
            $sql->bindValue(4, $vo->getFkUsuario());
            $sql->bindValue(5, $vo->getFkIdAlocar());

            try {
                $sql->execute();
                return 1;
            } catch (\Exception $ex) {
                return -1;
            }
        }
    }