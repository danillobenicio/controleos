<?php

    namespace Src\Model\SQL;

    class UsuarioSql 
    {
        public static function verificarEmail()
        {
            return 'SELECT count(email_usuario) AS contar_email FROM tb_usuario WHERE email_usuario = ?';
        }

        public static function cadastrarEstado() 
        {
            return 'INSERT INTO tb_estado (sigla) VALUES (?)';
        }

        public static function cadastrarCidade()
        {
            return 'INSERT INTO tb_cidade (nome_cidade, fk_id_estado) VALUES (?, ?)';
        }

        public static function cadastrarEndereco()
        {
            return 'INSERT INTO tb_endereco (rua, bairro, cep, fk_id_usuario, fk_id_cidade) VALUES (?, ?, ?, ?, ?)';
        }

        public static function cadastrarUsuarioSql() 
        {
            return 'INSERT INTO tb_usuario (nome_usuario, tipo_usuario, email_usuario, cpf_usuario, status_usuario, tel_usuario, senha_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)';
        }

        public static function cadastrarUsuarioTecnico()
        {
            return 'INSERT INTO tb_tecnico (tb_usuario_id_usuario, nome_empresa) VALUES (?, ?)';
        }

        public static function cadastrarUsuarioFuncionario()
        {
            return 'INSERT INTO tb_funcionario (tb_usuario_id_usuario, fk_id_setor) VALUES (?, ?)';
        }

        public static function verificarCidadeCadastrada() 
        {
            return 'SELECT tc.id_cidade FROM tb_cidade tc INNER JOIN tb_estado te ON  tc.fk_id_estado = te.id_estado WHERE tc.nome_cidade = ? AND te.sigla = ?';
        }

        public static function verificarEstadoCadastrado()
        {
            return 'SELECT id_estado FROM tb_estado WHERE sigla = ?';
        }

        public static function  FiltrarUsuario() 
        {
            return "SELECT id_usuario, nome_usuario, tipo_usuario, status_usuario FROM tb_usuario WHERE nome_usuario LIKE ?";
        }

        public static function AlterarStatusUsuario() 
        {
            return "UPDATE tb_usuario SET status_usuario = ? WHERE id_usuario = ?";
        }

        public static function DetalharUsuario() 
        {
            return "SELECT
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
                        ts.nome_setor,
                        tu.id_usuario
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
        }

        public static function alterarUsuario()
        {
            return 'UPDATE 
                        tb_usuario
                    SET 
                        nome_usuario = ?,
                        email_usuario = ?,
                        cpf_usuario = ?,
                        tel_usuario = ?
                    WHERE
                        id_usuario = ?';
        }

        public static function alterarTecnico()
        {
            return 'UPDATE tb_tecnico SET nome_empresa = ? WHERE tb_usuario_id_usuario = ?';
        }

        public static function alterarFuncionario()
        {
            return 'UPDATE tb_funcionario SET fk_id_setor = ? WHERE tb_usuario_id_usuario = ?';
        }

        public static function alterarEndereco()
        {
            return 'UPDATE 
                        tb_endereco
                    SET 
                        rua = ?,
                        bairro = ?,
                        cep = ?,
                        fk_id_cidade = ?
                    WHERE
                        id_endereco = ?';
        }

        public static function validarLoginSql()
        {
            return 'SELECT 
                        tu.id_usuario, 
                        tu.nome_usuario, 
                        tu.senha_usuario,
                        tf.fk_id_setor,
                        tc.nome_empresa
                    FROM 
                        tb_usuario tu
                    LEFT JOIN
                        tb_funcionario tf ON tf.tb_usuario_id_usuario = tu.id_usuario
                    LEFT JOIN
                        tb_tecnico tc ON tc.tb_usuario_id_usuario = tu.id_usuario
                    WHERE 
                        cpf_usuario = ? AND status_usuario = ?';
        }

        public static function alterarSenha() 
        {
            return "UPDATE tb_usuario SET senha_usuario = ? WHERE id_usuario = ?";
        }

        public static function buscarSenha()
        {
            return "SELECT senha_usuario FROM tb_usuario WHERE id_usuario = ?";
        } 
    }
?>