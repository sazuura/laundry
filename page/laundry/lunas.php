<?php 

    $id = $_GET['id'];

    $sql = $koneksi->query("SELECT * FROM tb_laundry where id_laundry='$id'");
    $data = $sql->fetch_assoc();

    $tanggal = $data['tanggal_terima'];
    $totalbayar = $data['totalbayar'];
    $catatan = $data['catatan'];

    $kd_user = $data['kd_user'];

    $sql2 = $koneksi->query("INSERT INTO tb_transaksi (kd_user, tgl_transaksi, pemasukan, catatan, keterangan)values('$kd_user','$tanggal','$totalbayar','$catatan','pemasukan')");

    $sql2 = $koneksi->query("UPDATE tb_laundry set status='Lunas' where id_laundry = '$id'");

    if ($sql2) {
        ?>

        <script type="text/javascript">
            alert ("Pembayaran Lunas");
            window.location.href="?page=laundry";
        </script>
        <?php
    }
?>