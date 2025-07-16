
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" class="form-control"  placeholder="Masukan Nama Anda" name="nama_user" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control"  placeholder="Masukan Nama Anda" name="password" required>
                  </div>
                  <div class="form-group">
                  <label for="">Jabatan</label>
                  <select name="level" class="form-control">
                    <option value='admin' selected>Admin</option>
                    <option value='kasir'>Kasir</option>
                  </select>
                  <br>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  <br>
                  <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                  <a href="?page=pengguna" class="btn btn-warning">Kembali</a>
                </div>
           

<?php
    if (isset($_POST['simpan'])) {
        $username = $_POST['username'];
        $nama_user = $_POST['nama_user'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $foto = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];

        $upload = move_uploaded_file($lokasi, "images/".$foto);

        if ($upload) {
           
        $sql = $koneksi->query("INSERT INTO tb_user (username, nama_user, password, level, foto)values('$username','$nama_user','$password','$level','$foto')");

        if ($sql) {
            ?>

            <script type="text/javascript">
                alert ("Data Berhasil Disimpan");
                window.location.href="?page=pengguna";
            </script>
            <?php
        }
    }
    
}
?>