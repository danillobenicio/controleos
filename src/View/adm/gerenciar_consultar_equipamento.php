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
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tipo">Tipo</label>
                                    <input type="text" class="form-control" id="tipo" placeholder="Tipo de Equipamento">
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
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Modelo</th>
                                            <th>Identificação</th>
                                            <th>Descrição</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for($i = 0; $i < count($equipamentos); $i++) { ?>
                                        <tr>
                                            <td><?=$equipamentos[$i]['tipo']?></td>
                                            <td><?=$equipamentos[$i]['modelo']?></td>
                                            <td><?=$equipamentos[$i]['identificacao']?></td>
                                            <td><?=$equipamentos[$i]['descricao']?></td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-xs">Alterar</a>
                                                <a href="#" class="btn btn-danger btn-xs">Excluir</a>
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