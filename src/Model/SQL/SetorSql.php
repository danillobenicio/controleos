<?php

    namespace Src\Model\Sql;

    class SetorSql
    {
        public static function InserirSetor()
        {
            $sql = 'INSERT INTO tb_setor (nome_setor) VALUES (?)';
            return $sql;
        }

        public static function ConsultarSetor()
        {
            $sql = 'SELECT id_setor, nome_setor FROM tb_setor ORDER BY nome_setor';
            return $sql;
        }
    }

?>