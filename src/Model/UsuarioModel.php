<?php

namespace Src\Model;

use Dompdf\Positioner\NullPositioner;
use Exception;
use Src\Model\Conexao;
use Src\VO\UsuarioVO;
use Src\Model\SQL\UsuarioSql;
use Src\VO\EnderecoVO;
use Src\VO\EstadoVO;
use Src\VO\TecnicoVO;

/*use Src\VO\EnderecoVO;
    use Src\VO\SetorVO;
    use Src\VO\TecnicoVO;*/

class UsuarioModel extends Conexao
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = parent::retornarConexao();
    }

    public function verificarEmailDuplicadoModel(string $email): bool
    {
        $sql = $this->conexao->prepare(UsuarioSql::verificarEmail());
        $sql->bindValue(1, $email);
        $sql->execute();
        $ver_email = $sql->fetchAll(\PDO::FETCH_ASSOC);
        return $ver_email[0]['contar_email'] == 0 ? false : true;
    }

    public function verificarCpfDuplicadoModel(string $cpf) : bool
    {
        $sql = $this->conexao->prepare(UsuarioSql::buscarCpf());
        $sql->bindValue(1, $cpf);
        $sql->execute();
        $ver_cpf = $sql->fetch(\PDO::FETCH_ASSOC);
        return $ver_cpf['contar_cpf'] == 0 ? false : true; 
    }

    public function cadastrarUsuarioModel($vo): int
    {
        $sql = $this->conexao->prepare(UsuarioSql::cadastrarUsuarioSql());
        $sql->bindValue(1, $vo->getNomeUsuario());
        $sql->bindValue(2, $vo->getTipoUsuario());
        $sql->bindValue(3, $vo->getEmailUsuario());
        $sql->bindValue(4, $vo->getCpfUsuario());
        $sql->bindValue(5, $vo->getStatusUsuario());
        $sql->bindValue(6, $vo->getTelUsuario());
        $sql->bindValue(7, $vo->getSenhaUsuario());

        $verificaCpf = $this->verificarCpfDuplicadoModel($vo->getCpfUsuario());

        if (!$verificaCpf) {
            return 14;
            die;
        }

        try {
            $this->conexao->beginTransaction();

            //Cadastra o usuário
            $sql->execute();

            //Recupera o id do usuário cadastrado
            $id_user = $this->conexao->lastInsertId();

            switch ($vo->getTipoUsuario()) {
                case USUARIO_FUNC:
                    $sql = $this->conexao->prepare(UsuarioSql::cadastrarUsuarioFuncionario());
                    $sql->bindValue(1, $id_user);
                    $sql->bindValue(2, $vo->getIdSetor());
                    $sql->execute();
                    break;
                case USUARIO_TEC:
                    $sql = $this->conexao->prepare(UsuarioSql::CadastrarUsuarioTecnico());
                    $sql->bindValue(1, $id_user);
                    $sql->bindValue(2, $vo->getNomeEmpresa());
                    $sql->execute();
                    break;
            }
            //passo 1, verificar se a cidade existe.
            $sql = $this->conexao->prepare(UsuarioSql::verificarCidadeCadastrada());
            $sql->bindValue(1, $vo->getNomeCidade());
            $sql->bindValue(2, $vo->getSiglaEstado());

            $sql->execute();

            $id_cidade = 0;

            $tem_cidade = $sql->fetchAll(\PDO::FETCH_ASSOC);

            if (count($tem_cidade) > 0) {
                $id_cidade = $tem_cidade[0]['id_cidade'];
            } else {

                //Verifica se o estado existe
                $sql = $this->conexao->prepare(UsuarioSql::verificarEstadoCadastrado());
                $sql->bindValue(1, $vo->getSiglaEstado());

                $sql->execute();

                $id_estado = 0;

                $tem_estado = $sql->fetchAll(\PDO::FETCH_ASSOC);

                //Verifica se encontrou o estado
                if (count($tem_estado) > 0) {
                    $id_estado = $tem_estado[0]['id_estado'];
                } else {
                    //Cadastra o estado
                    $sql = $this->conexao->prepare(UsuarioSql::cadastrarEstado());
                    $sql->bindvalue(1, $vo->getSiglaEstado());
                    $sql->execute();
                    $id_estado = $this->conexao->lastInsertId();
                }

                $sql = $this->conexao->prepare(UsuarioSql::CadastrarCidade());
                $sql->bindValue(1, $vo->getNomeCidade());
                $sql->bindValue(2, $id_estado);

                $sql->execute();

                $id_cidade = $this->conexao->lastInsertId();
            }

            //Cadastrar endereço
            $sql = $this->conexao->prepare(UsuarioSql::CadastrarEndereco());
            $sql->bindValue(1, $vo->getBairro());
            $sql->bindValue(2, $vo->getRua());
            $sql->bindValue(3, $vo->getCep());
            $sql->bindValue(4, $id_user);
            $sql->bindValue(5, $id_cidade);

            $sql->execute();

            $this->conexao->commit();

            return 1;
        } catch (Exception $ex) {
            $this->conexao->rollback();
            echo $ex->getMessage();
            return -1;
        }
    }


    public function FiltrarUsuarioModel($nome)
    {

        $sql = $this->conexao->prepare(UsuarioSql::FiltrarUsuario());
        $sql->bindValue(1, "%$nome%");
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }



    public function AlterarStatusUsuarioModel(UsuarioVO $vo)
    {
        $sql = $this->conexao->prepare(UsuarioSql::AlterarStatusUsuario());

        $sql->bindValue(1, $vo->getStatusUsuario());
        $sql->bindValue(2, $vo->getIdUsuario());

        try {
            $sql->execute();
            return 2;
        } catch (\Exception $ex) {
            return -1;
        }
    }


    public function DetalharUsuarioModel($id)
    {
        $sql = $this->conexao->prepare(UsuarioSql::DetalharUsuario());
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetch(\PDO::FETCH_ASSOC);
    }


    public function alterarUsuarioModel($vo)
    {

        $sql = $this->conexao->prepare(UsuarioSql::alterarUsuario());
        $sql->bindValue(1, $vo->getNomeUsuario());
        $sql->bindValue(2, $vo->getEmailUsuario());
        $sql->bindValue(3, $vo->getCpfUsuario());
        $sql->bindValue(4, $vo->getTelUsuario());
        $sql->bindValue(5, $vo->getIdUsuario());


        try {
            $this->conexao->beginTransaction();

            //Alterar na tb_usuario
            $sql->execute();

            switch ($vo->getTipoUsuario()) {
                case USUARIO_FUNC:
                    $sql = $this->conexao->prepare(UsuarioSql::alterarFuncionario());
                    $sql->bindValue(1, $vo->getIdSetor());
                    $sql->bindValue(2, $vo->getIdUsuario());
                    $sql->execute();
                    break;
                case USUARIO_TEC:
                    $sql = $this->conexao->prepare(UsuarioSql::alterarTecnico());
                    $sql->bindValue(1, $vo->getNomeEmpresa());
                    $sql->bindValue(2, $vo->getIdUsuario());
                    $sql->execute();
                    break;
            }

            //Processo que grava o endereco

            //passo 1, verificar se a cidade existe.

            $sql = $this->conexao->prepare(UsuarioSql::VerificarCidadeCadastrada());
            $sql->bindValue(1, $vo->getNomeCidade());
            $sql->bindValue(2, $vo->getSiglaEstado());

            $sql->execute();

            $id_cidade = 0;

            $tem_cidade = $sql->fetchAll(\PDO::FETCH_ASSOC);

            if (count($tem_cidade) > 0) {
                $id_cidade = $tem_cidade[0]['id_cidade'];
            } else {

                //Verifica se o estado existe
                $sql = $this->conexao->prepare(UsuarioSql::VerificarEstadoCadastrado());
                $sql->bindValue(1, $vo->getSiglaEstado());

                $sql->execute();

                $id_estado = 0;

                $tem_estado = $sql->fetchAll(\PDO::FETCH_ASSOC);

                //Verifica se encontrou o estado
                if (count($tem_estado) > 0) {
                    $id_estado = $tem_estado[0]['id_estado'];
                } else {
                    //Cadastra o estado
                    $sql = $this->conexao->prepare(UsuarioSql::CadastrarEstado());
                    $sql->bindvalue(1, $vo->getSiglaEstado());
                    $sql->execute();
                    $id_estado = $this->conexao->lastInsertId();
                }

                $sql = $this->conexao->prepare(UsuarioSql::CadastrarCidade());
                $sql->bindValue(1, $vo->getNomeCidade());
                $sql->bindValue(2, $id_estado);

                $sql->execute();

                $id_cidade = $this->conexao->lastInsertId();
            }

            $sql = $this->conexao->prepare(UsuarioSql::alterarEndereco());
            $sql->bindValue(1, $vo->getRua());
            $sql->bindValue(2, $vo->getBairro());
            $sql->bindValue(3, $vo->getCep());
            $sql->bindValue(4, $id_cidade);
            $sql->bindValue(5, $vo->getIdEndereco());

            $sql->execute();

            $this->conexao->commit();

            return 2;
        } catch (Exception $ex) {
            $this->conexao->rollback();
            echo $ex->getMessage();
            return -1;
        }
    }

    public function validarLoginModel(string $login, int $status): array | null | bool
    {
        $sql = $this->conexao->prepare(UsuarioSql::validarLoginSql());
        $sql->bindValue(1, $login);
        $sql->bindValue(2, $status);
        $sql->execute();
        return $sql->fetch(\PDO::FETCH_ASSOC);
        //$this->gravarLogAcesso($ret['id_usuario']);
        //return $ret;
    }

    public function gravarLogAcessoModel($id)
    {
        $sql = $this->conexao->prepare('call proc_registrar_acesso(?, ?)');
        $sql->bindValue(1, date('Y-m-d'));
        $sql->bindValue(2, $id);
        $sql->execute();
    }

    public function alterarSenhaModel(UsuarioVO $vo): int
    {
        $sql = $this->conexao->prepare(UsuarioSql::alterarSenha());
        $sql->bindValue(1, $vo->getSenhaUsuario());
        $sql->bindValue(2, $vo->getIdUsuario());
        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            return -1;
        }
    }

    public function verificarSenhaModel(int $id): array | null
    {
        $sql = $this->conexao->prepare(UsuarioSql::buscarSenha());
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetch(\PDO::FETCH_ASSOC);
    }
}
