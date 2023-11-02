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
                            <h1>Usuário</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card form-cadastro">
                    <form role="form" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="inputTypeUser">Escolha o tipo de usuário</label>
                                        <select class="form-control" id="tipo" name="tipo" style="width: 100%;" onchange="CarregarTipoUsuario(this.value)">
                                            <option selected="selected" value="">Selecione</option>
                                            <option value="1">Administrador</option>
                                            <option value="2">Funcionário</option>
                                            <option value="3">Técnico</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="dadosUsuario" style="display: none;">
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>Nome</label>
                                        <input type="text" class="form-control obg" id="nome" name="nome"
                                            placeholder="Nome completo">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control obg" id="email" name="email"
                                            placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control obg" id="telefone" name="telefone"
                                            placeholder="Telefone">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>CPF</label>
                                        <input type="text" class="form-control obg" id="cpf" name="cpf" placeholder="CPF">
                                    </div>
                                </div>
                            </div>
                            <div id="dadosFuncionario" style="display: none;">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Setor</label>
                                        <select class="form-control obg" id="resultSetor" name="setor" style="width: 100%;">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div id="dadosTecnico" style="display: none;">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Empresa</label>
                                        <select class="form-control obg" id="empresa" name="empresa" style="width: 100%;">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div id="dadosEndereco" style="display: none;">
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label for="inputStreetUser">Cep</label>
                                        <input type="text" class="form-control" id="cep" name="cep"
                                            placeholder="Rua, xxx">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="inputCityUser">Rua</label>
                                            <input type="text" class="form-control" name="rua" id="rua"
                                                placeholder="Digite o nome da rua">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="inputStateUser">Bairro</label>
                                            <input type="text" class="form-control" name="bairro" id="bairro"
                                                placeholder="Digite o nome do bairro">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="inputStreetUser">Cidade</label>
                                        <input type="text" disabled class="form-control" id="cidade" name="cidade"
                                            placeholder="Campo Automático">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="inputCityUser">Estado</label>
                                            <input type="text" disabled class="form-control" name="estado" id="estado"
                                                placeholder="Campo Automático">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer" id="button" style="display: none;">
                            <button type="submit" class="btn btn-sm btn-success">Cadastrar</button>
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