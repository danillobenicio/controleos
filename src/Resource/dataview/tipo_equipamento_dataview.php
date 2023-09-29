<?php

    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';
    use Src\VO\TipoVO;
    use Src\Controller\TipoEquipamentoCTRL;

    $ctrl = new TipoEquipamentoCTRL();
    $vo = new TipoVO();

    if(isset($_POST['btnCadastrar']))
    {
      
       //Setar as informações de acordo preenchimento dos campos
       $vo->setNomeTipo($_POST['tipo']);
       
       //Chama a função da Controller
       $ret = $ctrl->CadastrarTipoEquipamentoCTRL($vo);

       if($_POST['btnCadastrar'] == 'ajx')
       {
        echo $ret;
       }

    }
    else if(isset($_POST['btnAlterar']))
    {
        $vo->setNomeTipo($_POST['tipo_alterar']);
        $vo->setIdTipo($_POST['id_alterar']);

        $ret = $ctrl->AlterarTipoEquipamentoCTRL($vo);

        if($_POST['btnAlterar'] == 'ajx')
       {
        echo $ret;
       }
    }
    else if(isset($_POST['btnExcluir']))
    {
        $vo->setIdTipo($_POST['id_excluir']);
        //$vo->setNomeTipo($_POST['nome_alterar']);
        $ret = $ctrl->ExcluirTipoEquipamentoCTRL($vo);

        if(isset($_POST['btnExcluir'])){
            echo $ret;
        }
       

    }
    else if(isset($_POST['consultarTipo']))
    {
        $tipos_equipamento = $ctrl->ConsultarTipoEquipamentoCtrl();
       ?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Tipo do Equipamento</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < count($tipos_equipamento); $i++) { ?>
        <tr>
            <td><?=$tipos_equipamento[$i]['nome_tipo']?></td>
            <td>
                <button
                    onclick="CarregarTipoEquipamento('<?=$tipos_equipamento[$i]['id_tipo']?>', '<?=$tipos_equipamento[$i]['nome_tipo']?>')"
                    data-toggle="modal" data-target="#alterar_tipo" class="btn btn-warning btn-xs">Alterar</button>
                <button
                    onclick="CarregarExcluir('<?=$tipos_equipamento[$i]['id_tipo']?>', '<?=$tipos_equipamento[$i]['nome_tipo']?>')"
                    data-toggle="modal" data-target="#modal_excluir" class="btn btn-danger btn-xs">Excluir</button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php } ?>