<?php 
    $id = $_GET['id'];

    $sql = $koneksi->query("SELECT * FROM tb_user WHERE id= '$id'");

    $data = $sql->fetch_assoc();


?>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Data Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $data['username']?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" class="form-control" name="nama_user" value="<?php echo $data['nama_user']?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" value="<?php echo $data['password']?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                      <div class="custom-file">
                        <label><img src="images/<?php echo $data['foto']?>" width="100" height="100" alt=""></label>
                      </div>
                    </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Ganti Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" value="<?php echo $data['foto']?>" >
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
        
        $foto = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];

   

        if (!empty($lokasi)) {
            move_uploaded_file($lokasi, "images/".$foto); 

        $sql2 = $koneksi->query("UPDATE tb_user set username='$username', nama_user='$nama_user', password='$password', foto='$foto' where id='$id'");

        if ($sql2) {
            ?>

            <script type="text/javascript">
                alert ("Data Berhasil DiUbah");
                window.location.href="?page=pengguna";
            </script>
            <?php
        }
    }else{
        $sql2 = $koneksi->query("UPDATE tb_user set username='$username', nama_user='$nama_user', password='$password' where id='$id'");

        if ($sql2) {
            ?>

            <script type="text/javascript">
                alert ("Data Berhasil DiUbah");
                window.location.href="?page=pengguna";
            </script>
            <?php
        }
    }
    }       
?>