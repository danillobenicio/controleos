<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

    use Src\VO\SetorVO;
    use Src\Controller\SetorCTRL;

    $ctrl = new SetorCTRL();
    $vo = new SetorVO();

    if(isset($_POST['btnCadastrar']))
    {
               
        $vo->setNomeSetor($_POST['setor']);

        $ret = $ctrl->cadastrarSetorCtrl($vo);

        if ($_POST['btnCadastrar'] == 'ajx')
            echo $ret;
    }
    else if(isset($_POST['btnAlterar']))
    {
        $vo->setNomeSetor($_POST['setor_alterar']);
        $vo->setIdSetor($_POST['id_alterar']);

        $ret = $ctrl->alterarSetorCtrl($vo);

        if($_POST['btnAlterar'] == 'ajx')
            echo $ret;
    }
    else if (isset($_POST['btnExcluir']))
    {
        $vo->setIdSetor($_POST['id_excluir']);
        $ret = $ctrl->excluirSetorCtrl($vo);

        if($_POST['btnExcluir'] == 'ajx')
            echo $ret;
    }
    else if(isset($_POST['consultar_setor']))
    {
        $setores =  $ctrl->consultarSetorCtrl();

        if ($_POST['tipo_tela'] == 'tipoSetor') { ?>

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
                        <button onclick="carregarSetor('<?=$setores[$i]['id_setor']?>', '<?=$setores[$i]['nome_setor']?>')"
                            data-toggle="modal" data-target="#alterar_setor" class="btn btn-warning btn-xs">Alterar</button>
                        <button onclick="carregarExcluir('<?=$setores[$i]['id_setor']?>', '<?=$setores[$i]['nome_setor']?>')"
                            class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_excluir">Excluir</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
            <select class="form-control obg" style="width: 100%;">
                <option value="">Selecione</option>
                <?php foreach($setores as $setor) { ?>
                    <option value="<?=$setor['id_setor']?>"><?=$setor['nome_setor']?></option>
                <?php } ?>                     
            </select>
        <?php } ?>
<?php }  ?>