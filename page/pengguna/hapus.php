<?php

$id = $_GET['id'];

$sql = $koneksi->query("DELETE FROM tb_user WHERE id= '$id'");

if ($sql) {
    ?>
            <script type="text/javascript">
                alert ("Data Berhasil Dihapus");
                window.location.href="?page=pengguna";
            </script>
            <?php
}


?>