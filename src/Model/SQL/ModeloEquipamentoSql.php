<?php

    namespace Src\Model\SQL;

    class ModeloEquipamentoSql
    {

        public static function cadastrarModeloEquipamentoSql()
        {
             $sql = 'INSERT INTO tb_modelo (nome_modelo) VALUES (?)';
             return $sql;
        }

        public static function consultarModeloEquipamentoSql()
        {
            $sql = 'SELECT id_modelo, nome_modelo FROM tb_modelo ORDER BY nome_modelo';
            return $sql;
        }

        public static function alterarModeloEquipamentoSql()
        {
            $sql = 'UPDATE tb_modelo SET nome_modelo = ? WHERE id_modelo = ?';
            return $sql;
        }

        public static function excluirModeloEquipamentoSql()
        {
            $sql = 'DELETE FROM tb_modelo WHERE id_modelo = ?';
            return $sql;
        }
    }

?>