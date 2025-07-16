<div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="?page=pelanggan&aksi=tambah" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah data</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Pelanggan</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $no = 1;
                        $sql = $koneksi->query("SELECT * FROM tb_pelanggan");
                        while ($data = $sql->fetch_assoc()) {

                    
                    ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['kd_pelanggan'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['telepon'] ?></td>
                    <td>
                        <a href="?page=pelanggan&aksi=ubah&id=<?php echo $data['kd_pelanggan'];?>" class="btn btn-warning" title=""><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=pelanggan&aksi=hapus&id=<?php echo $data['kd_pelanggan']; ?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i></a>
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