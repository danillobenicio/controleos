<?php

    namespace Src\Model\SQL;

    class EquipamentoSql
    {
        public static function CadastrarEquipamento()
        {
            $sql = 'INSERT INTO tb_equipamento (identificacao, descricao, fk_id_modelo, fk_id_tipo) values (?, ?, ?, ?)';
            return $sql;
        }
    }

?>