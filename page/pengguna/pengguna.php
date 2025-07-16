<?php if ($_SESSION['admin']) {?>
  <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="?page=pengguna&aksi=tambah" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah data</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $no = 1;
                        $sql = $koneksi->query("SELECT * FROM tb_user");
                        while ($data = $sql->fetch_assoc()) {

                    
                    ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['nama_user'] ?></td>
                    <td><?php echo $data['level'] ?></td>
                    <td><img src="images/<?php echo $data['foto'] ?>" width="100" height="100"></td>
                    <td>
                        <a href="?page=pengguna&aksi=ubah&id=<?php echo $data['id']; ?>" class="btn btn-warning" title=""><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=pengguna&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i></a>

                    </td>
                  </tr>
                <?php } ?>
                  </tbody>
                  <tfoot>

                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <?php } ?>