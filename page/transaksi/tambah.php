<script type="text/javascript">
    function sum() {
        var jumlah_kiloan = document.getElementById('jumlah_kiloan').value;
        var total = parseInt(jumlah_kiloan)*7000;

        if (!isNaN(total)) {
            document.getElementById('nominal').value = total;
        }
    }
</script>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
              <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                
                
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal</label>
                    <input type="date" class="form-control" name="tgl_transaksi" required>
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nominal</label>
                    <input type="number" class="form-control" name="nominal">
                  </div>

                     <div class="form-group">
                        <label>Catatan</label>
                        <textarea class="form-control" rows="6" placeholder="Masukan Catatan Anda" name="catatan" required></textarea>
                      </div>  
                  <br>
                  <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                  <a href="?page=transaksi" class="btn btn-warning">Kembali</a>
                </div>
           

<?php
    if (isset($_POST['simpan'])) {
        $tgl_transaksi = $_POST['tgl_transaksi'];
        $nominal = $_POST['nominal'];
        $catatan = $_POST['catatan'];

        $sql = $koneksi->query("INSERT INTO tb_transaksi(kd_user, tgl_transaksi, pengeluaran, catatan, keterangan)values('$id_user','$tgl_transaksi','$nominal','$catatan','pengeluaran')");

        if ($sql) {
            ?>
    
                <script type="text/javascript">
                    alert ("Data Berhasil Disimpan");
                    window.location.href="?page=transaksi";
                </script>
                <?php
            }
        
    }
    

?>