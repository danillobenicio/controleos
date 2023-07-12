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
                            <h1>Cadastrar Usuário</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card form-cadastro">
                    <form role="form" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="inputNameUser">Nome</label>
                                    <input type="text" class="form-control" id="inputNameUser" name="nameUser"
                                        placeholder="Nome Completo">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="inputTypeUser">Tipo</label>
                                        <select class="form-control" id="inputTypeUser" name="typeUser"
                                            style="width: 100%;">
                                            <option selected="selected" value="">Selecione</option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Técnico</option>
                                            <option value="3">Funcionário</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="inputSectorUser">Setor</label>
                                        <select class="form-control" id="inputSectorUser" name="sectorUser"
                                            style="width: 100%;">
                                            <option selected="selected" value="">Selecione</option>
                                            <option value="">Alaska</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-8 col-sm-12">
                                    <label for="inputEmailUser">E-mail</label>
                                    <input type="email" class="form-control" id="inputEmailUser" name="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group col-md-4 col-sm-12">
                                    <label for="inputPhoneUser">Telefone</label>
                                    <input type="text" class="form-control" id="inputPhoneUser" name="phone"
                                        placeholder="Telefone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label for="inputStreetUser">Endereço</label>
                                    <input type="text" class="form-control" id="inputStreetUser" name="street" placeholder="Rua, xxx">
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="inputCityUser">Cidade</label>
                                        <select class="form-control" id="inputCityUser" name="city"
                                            style="width: 100%;">
                                            <option selected="selected" value="">Selecione</option>
                                            <option value="">Alaska</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="inputStateUser">Estado</label>
                                        <select class="form-control" id="inputStateUser" name="state"
                                            style="width: 100%;">
                                            <option selected="selected" value="">Selecione</option>
                                            <option value="">Alaska</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-dark">Cadastrar</button>
                        </div>
                    </form>
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