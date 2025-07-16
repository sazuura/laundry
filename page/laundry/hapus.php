<?php

$kode = $_GET['id'];

$sql = $koneksi->query("DELETE FROM tb_laundry WHERE id_laundry= '$kode'");

if ($sql) {
    ?>
            <script type="text/javascript">
                alert ("Data Berhasil Dihapus");
                window.location.href="?page=laundry";
            </script>
            <?php
}


?>