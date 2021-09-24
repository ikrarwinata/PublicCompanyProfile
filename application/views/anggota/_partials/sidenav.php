  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="assets/img/logo.png" alt="#" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ISS Indonesia</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/img/avatar-admin.png" class="img-circle elevation-2" alt="#">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo str_sentence($this->session->userdata("Nama")) ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="Home" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt text-info"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="anggota/Anggota/profil" class="nav-link">
              <i class="nav-icon fas fa-info text-purple"></i>
              <p>Profil</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list text-success"></i>
              <p>
                Agenda Kegiatan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="anggota/Agenda/semua" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Semua Agenda</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="anggota/Agenda/terlewati" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Agenda Telah Lewat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="anggota/Agenda/akandatang" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Agenda Akan Datang</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header"><?php echo str_sentence($this->session->userdata("Level")) ?></li>

          <li class="nav-item">
            <a href="#" data-toggle="modal" data-target="#modal-password" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Ubah Password</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="logout" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>