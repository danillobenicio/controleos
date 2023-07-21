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
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tipo">Setor</label>
                                    <input type="text" class="form-control" id="tipo" placeholder="Setor">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-success">Pesquisar</button>
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
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Equipamento</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-xs">Remover</a>
                                            </td>
                                        </tr>
                                    </tbody>
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
</body>

</html>