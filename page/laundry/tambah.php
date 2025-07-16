<script>
  // menghitung total bayar
  function sum(){
    var jmlKilo = document.getElementById('jml_kiloan').value;
    var tarif = document.getElementById('tarif').value;

    // jml kilo * tarif
    var total = parseInt(jmlKilo)*tarif;

    // memeriksa apakan parameter numerik
    if(!isNaN(total)){
      document.getElementById('totalbayar').value = total;
    }else{
      document.getElementById('totalbayar').value = '';
    }
  }

  function jenis(){
    // mengambil data dari id=id_jenis
    var id = $("#id_jenis").val();

    $.ajax({
      // mengirim data idjenis ke file autofill.php
      url: "page/laundry/autofill.php",
      data: 'idjenis='+id,
      success: function (data){
        var json = data,
        obj = JSON.parse(json);
        // jika sukses mengirim balik
        if (obj.sukses) {
          // auto mengisi data pada id = tarif
          $('#tarif').val(obj.sukses.tarif);
          // auto mengisi data pada id = tanggal_selesai
          $('#tanggal_selesai').val(obj.sukses.tanggal_selesai);
          $('#jml_kiloan').val('');
          $('#totalbayar').val('');
        }else if(obj.gagal){
          $('#tarif').val('');
          $('#tanggal_selesai').val('');
          $('#jml_kiloan').val('');
          $('#totalbayar').val('');
        }
      }
    })
  }
        
</script>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Transaksi Laundry</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
              <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nama Pelanggan</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="pelanggan" required>

                    <option value="">-Pilih Pelanggan-</option>
                    <?php 
                        $sql = $koneksi->query("SELECT * FROM tb_pelanggan");

                        while ($data=$sql->fetch_assoc()) {
                            echo "
                            <option value='$data[kd_pelanggan]'>$data[nama]</option>
                            ";
                        }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                <label for="example-text-input">Jenis Laundry</label>
                <select class="form-control select2bs4" style="width: 100%;" required name="id_jenis" id="id_jenis" onchange="jenis();">
                  <option>--Pilih jenis---</option>
                  <?php 
                  $query = mysqli_query($koneksi, "SELECT * FROM tb_jenis");
                  while ($result = mysqli_fetch_assoc($query)) :
                  if ($result['kd_jenis'] == $jenis) { ?>
                    <option value="<?= $result['kd_jenis']; ?>" selected><?= $result['jenis_laundry']; ?></option>
                  <?php }else{ ?>
                    <option value="<?= $result['kd_jenis']; ?>"><?= $result['jenis_laundry']; ?></option>
                  <?php } ?>
                  <?php endwhile; ?>
                  </select>
                </div>

                <div class="form-group">
                <label for="example-text-input">Tarif (Hari)</label>
                  <input class="form-control" type="text" id="tarif" name="tarif" value="<?= $tarif; ?>" required readonly/>
                </div>
              

              <div class="form-group">
                <label for="example-text-input">Tanggal Selesai</label>
                  <input class="form-control" type="text" id="tanggal_selesai" name="tanggal_selesai" value="<?= $tanggal_selesai; ?>" required readonly />
                
              </div>

              <div class="form-group">
                <label for="example-number-input">Jumlah (Kg)</label>
                  <!-- onkeyup = bereaksi ketika diketik -->
                  <input class="form-control" type="number" id="jml_kiloan" name="jml_kiloan" value="<?= $jml_kiloan; ?>" onkeyup="sum();" required/>
              </div>

              <div class="form-group">
                <label for="example-number-input">Total Bayar</label>
                  <input class="form-control"type="number" value="<?= $totalbayar; ?>" id="totalbayar" name="totalbayar" readonly required/>
                </div>

                  <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="status" required>

                    <option value="">-Pilih Status-</option>
                    <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>


                  </select>
                </div>


                     <div class="form-group">
                        <label>Catatan</label>
                        <textarea class="form-control" rows="6" placeholder="Masukan Catatan Anda" name="catatan" required></textarea>
                      </div>  
                  <br>
                  <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                  <a href="?page=laundry" class="btn btn-warning">Kembali</a>
                </div>
           

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    if (isset($_POST['simpan'])) {
        $pelanggan = $_POST['pelanggan'];
        $tanggal_terima = date('Y-m-d');
        $tanggal_selesai = $_POST['tanggal_selesai'];
        $jml_kiloan = $_POST['jml_kiloan'];
        $tarif = $_POST['tarif'];
        $totalbayar = $_POST['totalbayar'];
        $status = $_POST['status'];
        $catatan = $_POST['catatan'];
        $jenis = $_POST['id_jenis'];

        $sql = $koneksi->query("INSERT INTO tb_laundry (id_pelanggan, kd_user, tanggal_terima, tanggal_selesai, jml_kiloan, totalbayar, status, catatan, kd_jenis) VALUES ('$pelanggan','$id_user','$tanggal_terima','$tanggal_selesai','$jml_kiloan','$totalbayar','$status','$catatan','$jenis')");


        if ($sql) {
            ?>

            <script type="text/javascript">
                alert ("Data Berhasil Disimpan");
                window.location.href="?page=laundry";
            </script>
            <?php
        }
        if ($status=="Lunas") {
            $sql = $koneksi->query("INSERT INTO tb_transaksi (kd_user, tgl_transaksi, pemasukan, catatan, keterangan)values('$id_user','$tanggal_selesai','$totalbayar','$catatan','pemasukan')");

            if ($sql) {
                ?>
    
                <script type="text/javascript">
                    alert ("Data Berhasil Disimpan");
                    window.location.href="?page=laundry";
                </script>
                <?php
            }
        }
    }
    

?>

