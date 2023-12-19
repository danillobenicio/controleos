<?php

    namespace Src\Model\SQL;

    class UsuarioSql {

        public static function VerificarEmail() : string {

            $sql = 'SELECT count(email_usuario) as contar_email FROM tb_usuario WHERE email_usuario = ?';
            return $sql;

        }

        public static function CadastrarEstado() : string {
            $sql = 'INSERT INTO tb_estado (sigla) VALUES (?)';
            return $sql;
        }

        public static function CadastrarCidade() : string {
            $sql = 'INSERT INTO tb_cidade (nome_cidade, fk_id_estado) VALUES (?, ?)';
            return $sql;
        }

        public static function CadastrarEndereco() : string {
            $sql = 'INSERT INTO tb_endereco (rua, bairro, cep, fk_id_usuario, fk_id_cidade) VALUES (?, ?, ?, ?, ?)';
            return $sql;
        }

        public static function CadastrarUsuario() : string {
            $sql = 'INSERT INTO tb_usuario (nome_usuario, tipo_usuario, email_usuario, cpf_usuario, status_usuario, tel_usuario, senha_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)';
            return $sql;
        }

        public static function CadastrarUsuarioTecnico() : string {
            $sql = 'INSERT INTO tb_tecnico (tb_usuario_id_usuario, nome_empresa) VALUES (?, ?)';
            return $sql;
        }


        public static function CadastrarUsuarioFuncionario() : string {
            $sql = 'INSERT INTO tb_funcionario (tb_usuario_id_usuario, fk_id_setor) VALUES (?, ?)';
            return $sql;
        }


        public static function VerificarCidadeCadastrada() {
            $sql = 'SELECT 
                        tc.id_cidade
                    FROM
                        tb_cidade tc
                    INNER JOIN
                        tb_estado te 
                    ON 
                        tc.fk_id_estado = te.id_estado
                    WHERE
                        tc.nome_cidade = ?
                    AND 
                        te.sigla = ?';
            return $sql;
        }


        public static function VerificarEstadoCadastrado() {
            $sql = 'SELECT id_estado FROM tb_estado WHERE sigla = ?';
            return $sql;
        }

        public static function  FiltrarUsuario() {
            $sql = "SELECT id_usuario, nome_usuario, tipo_usuario, status_usuario FROM tb_usuario WHERE nome_usuario LIKE ?";
            return $sql;
        }


        public static function AlterarStatusUsuario() {
            $sql = "UPDATE tb_usuario SET status_usuario = ? WHERE id_usuario = ?";
            return $sql;
        }


        
        public static function DetalharUsuario() {
            $sql = "SELECT
                        tu.nome_usuario,
                        tu.cpf_usuario,
                        tu.email_usuario,
                        tu.tel_usuario,
                        tu.tipo_usuario,
                        te.rua,
                        te.bairro,
                        te.cep,
                        te.id_endereco,
                        te.fk_id_cidade,
                        tc.nome_cidade,
                        tes.sigla,
                        tt.nome_empresa,
                        tf.fk_id_setor,
                        ts.nome_setor
                    FROM
                        tb_usuario tu
                    INNER JOIN
                        tb_endereco te ON te.fk_id_usuario = tu.id_usuario
                    INNER JOIN
                        tb_cidade tc ON tc.id_cidade = te.fk_id_cidade
                    INNER JOIN 
                        tb_estado tes ON tes.id_estado = tc.fk_id_estado
                    LEFT JOIN
                        tb_tecnico tt ON tt.tb_usuario_id_usuario = tu.id_usuario
                    LEFT JOIN
                        tb_funcionario tf ON tf.tb_usuario_id_usuario = tu.id_usuario
                    LEFT JOIN
                        tb_setor ts ON ts.id_setor = tf.fk_id_setor
                    WHERE tu.id_usuario = ?";
            return $sql;
        }


        public static function alterarUsuario() {

        }

        public static function alterarTecnico(){

        }

        public static function alterarFuncionario(){

        }

        public static function alterarEndereco(){

        }
    

    }

?>