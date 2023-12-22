<?php
    include_once dirname(__DIR__, 2) . '/Resource/dataview/novo_setor_dataview.php';

?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include_once PATH . 'Template/_includes/_head.php';
  ?>
</head>

<body class="hold-transition sidebar-mini">
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
                            <h1>Setor</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card form-cadastro">
                    <div class="card-dark">
                        <form id="formCad" method="post" action="gerenciar_novo_setor.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tipo">Cadastrar Setor</label>
                                    <input type="text" class="form-control obg" id="setor" name="setor" placeholder="Setor">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" onclick="return cadastrarNovoSetor('formCad')" class="btn btn-sm btn-primary"
                                    name="btnCadastrar" id="btnCadastrar">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card form-consulta">
                    <div class="card-light">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-header">
                                    <h3 class="card-title">Setores Cadastrados</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="hidden" id="tipoTela" name="tipoTela" value="tipoSetor">
                                            <input type="text" name="table_search" class="form-control float-right"
                                                placeholder="Pesquisar por">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i
                                                        class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0" id="resultSetor">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <form method="post" action="gerenciar_novo_setor.php" id="formAlt">
                <?php include_once 'modais/modal_alterar_setor.php'; ?>
                <?php include_once 'modais/modal_excluir.php'; ?>
            </form>
        </div>

        <?php
        include_once PATH . 'Template/_includes/_footer.php';
    ?>
    </div>

    <?php  
    include_once PATH . 'Template/_includes/_scripts.php';
    include_once PATH . 'Template/_includes/_msg.php';
  ?>
    <script src="../../Resource/ajax/novo_setor_ajax.js"></script>
    <script type="text/javascript">
        consultarSetor();
        keyPressEnter('setor', 'btnCadastrar');
        keyPressEnter('setor_alterar', 'btnAlterar')
    </script>
</body>

</html>