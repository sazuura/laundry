<div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Transaksi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="?page=transaksi&aksi=tambah" class="btn btn-primary" style="margin-bottom: 10px;"><i class="fa fa-plus"></i> Tambah data</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>Keterangan</th>
                    <th>Catatan</th>
                    <th>Kasir</th>
                    <th>Pemasukan</th>
                    <th>Pengeluaran</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $no = 1;
                        $sql = $koneksi->query("SELECT * FROM tb_transaksi, tb_user where tb_transaksi.kd_user=tb_user.id");
                        while ($data = $sql->fetch_assoc()) {

                    
                    ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['tgl_transaksi'] ?></td>
                    <td><?php echo $data['keterangan'] ?></td>
                    <td><?php echo $data['catatan'] ?></td>
                    <td><?php echo $data['nama_user'] ?></td>
                    <td><?php echo number_format($data['pemasukan']) ?></td>
                    <td><?php echo number_format($data['pengeluaran']) ?></td>
                    
                  </tr>
                <?php
                $masuk = $masuk+$data['pemasukan'];
                $keluar = $keluar+$data['pengeluaran'];
                $saldo = $masuk-$keluar;
             }
              ?>
                  </tbody>
                  <tr>
                    <th colspan="5" style="text-align: center;">Total Pemasukan dan Pengeluaran</th>
                    <td><?php echo number_format($masuk) ?></td>
                    <td><?php echo number_format($keluar) ?></td>
                  </tr>
                  <tr>
                    <th colspan="5" style="text-align: center;">Saldo Akhir</th>
                    <td colspan="2"><?php echo number_format($saldo) ?></td>
                  </tr>
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