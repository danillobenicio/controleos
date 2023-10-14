<?php
    include_once dirname(__DIR__, 2) . '/Resource/dataview/alocar_dataview.php';
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
                            <h1>Alocar</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card form-cadastro">
                    <div class="card-light">
                        <div class="card-header">
                            <h3 class="card-title">Alocar Equipamento</h3>
                        </div>
                        <form id="formCad" method="post" action="gerenciar_alocar_equipamento.php">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Equipamento</label>
                                            <select class="form-control obg" style="width: 100%;" name="equipamento" id="resultEquipamentos">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Setor</label>
                                            <input type="hidden" id="tipoTela" name="tipoTela" value="tipoAlocar">
                                            <select class="form-control obg" style="width: 100%;" name="setor" id="resultSetor">
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button onclick="return AlocarEquipamento('formCad')" type="button" class="btn btn-sm btn-success" name="btnCadastrar">Alocar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <?php
        include_once PATH . 'Template/_includes/_footer.php'
    ?>
    </div>
    <?php 
        include_once PATH . 'Template/_includes/_scripts.php';
        include_once PATH . 'Template/_includes/_msg.php';
     ?>
     <script src="../../Resource/ajax/novo_setor_ajax.js"></script>
     <script src="../../Resource/ajax/equipamento_ajax.js"></script>
     <script type="text/javascript">
        CarregarEquipamentosNaoAlocados();
        ConsultarSetor();
    </script>
</body>

</html>