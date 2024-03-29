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
                  <label for="tipo">Cadastrar</label>
                  <input type="text" class="form-control obg" id="tipo" name="tipo" placeholder="Tipo de Equipamento">
                </div>
              </div>
              <div class="card-footer">
                <button type="button" onclick="return cadastrarTipoEquipamento('formCad')"
                  class="btn btn-sm btn-primary" id="btnCadastrar">Cadastrar</button>
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
    consultarTipoEquipamento();
    keyPressEnter('tipo', 'btnCadastrar');
    keyPressEnter('tipo_alterar', 'btnAlterar');
  </script>
</body>

</html>