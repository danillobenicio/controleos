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
                            <h1>Consultar Usuário</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card form-consulta">
                    <div class="row">
                        <div class="col-12">
                            <br>
                                <div class="input-group mb-3 col-md-12 col-sm-12">
                                    <input type="text" class="form-control" placeholder="Pesquisar usuário" id="nome_filtro" onkeyup="FiltrarUsuario()">
                                    <div class="input-group-append">
                                        <button class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover" id="tableResult">

                                </table>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card -->
                        </div>
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
  ?>
  <script src="../../Resource/ajax/usuario_ajax.js"></script>
</body>

</html>