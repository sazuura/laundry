<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center>
    <a href="#" class="brand-link">
      <img src="images/logo.png" alt="laundry Logo" width="120" height="120">
      <br>
      <span class="brand-text font-weight-light">Salma Laundry</span>
    </a>
    </center>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <br>
          <!-- SidebarSearch Form -->
          <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

              <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <?php if ($_SESSION['admin']) {?>
              <li class="nav-item">
                <a href="?page=jenis" class="nav-link">
                <i class="nav-icon fas fa-mouse-pointer"></i>
                  <p>Jenis Layanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=pengguna" class="nav-link">
                <i class="nav-icon fa fa-user"></i>
                  <p>Data Pengguna</p>
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a href="?page=pelanggan" class="nav-link">
                  <i class="nav-icon fa fa-users"></i>
                  <p>Data Pelanggan</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="?page=laundry" class="nav-link">
                <i class="fa fa-dollar-sign nav-icon"></i>
                  <p>Transaksi Laundry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=transaksi" class="nav-link">
                
                <i class="fas fa-file-invoice-dollar nav-icon"></i>
                  <p>Laporan</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="logout.php" class="nav-link" onclick="return confirm('Apakah anda ingin logout ?');">
              <i class="fas fa-sign-out-alt nav-icon"></i>
                  <p>Keluar</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>