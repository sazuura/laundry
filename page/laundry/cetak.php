<?php 

include "../../include/koneksi.php";
                       $id = $_GET['id'];
                        $sql = $koneksi->query("SELECT * FROM tb_laundry, tb_pelanggan, tb_user where tb_laundry.id_pelanggan=tb_pelanggan.kd_pelanggan and tb_laundry.kd_user=tb_user.id");
                        
                        $data = $sql->fetch_assoc();

                    
                    ?>

                    <script>
window.print();
window.onfocus=function() {window.close();}



                    </script>
<body onload="window.print()">
    

                    <table>
                        <tbody>
                            <tr>
                                <td>Laundry Wash</td>
                            </tr>
                            <tr>
                                <td>Jl Barunagri No. 33</td>
                            </tr>
                            <tr>
                                <td>Telepon 089524001692</td>
                            </tr>
                            
                        </tbody>
                    </table>

                    <hr width="30%" align="left">

                    <table>
                        <tbody>
                            <tr>
                                <td>Kasir</td>
                                <td>:</td>
                                <td><?php echo $data['nama_user'] ?></td>
                            </tr>
                            <tr>
                                <td>Pelanggan</td>
                                <td>:</td>
                                <td><?php echo $data['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Terima</td>
                                <td>:</td>
                                <td><?php echo $data['tanggal_terima'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Selesai</td>
                                <td>:</td>
                                <td><?php echo $data['tanggal_selesai'] ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Kiloan</td>
                                <td>:</td>
                                <td><?php echo $data['jumlah_kiloan'] ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>:</td>
                                <td><?php echo $data['nominal'] ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><?php echo $data['status'] ?></td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td>:</td>
                                <td><?php echo $data['catatan'] ?></td>
                            </tr>
                        </tbody>
                    </table>

<br><br>
                    <table>
                        <tbody>
                            <tr>
                                <td>Catatan :</td>
                            </tr>
                            <tr>
                                <td>Barang lebih dari 3 bulan tidak diambil bukan tanggung jawab Laundry</td>
                            </tr>
                        </tbody>
                    </table>
                    </body>