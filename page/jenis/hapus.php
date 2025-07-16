<?php 

// menangkap nilai id dari url
$id = $_GET['id'];
// mengambil data dari tb_jenis berdasarkan id
$query = mysqli_query($koneksi, "SELECT * FROM tb_jenis WHERE kd_jenis = $id");
$data = mysqli_fetch_assoc($query);
$jenis_laundry = $data['jenis_laundry'];

// menghapus data jenis laundry
$result = mysqli_query($koneksi, "DELETE FROM tb_jenis WHERE kd_jenis = $id");

if ($result) {
  echo "
  <script>
    alert('Data dengan Jenis $jenis_laundry berhasil dihapus');
    window.location.href = '?page=jenis';
  </script>
";
}

?>