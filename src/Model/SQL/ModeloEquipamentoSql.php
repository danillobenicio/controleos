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
            $sql = 'SELECT id_modelo, nome_modelo FROM tb_modelo';
            return $sql;
        }

    }

?>