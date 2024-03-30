<?php

    namespace Src\Model\SQL;

    class ChamadoSql
    {
        public static function abrirChamado()
        {
            return "INSERT INTO 
                        tb_chamado (
                            data_abertura,
                            hora_abertura,
                            problema,
                            fk_id_usuario,
                            fk_id_alocar )
                    VALUES (?, ?, ?, ?, ?)";
        }

        public static function filtrarChamado($situacao, $setor)
        {
            $sql = 'SELECT
                        tc.id_chamado,
                        tc.fk_id_usuario,
                        tc.fk_id_tecnico_encerramento, 
                        tc.fk_id_tecnico_atendimento,
                        tc.fk_id_alocar,
                        tm.nome_modelo,
                        tt.nome_tipo,
                        te.identificacao,
                        tc.data_abertura,
                        tc.hora_abertura,
                        tc.problema,
                        tc.data_atendimento,
                        tc.hora_atendimento,
                        tc.data_encerramento,
                        tc.hora_encerramento,
                        tc.laudo,
                        usuario_tec_atend.nome_usuario AS tecnico_atendimento,
                        usuario_tec_enc.nome_usuario AS tecnico_encerramento,
                        tc.fk_id_alocar,
                        usuario_func.nome_usuario AS funcionario
                    FROM
                        tb_chamado AS tc
                    INNER JOIN
                        tb_funcionario AS tf ON tc.fk_id_usuario = tf.tb_usuario_id_usuario
                    INNER JOIN 
                        tb_usuario AS usuario_func ON tf.tb_usuario_id_usuario = usuario_func.id_usuario
                    INNER JOIN
                        tb_alocar As alo ON tc.fk_id_alocar = alo.id_alocar
                    INNER JOIN 
                        tb_equipamento AS te ON alo.fk_id_equipamento = te.id_equipamento
                    INNER JOIN 
                        tb_tipo AS tt ON te.fk_id_tipo = tt.id_tipo
                    INNER JOIN
                        tb_modelo AS tm ON te.fk_id_modelo = tm.id_modelo
                    LEFT JOIN
                        tb_tecnico AS tec_atend ON tc.fk_id_tecnico_atendimento = tec_atend.tb_usuario_id_usuario
                    LEFT JOIN
                        tb_usuario AS usuario_tec_atend ON usuario_tec_atend.id_usuario = tec_atend.tb_usuario_id_usuario
                    LEFT JOIN
                        tb_tecnico AS tec_enc ON tc.fk_id_tecnico_encerramento = tec_enc.tb_usuario_id_usuario
                    LEFT JOIN
                        tb_usuario AS usuario_tec_enc ON tec_enc.tb_usuario_id_usuario = usuario_tec_enc.id_usuario ';

            switch ($situacao) 
            {
                case SITUACAO_CHAMADO_AGUARDANDO_ATENDIMENTO:
                    $sql .= 'WHERE tc.fk_id_tecnico_atendimento IS NULL ' . ($setor ? ' AND alo.fk_id_setor = ?' : '');
                    break;
                case SITUACAO_CHAMADO_EM_ATENDIMENTO:
                    $sql .= 'WHERE tc.fk_id_tecnico_atendimento IS NOT NULL AND tc.fk_id_tecnico_encerramento IS NULL' . ($setor ? ' AND alo.fk_id_setor = ?' : '');
                    break;
                case SITUACAO_CHAMADO_ENCERRADO:
                    $sql .= 'WHERE tc.fk_id_tecnico_encerramento IS NOT NULL' . ($setor ? ' AND alo.fk_id_setor = ?' : '');
                    break;
                default:
                    $sql .= ($setor ? 'WHERE alo.fk_id_setor = ? ' : '');
                    break;
            }

            return $sql;
        }

        public static function detalharChamado()
        {
            return 'SELECT
                        tc.id_chamado,
                        tc.fk_id_usuario,
                        tc.fk_id_tecnico_encerramento, 
                        tc.fk_id_tecnico_atendimento,
                        tc.fk_id_alocar,
                        tm.nome_modelo,
                        tt.nome_tipo,
                        te.identificacao,
                        tc.data_abertura,
                        tc.hora_abertura,
                        tc.problema,
                        tc.data_atendimento,
                        tc.hora_atendimento,
                        tc.data_encerramento,
                        tc.hora_encerramento,
                        tc.laudo,
                        usuario_tec_atend.nome_usuario AS tecnico_atendimento,
                        usuario_tec_enc.nome_usuario AS tecnico_encerramento,
                        tc.fk_id_alocar,
                        usuario_func.nome_usuario AS funcionario
                    FROM
                        tb_chamado AS tc
                    INNER JOIN
                        tb_funcionario AS tf ON tc.fk_id_usuario = tf.tb_usuario_id_usuario
                    INNER JOIN 
                        tb_usuario AS usuario_func ON tf.tb_usuario_id_usuario = usuario_func.id_usuario
                    INNER JOIN
                        tb_alocar As alo ON tc.fk_id_alocar = alo.id_alocar
                    INNER JOIN 
                        tb_equipamento AS te ON alo.fk_id_equipamento = te.id_equipamento
                    INNER JOIN 
                        tb_tipo AS tt ON te.fk_id_tipo = tt.id_tipo
                    INNER JOIN
                        tb_modelo AS tm ON te.fk_id_modelo = tm.id_modelo
                    LEFT JOIN
                        tb_tecnico AS tec_atend ON tc.fk_id_tecnico_atendimento = tec_atend.tb_usuario_id_usuario
                    LEFT JOIN
                        tb_usuario AS usuario_tec_atend ON usuario_tec_atend.id_usuario = tec_atend.tb_usuario_id_usuario
                    LEFT JOIN
                        tb_tecnico AS tec_enc ON tc.fk_id_tecnico_encerramento = tec_enc.tb_usuario_id_usuario
                    LEFT JOIN
                        tb_usuario AS usuario_tec_enc ON tec_enc.tb_usuario_id_usuario = usuario_tec_enc.id_usuario 
                    WHERE tc.id_chamado = ?';
        }

        public static function numerosChamadoAtual() {
            return "SELECT
                        (SELECT count(id_chamado) FROM tb_chamado WHERE fk_id_tecnico_atendimento IS NULL) AS quantidade_aguardando,
                        (SELECT count(id_chamado) FROM tb_chamado WHERE fk_id_tecnico_atendimento IS NOT NULL AND fk_id_tecnico_encerramento IS NULL) AS quantidade_em_atendimento,
                        (SELECT count(id_chamado) FROM tb_chamado WHERE fk_id_tecnico_encerramento IS NOT NULL) AS quantidade_encerrado";
        }
    }