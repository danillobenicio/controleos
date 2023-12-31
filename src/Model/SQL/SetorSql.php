<?php

    namespace Src\Model\Sql;

    class SetorSql
    {
        public static function cadastrarSetorSql()
        {
            $sql = 'INSERT INTO tb_setor (nome_setor) VALUES (?)';
            return $sql;
        }

        public static function consultarSetorSql()
        {
            $sql = 'SELECT id_setor, nome_setor FROM tb_setor ORDER BY nome_setor';
            return $sql;
        }

        public static function alterarSetorSql()
        {
            $sql = 'UPDATE tb_setor SET nome_setor = ? WHERE id_setor = ?';
            return $sql;
        }
        
        public static function excluirSetorSql()
        {
            $sql = 'DELETE FROM tb_setor WHERE id_setor = ?';
            return $sql;
        }
    }

?>