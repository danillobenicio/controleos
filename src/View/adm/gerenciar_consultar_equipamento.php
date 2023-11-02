<?php
    include_once dirname(__DIR__, 2) . '/Resource/dataview/equipamento_dataview.php';
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
                            <h1>Equipamento</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card form-cadastro">
                    <div class="card-light">
                        <div class="card-header">
                            <h3 class="card-title">Pesquisar</h3>
                        </div>
                        <form role="form" method="POST">
                            <input type="hidden" value="tela_excluir" id="tela">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Tipo</label>
                                            <select class="form-control obg" style="width: 100%;" name="tipo" id="tipo" onchange="FiltrarEquipamento()">
                                            </select>                       
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Modelo</label>
                                            <select class="form-control obg" style="width: 100%;" name="modelo" id="modelo" onchange="FiltrarEquipamento()">
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card form-consulta">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-header">
                                <h3 class="card-title">Equipamentos Cadastrados</h3>
                            </div>
                            <div class="card-body table-responsive p-0" id="resultTable">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <form id="formAlt" method="post" action="gerenciar_consultar_equipamento.php">
                    <?php 
                        include_once 'modais/modal_excluir.php';
                        include_once 'modais/modal_inativar.php';          
                    ?>
                </form>
                <?php include_once 'modais/modal_inativar_info.php'; ?>
            </section>
        </div>

        <?php
        include_once PATH . 'Template/_includes/_footer.php'
    ?>
    </div>
    <?php  
    include_once PATH . 'Template/_includes/_scripts.php';
  ?>
   <script src="../../Resource/ajax/equipamento_ajax.js"></script>
     <script>
        CarregarTipos();
        CarregarModelos();
        FiltrarEquipamento();
     </script>  
</body>

</html>