<?php
    include_once dirname(__DIR__, 2) . '/Resource/dataview/tipo_equipamento_dataview.php';
?>
<!DOCTYPE html>
<html>

<head>
  <?php
    include_once PATH . 'Template/_includes/_head.php';
  ?>
</head>

<body class="hold-transition sidebar-mini">
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
              <h1>Tipo de Equipamento</h1>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="card form-cadastro">
          <div class="card-dark">
            <form id="formCad" method="POST" action="gerenciar_tipo_equipamento.php">
              <div class="card-body">
                <div class="form-group">
                  <label for="tipo">Cadastrar Tipo</label>
                  <input type="text" class="form-control obg" id="tipo" name="tipo" placeholder="Tipo de Equipamento">
                </div>
              </div>
              <div class="card-footer">
                <button type="button" onclick="return CadastrarTipoEquipamento('formCad')"
                  class="btn btn-sm btn-primary" id="btnCadastrar" name="btnCadastrar">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>

        <div class="card form-consulta">
          <div class="card-light">
            <div class="row">
              <div class="col-12">
                <div class="card-header">
                  <h3 class="card-title">Tipos Cadastrados</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right"
                        placeholder="Pesquisar por">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body table-responsive p-0" id="tableResult">

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <form id="formAlt" method="post" action="gerenciar_tipo_equipamento.php">
        <?php include_once 'modais/modal_alterar_tipo_equipamento.php'; ?>
        <?php include_once 'modais/modal_excluir.php'; ?>
      </form>
    </div>
    <?php
        include_once PATH . 'Template/_includes/_footer.php';
    ?>
  </div>
  <?php  
    include_once PATH . 'Template/_includes/_scripts.php';
    include_once PATH . 'Template/_includes/_msg.php';
  ?>

  <script src="../../Resource/ajax/tipo_equipamento_ajax.js"></script>
  <script>
    ConsultarTipoEquipamento();
    KeyPressEnter('tipo', 'btnCadastrar');
    KeyPressEnter('tipo_alterar', 'btnAlterar');
  </script>
</body>

</html>