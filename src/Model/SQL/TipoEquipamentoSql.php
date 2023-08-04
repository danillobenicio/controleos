<?php

    namespace Src\Model\SQL;

    class TipoEquipamentoSql
    {

        public static function InserirTipoEquipamento()
        {

            $sql = 'INSERT INTO tb_tipo (nome_tipo) VALUES (?)';

            return $sql;

        }

    }

?>