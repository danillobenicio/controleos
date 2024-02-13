<?php

    namespace Src\Model\SQL;

    class ChamadoSql
    {
        public static function abrirChamado()
        {
            return "INSERT INTO 
                        tb_chamado (
                            data_abertura,
                            hora_abertura,
                            problema,
                            fk_id_usuario,
                            fk_id_alocar )
                    VALUES (?, ?, ?, ?, ?)";
        }
    }