<?php 
    $kode = $_GET['id'];

    $sql = $koneksi->query("SELECT * FROM tb_pelanggan WHERE kd_pelanggan= '$kode'");

    $data = $sql->fetch_assoc();


?>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Data Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Pelanggan</label>
                    <input type="text" class="form-control" value="<?php echo $data['kd_pelanggan'];?>" name="kode" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" class="form-control"  value="<?php echo $data['nama'];?>" placeholder="Masukan Nama Anda" name="nama">
                  </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="6" placeholder="Masukan Alamat Anda" name="alamat"><?php echo $data['alamat'];?></textarea>
                      </div>
                
                    <div class="form-group">
                    <label for="exampleInputPassword1">No Telepon</label>
                    <input type="number" class="form-control" value="<?php echo $data['telepon'];?>" placeholder="Masukan Nomor Telepon Anda" name="telepon">
                  </div>

<br>
                  <button type="submit" name="simpan" class="btn btn-info">Ubah</button>
                  <a href="?page=pelanggan" class="btn btn-warning">Kembali</a>
                </div>
           

<?php
    if (isset($_POST['simpan'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        $sql2 = $koneksi->query("UPDATE tb_pelanggan set nama='$nama', alamat='$alamat', telepon='$telepon' where kd_pelanggan='$kode'");

        if ($sql2) {
            ?>

            <script type="text/javascript">
                alert ("Data Berhasil DiUbah");
                window.location.href="?page=pelanggan";
            </script>
            <?php
        }
    }

?>