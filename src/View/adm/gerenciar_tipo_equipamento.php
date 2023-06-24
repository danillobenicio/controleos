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
              <h1>Tipo de Equipamento</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Início</a></li>
                <li class="breadcrumb-item active">Tipo de Equipamento</li>
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
                <div class="form-group">
                  <label for="tipo">Tipo de Equipamento</label>
                  <input type="text" class="form-control" id="tipo" placeholder="Tipo de Equipamento">
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-outline-dark">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>

        <div class="card">
          <div class="card-dark">
            <div class="row">
              <div class="col-12">
                <div class="card-header">
                  <h3 class="card-title">Consultas</h3>

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
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Tipo do Equipamento</th>
                        <th>Ação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>John Doe</td>
                        <td>
                          <a href="#" class="btn btn-warning btn-xs">Alterar</a>
                          <a href="#" class="btn btn-danger btn-xs">Excluir</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <!-- /.card -->
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