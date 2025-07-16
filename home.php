<?php 

$sql = $koneksi->query("SELECT * FROM tb_user");
$pengguna = $sql->num_rows;

$sql2 = $koneksi->query("SELECT * FROM tb_pelanggan");
$pelanggan = $sql2->num_rows;

$sql3 = $koneksi->query("SELECT * FROM tb_laundry");
$laundry = $sql3->num_rows;

$sql4 = $koneksi->query("SELECT * FROM tb_transaksi");
$transaksi = $sql->num_rows;

$sql5 = $koneksi->query("SELECT * FROM tb_jenis ");
$jenis = $sql->num_rows;

?>

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pengguna</span>
                <span class="info-box-number"><?php echo $pengguna; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fa fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pelanggan</span>
                <span class="info-box-number"><?php echo $pelanggan; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="fa fa-wallet"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Transaksi Laundry</span>
                <span class="info-box-number"><?php echo $laundry; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger"><i class="fa fa-coins"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Laporan</span>
                <span class="info-box-number"><?php echo $transaksi; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        <!-- /.row -->
          </div>
          <!-- ./col -->
        </div>