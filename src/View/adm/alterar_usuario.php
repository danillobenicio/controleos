<?php
    include_once dirname(__DIR__, 2) . '/Resource/dataview/usuario_dataview.php';
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
                            <h1>Alterar Usuário</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="card form-cadastro">
                    <form role="form" method="POST" id="formCad">
                        <div class="card-body">

                            <div id="dadosUsuario">
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                       <label>Nome</label>
                                        <input type="text" class="form-control obg" id="nome" name="nome"
                                            placeholder="Nome completo" value="<?= $dados['nome_usuario']?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control obg" id="email" name="email"
                                            placeholder="E-mail" value="<?=$dados['email_usuario']?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control obg cel num" id="telefone" name="telefone"
                                            placeholder="Telefone" value="<?=$dados['tel_usuario']?>">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>CPF</label>
                                        <input type="text" class="form-control obg cpf num" id="cpf" name="cpf"
                                            placeholder="CPF" value="<?=$dados['cpf_usuario']?>">
                                    </div>
                                </div>
                            </div>
                            <?php if($dados['tipo_usuario'] == USUARIO_FUNC) { ?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Setor</label>
                                            <select class="form-control" id="resultSetor" name="setor"
                                                style="width: 100%;">
                                                <?php foreach($setores as $setor) { ?>
                                                    <option value="<?=$setor['id_setor']?>" <?=$setor['id_setor'] == $dados['fk_id_setor'] ? 'selected' : '' ?> ><?=$setor['nome_setor']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if ($dados['tipo_usuario'] == USUARIO_TEC) { ?>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Empresa</label>
                                            <input type="text" class="form-control" id="empresa" name="empresa"
                                                placeholder="Empresa" value="<?=$dados['nome_empresa']?>">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label>Cep</label>
                                        <input type="text" class="form-control obg cep num" id="cep" name="cep"
                                            placeholder="Cep" value="<?=$dados['cep']?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Rua</label>
                                            <input type="text" class="form-control obg" name="rua" id="rua"
                                                placeholder="Rua" value="<?=$dados['rua']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Bairro</label>
                                            <input type="text" class="form-control obg" name="bairro" id="bairro"
                                                placeholder="Bairro" value="<?=$dados['bairro']?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control obg" id="cidade" name="cidade"
                                            placeholder="Campo Automático" value="<?=$dados['nome_cidade']?>">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Estado</label>
                                            <input type="text" class="form-control obg" name="estado"
                                                id="estado" placeholder="Campo Automático" value="<?=$dados['sigla']?>">
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer" id="button" style="display: none;">
                            <button type="button" onclick="CadastrarUsuario('formCad')" class="btn btn-sm btn-success">Cadastrar</button>
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
        validarCpf();
        checarEmail();
    </script>
</body>

</html>