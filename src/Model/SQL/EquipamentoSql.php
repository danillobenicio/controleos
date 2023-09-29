<?php

    namespace Src\Model\SQL;

    class EquipamentoSql
    {
        public static function CadastrarEquipamento()
        {
            $sql = 'INSERT INTO tb_equipamento (fk_id_tipo, fk_id_modelo, identificacao, descricao, situacao) values (?, ?, ?, ?, ?)';
            return $sql;
        }

        public static function FiltrarEquipamento($idTipo, $idModelo)
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
                            WHEN te.situacao = 0 THEN 'Descartado'
                            ELSE 'Não informado'
						END as situacao, 
                        te.data_descarte, 
                        te.motivo_descarte, 
                        tt.nome_tipo, 
                        tm.nome_modelo
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

        public static function DetalharEquipamento()
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

        public static function DeletarEquipamento()
        {
            $sql = 'DELETE FROM tb_equipamento WHERE id_equipamento = ?';
            return $sql;
        }

        public static function AlterarEquipamento()
        {
            $sql = 'UPDATE tb_equipamento SET fk_id_tipo = ?, fk_id_modelo = ?, identificacao = ?, descricao = ? WHERE id_equipamento =? ';
            return $sql;
        }

        public static function InativarEquipamento()
        {
            $sql = 'UPDATE tb_equipamento SET data_descarte = ?, motivo_descarte = ?, situacao = ? WHERE id_equipamento = ?';
            return $sql;
        }

    }

?>