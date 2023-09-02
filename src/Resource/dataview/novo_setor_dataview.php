<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

    use Src\VO\SetorVO;
    use Src\Controller\SetorCTRL;

    $ctrl = new SetorCTRL();
    $vo = new SetorVO();

    if(isset($_POST['btnCadastrar']))
    {
               
        $vo->setNomeSetor($_POST['setor']);

        $ret = $ctrl->CadastrarSetor($vo);

        if ($_POST['btnCadastrar'] == 'ajx')
            echo $ret;
    }
    else if(isset($_POST['btnAlterar']))
    {
        $vo->setNomeSetor($_POST['setor_alterar']);
        $vo->setIdSetor($_POST['id_alterar']);

        $ret = $ctrl->AlterarSetorCTRL($vo);

        if($_POST['btnAlterar'] == 'ajx')
        {
            echo $ret;
        }
    }
    else if (isset($_POST['btnExcluir']))
    {
        $vo->setIdSetor($_POST['id_excluir']);
        $ret = $ctrl->ExcluirSetorCTRL($vo);

        if($_POST['btnExcluir'] == 'ajx'){
            echo $ret;
        }

    }
    else if(isset($_POST['consultar_setor']))
    {
        $setores =  $ctrl->ConsultarSetorCTRL();

        ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Setor</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i < count($setores); $i++) { ?>
                    <tr>
                        <td><?=$setores[$i]['nome_setor']?></td>
                        <td>
                            <button onclick="CarregarSetor('<?=$setores[$i]['id_setor']?>', '<?=$setores[$i]['nome_setor']?>')"
                                data-toggle="modal" data-target="#alterar_setor" class="btn btn-warning btn-xs">Alterar</button>
                            <button onclick="CarregarExcluir('<?=$setores[$i]['id_setor']?>', '<?=$setores[$i]['nome_setor']?>')"
                                class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_excluir">Excluir</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

<?php } ?>
