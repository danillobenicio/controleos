<?php

    namespace Src\Model\SQL;

    class EquipamentoSql
    {
        public static function CadastrarEquipamento()
        {
            $sql = 'INSERT INTO tb_equipamento (identificacao, descricao, fk_id_modelo, fk_id_tipo) values (?, ?, ?, ?)';
            return $sql;
        }

        public static function ConsultarEquipamento()
        {
            $sql = 'SELECT 
                        te.id_equipamento as id,
                        tt.nome_tipo as tipo,
                        tm.nome_modelo as modelo,
                        te.identificacao as identificacao,
                        te.descricao as descricao
                    FROM
                        tb_equipamento te
                    INNER JOIN tb_tipo tt ON tt.id_tipo = te.fk_id_tipo
                    INNER JOIN tb_modelo tm ON tm.id_modelo = te.fk_id_modelo';
            
            return $sql;
        }
    }

?>