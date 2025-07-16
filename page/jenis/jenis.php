<?php if ($_SESSION['admin']) {?>
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="?page=jenis&aksi=tambah" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah data</a>
                <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Layanan Laundry</th>
                  <th>Lama Proses</th>
                  <th>Tarif (Satuan / Per Kg)</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              // menampilkan data jenis laundry              
              $result = mysqli_query($koneksi, "SELECT * FROM tb_jenis"); ?>
              <?php $i = 1; ?>
              <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $row['jenis_laundry']; ?></td>
                  <td><?= $row['lama_proses']; ?> Hari</td>
                  <td>Rp. <?= number_format($row['tarif']); ?></td>
                  <td>
                    <a href="?page=jenis&aksi=ubah&id=<?= $row['kd_jenis']; ?>" class="btn btn-warning mb-2"><i class="fa fa-tags"></i></a>
                    <br>
                    <a href="?page=jenis&aksi=hapus&id=<?= $row['kd_jenis']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus ?');"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php $i++; ?>
              <?php endwhile; ?>
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
    <!-- end page title end breadcrumb -->
  </div>
  <!-- container -->
</div>
<?php } ?>