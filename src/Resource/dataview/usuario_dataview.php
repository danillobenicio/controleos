<?php

include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

use Src\_Public\Util;
use Src\Controller\SetorCTRL;
use Src\Controller\UsuarioCTRL;
use Src\VO\FuncionarioVO;
use Src\VO\TecnicoVO;
use Src\VO\UsuarioVO;

$ctrl = new UsuarioCTRL();

if (isset($_POST['verificarEmailDuplicado'])) 
{
    echo $ctrl->verificarEmailDuplicadoCTRL($_POST['email']);
} 

else if (isset($_POST['verificarCpfDuplicado']))
{
     echo $ctrl->verificarCpfDuplicadoCtrl($_POST['cpf']);
} 
else if (isset($_POST['btnCadastrarUsuario'])) 
{
    switch ($_POST['tipoUsuario']) {
        case USUARIO_ADM:
            $vo = new UsuarioVO();
            break;

        case USUARIO_TEC:
            $vo = new TecnicoVO();
            $vo->setNomeEmpresa($_POST['empresaTec']);
            break;

        case USUARIO_FUNC:
            $vo = new FuncionarioVO();
            $vo->setIdSetor($_POST['setorFunc']);
            break;
    }


    //Dados Usuário
    $vo->setTipoUsuario($_POST['tipoUsuario']);
    $vo->setNomeUsuario($_POST['nomeUsuario']);
    $vo->setEmailUsuario($_POST['emailUsuario']);
    $vo->setCpfUsuario($_POST['cpfUsuario']);
    $vo->setTelUsuario($_POST['telUsuario']);

    //Dados endereço
    $vo->setRua($_POST['ruaUsuario']);
    $vo->setBairro($_POST['bairroUsuario']);
    $vo->setCep($_POST['cepUsuario']);
    $vo->setNomeCidade($_POST['cidadeUsuario']);
    $vo->setSiglaEstado($_POST['estadoUsuario']);

    $ret = $ctrl->cadastrarUsuarioCTRL($vo);

    echo $ret;
} 
else if (isset($_POST['filtrarUsuario']))
{

    $usuarios_encontrados = $ctrl->FiltrarUsuarioCtrl($_POST['nome_filtro']);

    if (count($usuarios_encontrados) == 0) {
        echo 0;
    } else {
?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>

                <?php $situacao = '';
                foreach ($usuarios_encontrados as $usuarios) {

                    $situacao = $usuarios['status_usuario'];

                ?>
                    <tr>
                        <td><?= $usuarios['nome_usuario'] ?></td>
                        <td><?= Util::MostrarTipoUsuario($usuarios['tipo_usuario']) ?></td>
                        <td>
                            <div class="custom-control custom-switch custom-switch-<?= $situacao == 1 ? 'on' : 'off' ?>-danger custom-switch-<?= $situacao == 1 ? 'off' : 'on' ?>-success">
                                <input onclick="alterarStatusUsuario('<?= $usuarios['id_usuario'] ?>', '<?= $usuarios['status_usuario'] ?>')" type="checkbox" class="custom-control-input" id="customSwitch<?= $usuarios['id_usuario'] ?>">
                                <label class="custom-control-label" for="customSwitch<?= $usuarios['id_usuario'] ?>"><?= $situacao == 1 ? 'Ativo' : 'Inativo' ?></label>
                            </div>
                        </td>
                        <td>
                            <a href="alterar_usuario.php?cod=<?= $usuarios['id_usuario'] ?>" class="btn btn-warning btn-sm">Alterar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

<?php

    }
} else if (isset($_POST['alterarStatusUsuario'])) {

    $vo = new UsuarioVO();

    $vo->setIdUsuario($_POST['id_usuario']);
    $vo->setStatusUsuario($_POST['status_usuario']);
    echo $ctrl->AlterarStatusUsuarioCtrl($vo);
} else if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $dados = $ctrl->DetalharUsuarioCtrl($_GET['cod']);

    if (!is_array($dados) || empty($dados)) {
        Util::ChamarPagina('gerenciar_consultar_usuario');
    }

    if ($dados['tipo_usuario'] == USUARIO_FUNC) {
        $setores = (new SetorCTRL)->ConsultarSetorCTRL();
    }
} else if (isset($_POST['btn_alterar'])) {

    switch ($_POST['tipoUsuario']) {

        case USUARIO_ADM:
            $vo = new UsuarioVO();
            break;

        case USUARIO_TEC:
            $vo = new TecnicoVO();
            $vo->setNomeEmpresa($_POST['empresaTec']);
            break;

        case USUARIO_FUNC:
            $vo = new FuncionarioVO();
            $vo->setIdSetor($_POST['setorFunc']);
            break;
    }

    //Dados em comum
    $vo->setIdUsuario($_POST['idUsuario']);
    $vo->setTipoUsuario($_POST['tipoUsuario']);
    $vo->setNomeUsuario($_POST['nomeUsuario']);
    $vo->setEmailUsuario($_POST['emailUsuario']);
    $vo->setCpfUsuario($_POST['cpfUsuario']);
    $vo->setTelUsuario($_POST['telUsuario']);
    $vo->setRua($_POST['ruaUsuario']);
    $vo->setBairro($_POST['bairroUsuario']);
    $vo->setCep($_POST['cepUsuario']);
    $vo->setNomeCidade($_POST['cidadeUsuario']);
    $vo->setSiglaEstado($_POST['estadoUsuario']);
    $vo->setIdEndereco($_POST['idEndereco']);

    $ret = $ctrl->alterarUsuarioCTRL($vo);

    echo $ret;
} else if (isset($_POST['btn_logar'])) {

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $ret = $ctrl->validarLoginCtrl($login, $senha);
}

?>