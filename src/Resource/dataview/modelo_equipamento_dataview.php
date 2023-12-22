<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

    use Src\VO\ModeloVO;
    use Src\Controller\ModeloEquipamentoCTRL;

    $vo = new ModeloVO();
    $ctrl = new ModeloEquipamentoCTRL();

    if(isset($_POST['btnCadastrar']))
    {         
        $vo->setNomeModelo($_POST['modelo']);

        $ret = $ctrl->cadastrarModeloCtrl($vo);

        if($_POST['btnCadastrar'] == 'ajx')
            echo $ret;    
    }
    else if(isset($_POST['btnAlterar']))
    {
        $vo->setNomeModelo($_POST['modelo_alterar']);

        $vo->setIdModelo($_POST['id_alterar']);

        $ret = $ctrl->alterarModeloEquipamentoCtrl($vo);

        if($_POST['btnAlterar'] == 'ajx')
            echo $ret;          

    }
    else if(isset($_POST['btnExcluir']))
    {
        $vo->setIdModelo($_POST['id_excluir']);

        $ret = $ctrl->ExcluirModeloEquipamentoCTRL($vo);

        if($_POST['btnExcluir'] == 'ajx'){
            echo $ret;
        }
    }
    else if(isset($_POST['consultarModelo']))
    {

        $modelos = $ctrl->consultarModeloEquipamentoCtrl();

        ?>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i < count($modelos); $i++) { ?>
                    <tr>
                        <td><?=$modelos[$i]['nome_modelo']?></td>
                        <td>
                            <button
                                onclick="carregarModeloEquipamento('<?=$modelos[$i]['id_modelo']?>', '<?=$modelos[$i]['nome_modelo']?>')"
                                class="btn btn-sm btn-warning btn-xs" data-toggle="modal"
                                data-target="#alterar_modelo">Alterar</button>
                            <button data-toggle="modal" data-target="#modal_excluir"
                                onclick="carregarExcluir('<?=$modelos[$i]['id_modelo']?>', '<?=$modelos[$i]['nome_modelo']?>')"
                                class="btn btn-sm btn-danger btn-xs" name="btnExcluir">Excluir</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>


<?php } ?>