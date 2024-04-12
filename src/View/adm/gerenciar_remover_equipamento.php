<?php
    include_once dirname(__DIR__, 3) . '/vendor/autoload.php';
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
                <div class="card form-consulta">
                    <div class="card-light">
                        <div class="card-header">
                            <h3 class="card-title">Pesquisar</h3>
                        </div>

                        <form role="form" method="post">
                        <input type="hidden" value="tela_remover" id="tela">
                            <div class="card-body">
                                <div class="form-group">
                                <label>Setores</label>
                                        
                                    <select class="form-control obg" style="width: 100%;" name="setor" id="resultSetor" onchange="consultarEquipamentosAlocados(this.value)">
                                        
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card form-consulta" id="divResultado" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-header">
                                <h3 class="card-title">Equipamentos Alocados</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover" id="resultTable">
                                    
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
            <?php include_once 'modais/modal_excluir.php'; ?>
        <?php
        include_once PATH . 'Template/_includes/_footer.php'
    ?>
    </div>
    <?php  
    include_once PATH . 'Template/_includes/_scripts.php';
    ?>
    <script src="../../Resource/ajax/novo_setor_ajax.js"></script>
    <script src="../../Resource/ajax/equipamento_ajax.js"></script>
    <script>
        consultarSetor(); 
    </script>
</body>

</html>