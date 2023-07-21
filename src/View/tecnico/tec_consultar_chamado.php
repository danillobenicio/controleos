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
                            <h1>Meus Chamados</h1>
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

                        <form role="form" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tipo">Situação</label>
                                    <select class="form-control" style="width: 100%;">
                                        <option selected="selected">Selecione</option>
                                        <option>Alaska</option>
                                    </select>
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
                                <h3 class="card-title">Meus Chamados</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Data Abertura</th>
                                            <th>Funcionário</th>
                                            <th>Equipamento</th>
                                            <th>Problema</th>
                                            <th>Data Atendimento</th>
                                            <th>Técnico</th>
                                            <th>Data Encerramento</th>
                                            <th>Laudo</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>John Doe</td>
                                            <td>John Doe</td>
                                            <td>John Doe</td>
                                            <td>John Doe</td>
                                            <td>John Doe</td>
                                            <td>John Doe</td>
                                            <td>John Doe</td>
                                            <td>
                                                <a href="#" class="btn btn-xs btn-secondary btn-xs">Ver mais</a>
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