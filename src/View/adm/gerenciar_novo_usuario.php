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
                    <form role="form" method="POST" id="formCad">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="inputTypeUser">Escolha o tipo de usuário</label>
                                        <select class="form-control" id="tipo" name="tipo" style="width: 100%;" onchange="carregarTipoUsuario(this.value)">
                                            <option selected="selected" value="">Selecione</option>
                                            <option value="<?= USUARIO_ADM ?>">Administrador</option>
                                            <option value="<?= USUARIO_FUNC ?>">Funcionário</option>
                                            <option value="<?= USUARIO_TEC ?>">Técnico</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="dadosUsuario" style="display: none;">
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>Nome</label>
                                        <input type="text" class="form-control obg" id="nome" name="nome" placeholder="Nome completo">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control obg" id="email" name="email" placeholder="E-mail" onblur="verificarEmailDuplicado(this.value)">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control obg cel num" id="telefone" name="telefone" placeholder="Telefone">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>CPF</label>
                                        <input type="text" class="form-control obg cpf num" id="cpf" name="cpf" placeholder="CPF" onchange="verificarCpfDuplicado(this.value)">
                                    </div>
                                </div>
                            </div>
                            <div id="dadosFuncionario" style="display: none;">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Setor</label>
                                            <select class="form-control" id="resultSetor" name="setor" style="width: 100%;">
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
                                            <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Empresa">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="dadosEndereco" style="display: none;">
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label>Cep</label>
                                        <input type="text" class="form-control obg cep num" id="cep" name="cep" placeholder="Cep" onblur="pesquisaCep(this.value)">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Rua</label>
                                            <input type="text" class="form-control obg" name="rua" id="rua" placeholder="Rua">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Bairro</label>
                                            <input type="text" class="form-control obg" name="bairro" id="bairro" placeholder="Bairro">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>Cidade</label>
                                        <input type="text" disabled class="form-control obg" id="cidade" name="cidade" placeholder="Campo Automático">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input type="text" disabled class="form-control obg" name="estado" id="estado" placeholder="Campo Automático">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer" id="button" style="display: none;">
                            <button type="button" onclick="cadastrarUsuario('formCad')" class="btn btn-sm btn-success">Cadastrar</button>
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
    <script src="../../Resource/ajax/novo_setor_ajax.js"></script>
    <script src="../../Resource/js/buscar_cep.js"></script>
    <script src="../../Template/mask/jquery.mask.min.js"></script>
    <script src="../../Template/mask/mask.js"></script>
    <script src="../../Resource/ajax/usuario_ajax.js"></script>
    <script type="text/javascript">
        //mascarasInput();
        consultarSetor();
        //validarCpf();
    </script>
</body>

</html>