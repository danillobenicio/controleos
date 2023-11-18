<?php

    namespace Src\Model;

    use Exception;
    use Src\Model\Conexao;
    use Src\VO\UsuarioVO;
    use Src\Model\SQL\UsuarioSql;
    use Src\VO\EnderecoVO;
    use Src\VO\SetorVO;
    use Src\VO\TecnicoVO;

    class UsuarioModel extends Conexao 
    {
        private $conexao;

        public function __construct() {
            $this->conexao = parent::retornarConexao();
        }

        public function VerificarEmailDuplicadoModel(string $email) : bool {

            $sql = $this->conexao->prepare(UsuarioSql::VerificarEmail());
            $sql->bindValue(1, $email);
            $sql->execute();
            $ver_email = $sql->fetchAll(\PDO::FETCH_ASSOC);
            return $ver_email[0]['contar_email'] == 0 ? false : true;
        }

        public function CadastrarUsuarioModel($vo, $voEnd, $voTec, $voFunc) : int {
   
            $sql = $this->conexao->prepare(UsuarioSql::CadastrarUsuario());
            $sql->bindValue(1, $vo->getNomeUsuario());
            $sql->bindValue(2, $vo->getTipoUsuario());
            $sql->bindValue(3, $vo->getEmailUsuario());
            $sql->bindValue(4, $vo->getCpfUsuario());
            $sql->bindValue(5, $vo->getStatusUsuario());
            $sql->bindValue(6, $vo->getTelUsuario());
            $sql->bindValue(7, $vo->getSenhaUsuario());

            try {
                $this->conexao->beginTransaction();

                //Cadastra na tb_usuario
                $sql->execute();

                //Recupera o id do usuário cadastrado
                $id_user = $this->conexao->lastInsertId();

                switch ($vo->getTipoUsuario()) {

                    case USUARIO_FUNC:
                        $sql = $this->conexao->prepare(UsuarioSql::CadastrarUsuarioFuncionario());
                        $sql->bindValue(1, $id_user);
                        $sql->bindValue(2, $voFunc->getIdSetor());
                        $sql->execute();
                        break;
                    case USUARIO_TEC:
                        $sql = $this->conexao->prepare(UsuarioSql::CadastrarUsuarioTecnico());
                        $sql->bindValue(1, $id_user);
                        $sql->bindValue(2, $voTec->getNomeEmpresa());
                        $sql->execute();
                        break;

                }

                //Processo que grava o endereco

                //passo 1, verificar se a cidade existe.

                $sql = $this->conexao->prepare(UsuarioSql::VerificarCidadeCadastrada());
                $sql->bindValue(1, $voEnd->getNomeCidade());
                $sql->bindValue(2, $voEnd->getSiglaEstado());

                $sql->execute();

                $id_cidade = 0;

                $tem_cidade = $sql->fetchAll(\PDO::FETCH_ASSOC);

                if(count($tem_cidade) > 0) {
                    $id_cidade = $tem_cidade[0]['id_cidade'];
                } else {
                    
                    //Verifica se o estado existe
                    $sql = $this->conexao->prepare(UsuarioSql::VerificarEstadoCadastrado());
                    $sql->bindValue(1, $voEnd->getSiglaEstado());

                    $sql->execute();

                    $id_estado = 0;

                    $tem_estado = $sql->fetchAll(\PDO::FETCH_ASSOC);

                    //Verifica se encontrou o estado
                    if (count($tem_estado) > 0) {
                        $id_estado = $tem_estado[0]['id_estado'];
                    } else {
                        
                        //Cadastra o estado
                        $sql = $this->conexao->prepare(UsuarioSql::CadastrarEstado());
                        $sql->bindvalue(1, $voEnd->getSiglaEstado());
                        $sql->execute();
                        $id_estado = $this->conexao->lastInsertId();
                    }

                    $sql = $this->conexao->prepare(UsuarioSql::CadastrarCidade());
                    $sql->bindValue(1, $voEnd->getNomeCidade());
                    $sql->bindValue(2, $id_estado);

                    $sql->execute();
                    
                    $id_cidade = $this->conexao->lastInsertId();
                
                }

                $sql = $this->conexao->prepare(UsuarioSql::CadastrarEndereco());
                $sql->bindValue(1, $voEnd->getBairro());
                $sql->bindValue(2, $voEnd->getRua());
                $sql->bindValue(3, $voEnd->getCep());
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
    }

?>