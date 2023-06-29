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
                            <h1>Novo Usuário</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Início</a></li>
                                <li class="breadcrumb-item active">Novo Usuário</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card">
                    <div class="card-dark">
                        <div class="card-header">
                            <h3 class="card-title">Cadastrar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" method="POST">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <select class="form-control" style="width: 100%;">
                                                <option selected="selected" value="">Selecione</option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Técnico</option>
                                                <option value="3">Funcionário</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Setor</label>
                                            <select class="form-control" style="width: 100%;">
                                                <option selected="selected">Selecione</option>
                                                <option>Alaska</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="nome">Nome</label>
                                        <input type="text" class="form-control" id="nome" placeholder="Nome">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="sobrenome">Sobrenome</label>
                                        <input type="text" class="form-control" id="sobrenome" placeholder="Sobrenomee">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-8">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email">
                                    </div>
                                    <div class="form-group col-4">
                                        <label for="telefone">Telefone</label>
                                        <input type="text" class="form-control" id="telefone" placeholder="Telefone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="endereco">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" placeholder="Endereço">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-dark">Cadastrar</button>
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