<?php
    include_once dirname(__DIR__, 2) . '/Resource/dataview/equipamento_dataview.php';

    // Varável que armazena o estado da tela
    $label = isset($equipamento) ? 'Alterar' : 'Novo';

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
                            <h3 class="card-title"><?= $label ?> Equipamento</h3>
                        </div>
                        <form id="formCad" method="post" action="equipamento.php">
                        <input type="hidden" id="id_tipo" name="id_tipo" value="<?php echo isset($equipamento) ? $equipamento['fk_id_tipo'] : ''; ?>">
                        <input type="hidden" id="id_modelo" name="id_modelo" value="<?php echo isset($equipamento) ? $equipamento['fk_id_modelo'] : ''; ?>">
                        <input type="hidden" id="id_equipamento" name="id_equipamento" value="<?php echo isset($equipamento) ? $equipamento['id_equipamento'] : ''; ?>">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" id="resultTipos">
                                        <label>Tipo</label>
                                         <select class="form-control obg" style="width: 100%;" name="tipo" id="tipo">
                                         
                                         </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="resultModelos">
                                        <label>Modelo</label>
                                        <select class="form-control obg" style="width: 100%;" name="modelo" id="modelo">
                                        
                                        </select>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="identificacao">Identificação</label>
                                    <input type="text" class="form-control obg" id="identificacao"
                                    placeholder="Identificação" name="identificacao" value="<?=isset($equipamento) ? $equipamento['identificacao'] : ''?>">
                                </div>
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea class="form-control" id="descricao" rows="2"
                                        placeholder="Descrição" name="descricao"><?= isset($equipamento) ? $equipamento['descricao'] : '' ?></textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="button" onclick="return gravarEquipamento('formCad')" class="btn btn-sm btn-success" name="btnCadastrar"><?= $label == 'Novo' ? 'Cadastrar' : 'Alterar' ?></button>
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
        include_once PATH . 'Template/_includes/_msg.php';
     ?>
     <script src="../../Resource/ajax/equipamento_ajax.js"></script>
     <script>
        carregarTipos();
        carregarModelos();
     </script>                                               
</body>

</html>