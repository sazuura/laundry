<div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Transaksi Laundry</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="?page=laundry&aksi=tambah" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah data</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Jenis Laundry</th>
                    <th>Tanggal Terima</th>
                    <th>Tanggal Selesai</th>
                    <th>Total Bayar</th>
                    <th>Catatan</th>
                    <th>Status</th>
                    <th>Kasir</th>
                    
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      $sql = $koneksi->query("SELECT * FROM tb_laundry
                                              JOIN tb_pelanggan ON tb_laundry.id_pelanggan = tb_pelanggan.kd_pelanggan
                                              JOIN tb_user ON tb_laundry.kd_user = tb_user.id
                                              JOIN tb_jenis ON tb_laundry.kd_jenis = tb_jenis.kd_jenis");
                      
                      while ($data = $sql->fetch_assoc()) {
                          // Lakukan sesuatu dengan data yang diambil dari query
                          // Misalnya, cetak data atau manipulasi sesuai kebutuhan
                      
                      

                    
                    ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['jenis_laundry'] ?></td>
                    <td><?php echo $data['tanggal_terima'] ?></td>
                    <td><?php echo $data['tanggal_selesai'] ?></td>
                    <td><?php echo $data['totalbayar'] ?></td>
                    <td><?php echo $data['catatan'] ?></td>
                    <td><?php echo $data['status'] ?></td>
                    <td><?php echo $data['nama_user'] ?></td>
                    <td>
                        <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="?page=laundry&aksi=hapus&id=<?php echo $data['id_laundry']; ?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i></a>
                    <?php 
                    if ($data['status']=="Belum Lunas") {
                       
                       
                       ?>&nbsp;

<a href="?page=laundry&aksi=lunas&id=<?php echo $data['id_laundry'];?>" class="btn btn-success" title=""><i class="fa fa-money"></i>Lunaskan</a>&nbsp;
                    <?php } ?>
                    
                    <a target="blank" href="page/laundry/cetak.php?id=<?php echo $data['id_laundry'];?>" class="btn btn-default" title=""><i class="fa fa-print"></i></a>
                    
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