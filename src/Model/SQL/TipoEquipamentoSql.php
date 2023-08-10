<?php

    namespace Src\Model\SQL;

    class TipoEquipamentoSql
    {

        public static function InserirTipoEquipamento()
        {
            $sql = 'INSERT INTO tb_tipo (nome_tipo) VALUES (?)';
            return $sql;
        }

        public static function SelecionarTipoEquipamento()
        {
            $sql = 'SELECT id_tipo, nome_tipo FROM tb_tipo ORDER BY nome_tipo';
            return $sql;
        }

        public static function AlterarTipoEquipamento()
        {
            $sql = 'UPDATE tb_tipo SET nome_tipo = ? WHERE id_tipo = ?';
            return $sql;
        }

    }

?>