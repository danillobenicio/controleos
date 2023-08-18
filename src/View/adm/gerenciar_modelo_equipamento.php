<?php
    include_once dirname(__DIR__, 2) . '/Resource/dataview/modelo_equipamento_dataview.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include_once PATH . 'Template/_includes/_head.php';
  ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php
        include_once PATH . 'Template/_includes/_topo.php';
        include_once PATH . 'Template/_includes/_menu.php';
    ?>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Modelo Equipamento</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card form-cadastro">
                    <div class="card-dark">

                        <form id="formCad" method="POST" action="gerenciar_modelo_equipamento.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tipo">Cadastrar Modelo</label>
                                    <input type="text" class="form-control obg" id="modelo" name="modelo"
                                        placeholder="Modelo">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button onclick="return ValidarCampos('formCad')" type="submit"
                                    class="btn btn-sm btn-primary" name="btnCadastrar">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card form-consulta">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-header">
                                <h3 class="card-title">Modelos Cadastrados</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
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
                                                <button onclick="CarregarModeloEquipamento('<?=$modelos[$i]['id_modelo']?>', '<?=$modelos[$i]['nome_modelo']?>')"
                                                    class="btn btn-sm btn-warning btn-xs" data-toggle="modal" data-target="#alterar_modelo">Alterar</button>
                                                <button data-toggle="modal" data-target="#modal_excluir" onclick="CarregarExcluir('<?=$modelos[$i]['id_modelo']?>', '<?=$modelos[$i]['nome_modelo']?>')" class="btn btn-sm btn-danger btn-xs" name="btnExcluir">Excluir</button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <form method="post" action="gerenciar_modelo_equipamento.php" id="formAlt">
                <?php include_once 'modais/modal_alterar_modelo.php'; ?>
                <?php include_once 'modais/modal_excluir.php'?>
            </form>
        </div>

        <?php
        include_once PATH . 'Template/_includes/_footer.php'
    ?>
    </div>
    <?php  
    include_once PATH . 'Template/_includes/_scripts.php';
    include_once PATH . 'Template/_includes/_msg.php';
  ?>
</body>

</html>