<?php

    namespace Src\Model\SQL;

    class ModeloEquipamentoSql
    {

        public static function InserirModeloEquipamento()
        {
             $sql = 'INSERT INTO tb_modelo (nome_modelo) VALUES (?)';
             return $sql;
        }

        public static function ConsultarModeloEquipamento()
        {
            $sql = 'SELECT id_modelo, nome_modelo FROM tb_modelo ORDER BY nome_modelo';
            return $sql;
        }

        public static function AlterarModeloEquipamento()
        {
            $sql = 'UPDATE tb_modelo SET nome_modelo = ? WHERE id_modelo = ?';
            return $sql;
        }

        public static function ExcluirModeloEquipamento()
        {
            $sql = 'DELETE FROM tb_modelo WHERE id_modelo = ?';
            return $sql;
        }
    }

?>