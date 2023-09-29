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
                                <button type="button" onclick="return CadastrarModelo('formCad')"
                                    class="btn btn-sm btn-primary" id="btnCadastrar" name="btnCadastrar">Cadastrar</button>
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
                            <div class="card-body table-responsive p-0" id="tableResult">
                                
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

<script src="../../Resource/ajax/modelo_equipamento_ajax.js"></script>
<script>
    ConsultarModeloEquipamento();
    KeyPressEnter('modelo', 'btnCadastrar');
    KeyPressEnter('modelo_alterar', 'btnAlterar');
</script>
</body>

</html>