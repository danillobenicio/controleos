<?php

  include_once dirname(__DIR__, 3) . '/vendor/autoload.php';

  use Src\_Public\Util;


  if (isset($_GET['close']) && $_GET['close'] == 1) {
    Util::deslogar();
  }

?>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="../../Template/dist/img/service-desk.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Control OS</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../Template/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"> <?php echo  Util::nomeLogado(); ?> </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link nav-link-principal">
            <i class="fa-solid fa-toolbox"></i>
            <p>
              Equipamentos
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
              <a href="../../View/adm/equipamento.php" class="nav-link">
                <p>Equipamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../View/adm/gerenciar_tipo_equipamento.php" class="nav-link">
                <p>Tipo Equipamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../View/adm/gerenciar_modelo_equipamento.php" class="nav-link">
                <p>Modelo Equipamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../View/adm/gerenciar_novo_setor.php" class="nav-link">
                <p>Setor</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../View/adm/gerenciar_alocar_equipamento.php" class="nav-link">
                <p>Alocar Equipamento</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../View/adm/gerenciar_consultar_equipamento.php" class="nav-link">
                <p>Consultar Equipamento</p>
              </a>
            </li>   
            <li class="nav-item">
              <a href="../../View/adm/gerenciar_remover_equipamento.php" class="nav-link">
                <p>Remover Equipamento</p>
              </a>
            </li>
            
          </ul>
        </li>
      </ul>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link nav-link-principal">
            <i class="fa-solid fa-user"></i>
            <p>
              Usuário
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="../../View/adm/gerenciar_novo_usuario.php" class="nav-link">
                <i class="fa-regular fa-circle"></i>
                <p>Cadastrar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../../View/adm/gerenciar_consultar_usuario.php" class="nav-link">
                <i class="fa-regular fa-circle"></i>
                <p>Consultar</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <a href="../../Template/_includes/_menu.php?close=1" class="nav-link">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <p>Sair</p>
              </a>
            </li>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>





