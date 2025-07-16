<?php 

    $sql = $koneksi->query("SELECT kd_pelanggan FROM tb_pelanggan ORDER BY kd_pelanggan desc");

    $data = $sql->fetch_assoc();

    $kd_pelanggan = $data['kd_pelanggan'];

    $urut = substr($kd_pelanggan, 4, 4);

    $tambah = (int) $urut+1;

    if (strlen($tambah) == 1 ){
        $format="PLG-"."000".$tambah;
    }else if (strlen($tambah) == 2 ){
        $format="PLG-"."00".$tambah;
    }else if (strlen($tambah) == 3 ){
        $format="PLG-"."0".$tambah;
    }else{
        $format="PLG-".$tambah;
    }
?>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Pelanggan</label>
                    <input type="text" class="form-control" value="<?php echo $format?>" name="kode" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" class="form-control"  placeholder="Masukan Nama Anda" name="nama" required>
                  </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="6" placeholder="Masukan Alamat Anda" name="alamat" required></textarea>
                      </div>
                
                    <div class="form-group">
                    <label for="exampleInputPassword1">No Telepon</label>
                    <input type="number" class="form-control"  placeholder="Masukan Nomor Telepon Anda" name="telepon" required>
                  
                    
                    </div>
                  <br>
                  <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                  <a href="?page=pelanggan" class="btn btn-warning">Kembali</a>
                </div>
           

<?php
    if (isset($_POST['simpan'])) {
        $kode = $_POST['kode'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        $sql = $koneksi->query("INSERT INTO tb_pelanggan (kd_pelanggan, nama, alamat, telepon)values('$kode','$nama','$alamat','$telepon')");

        if ($sql) {
            ?>

            <script type="text/javascript">
                alert ("Data Berhasil Disimpan");
                window.location.href="?page=pelanggan";
            </script>
            <?php
        }
    }
    

?>