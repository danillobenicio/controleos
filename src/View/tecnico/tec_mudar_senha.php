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
                            <h1>Senha</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card form-cadastro">
                    <div class="card-light">
                        <div class="card-header">
                            <h3 class="card-title">Mudar Senha</h3>
                        </div>

                        <form role="form" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="nome">Senha Atual</label>
                                        <input type="password" class="form-control" id="nome" placeholder="Nome">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="email">Nova Senha</label>
                                        <input type="password" class="form-control" id="email" placeholder="Email">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="telefone">Repetir Senha</label>
                                        <input type="password" class="form-control" id="telefone"
                                            placeholder="Telefone">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-success">Alterar</button>
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
     ?>
</body>

</html>