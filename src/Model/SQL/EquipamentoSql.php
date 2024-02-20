<?php

    namespace Src\Model\SQL;

    class EquipamentoSql
    {
        public static function cadastrarEquipamentoSql()
        {
            $sql = 'INSERT INTO tb_equipamento (fk_id_tipo, fk_id_modelo, identificacao, descricao, situacao) values (?, ?, ?, ?, ?)';
            return $sql;
        }

        public static function filtrarEquipamentoSql($idTipo, $idModelo)
        {
            $sql = "SELECT 
                        te.id_equipamento, 
                        te.identificacao,
                        CASE  
                            WHEN te.descricao = '' THEN 'Não informado'
                            ELSE te.descricao
                        END AS descricao,
                        CASE
							WHEN te.situacao = 1 THEN 'Ativo'
                            WHEN te.situacao = 0 THEN 'Inativo'
                            ELSE 'Não informado'
						END as situacao, 
                        te.data_descarte, 
                        te.motivo_descarte, 
                        tt.nome_tipo, 
                        tm.nome_modelo,
                        ( select count(*) from tb_alocar as al where al.fk_id_equipamento = te.id_equipamento and al.situacao != ?) as esta_alocado
                     FROM 
                        tb_equipamento te
                    INNER JOIN 
                        tb_modelo tm ON tm.id_modelo = te.fk_id_modelo
                    INNER JOIN 
                        tb_tipo tt ON tt.id_tipo = te.fk_id_tipo";
            

            if($idTipo != '' && $idModelo != ''){
                $sql .= ' WHERE te.fk_id_tipo = ? AND te.fk_id_modelo = ?';
            }else if($idTipo == '' && $idModelo != ''){
                $sql .= ' WHERE te.fk_id_modelo = ?';
            }else if($idTipo != '' && $idModelo == ''){
                $sql .= ' WHERE te.fk_id_tipo = ?';
            }

            return $sql;
        }

        public static function detalharEquipamentoSql()
        {
            $sql = 'SELECT 
                        id_equipamento,
                        identificacao, 
                        descricao,
                        situacao, 
                        fk_id_tipo, 
                        fk_id_modelo
                    FROM 
                        tb_equipamento te
                    WHERE id_equipamento = ? ';
            return $sql;
        }

        public static function deletarEquipamentoSql()
        {
            $sql = 'DELETE FROM tb_equipamento WHERE id_equipamento = ?';
            return $sql;
        }

        public static function alterarEquipamentoSql()
        {
            $sql = 'UPDATE tb_equipamento SET fk_id_tipo = ?, fk_id_modelo = ?, identificacao = ?, descricao = ? WHERE id_equipamento =? ';
            return $sql;
        }

        public static function inativarEquipamentoSql()
        {
            $sql = 'UPDATE tb_equipamento SET data_descarte = ?, motivo_descarte = ?, situacao = ? WHERE id_equipamento = ?';
            return $sql;
        }

        public static function selecionarEquipamentoNaoAlocadoSql()
        {
            $sql = 'SELECT 
                        te.id_equipamento AS id_equipamento,
                        te.identificacao,
                        tt.nome_tipo,
                        tm.nome_modelo
                    FROM 
                        tb_equipamento te
                    INNER JOIN
                        tb_tipo tt ON tt.id_tipo = te.fk_id_tipo
                    INNER JOIN
                        tb_modelo tm ON tm.id_modelo = te.fk_id_modelo
                    WHERE 
                        id_equipamento NOT IN (SELECT fk_id_equipamento FROM tb_alocar WHERE situacao <> ?)
                    AND
                        te.situacao = ?';
            return $sql;
        }


        public static function alocarEquipamentoSql() {
            $sql = 'INSERT INTO tb_alocar (data_alocacao, situacao, fk_id_equipamento, fk_id_setor) VALUES (? ,? ,?, ?)';
            return $sql;
        }


        public static function consultarEquipamentosAlocadosSetorSql() {
            $sql = 'SELECT 
                        ta.id_alocar,
                        te.identificacao,
                        tt.nome_tipo AS tipo,
                        tm.nome_modelo,
                        ts.nome_setor,
                        ta.data_alocacao,
                        ta.situacao,
                        td.id_setor
                    FROM
                        tb_alocar ta
                            INNER JOIN
                                tb_equipamento te ON te.id_equipamento = ta.fk_id_equipamento
                            INNER JOIN
                                tb_tipo tt ON tt.id_tipo = te.fk_id_tipo
                            INNER JOIN
                                tb_modelo tm ON tm.id_modelo = te.fk_id_modelo
                            INNER JOIN
                                tb_setor ts ON ts.id_setor = ta.fk_id_setor
                    WHERE
                        ta.data_remocao IS NULL
                        AND ta.fk_id_setor = ?';
            return $sql;
        }


        public static function removerEquipamentoSetorSql(){
            $sql = 'UPDATE tb_alocar SET data_remocao = ?, situacao = ? WHERE id_alocar = ?';
            return $sql;
        }

    }

?>