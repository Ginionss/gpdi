<?php 

include '../konek.php';
date_default_timezone_set('Asia/Jakarta');
?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>

           
								<h2 align = "center">LAPORAN DATA KELUARGA</h2>
									<table border="1" align="center">
										<thead>
											<tr>
												<th scope="col">No</th>
												<th>Nama</th>
									            <th>Status</th>
									            <th>TTL</th>
									            <th>Jenis Kelamin</th>
									            <th>Alamat</th>
                                            
											</tr>
										</thead>
										<tbody>
										<?php
                                        $tampil1 = "SELECT * FROM kepala_keluarga k join jemaat j where k.id_jemaat = j.id_jemaat ORDER BY id_kk ASC";
										 $query1 = mysqli_query($konek, $tampil1);
                                        while ($data1 = mysqli_fetch_array($query1, MYSQLI_BOTH)) {
                                           $id_kk = $data1['id_kk'];
                                           $nama_kk = $data1['nama']; ?>
                                        <tr>
                                            <td colspan="6"> <b>Kepala Keluarga :<?= $nama_kk ?></b></td>
                                        </tr>

                                 <?php   $no = 1;
                                    $tampil = "SELECT * FROM anggota_keluarga a join jemaat j where a.id_jemaat = j.id_jemaat and a.id_kk = '$id_kk'";
                                    $query = mysqli_query($konek, $tampil);
                                    while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                        $id_jemaat = $data['id_jemaat'];
                                        $kolom1 = $data['nama'];
                                        $kolom2 = $data['status_ak'];
                                        $tempat = $data['tempat_lahir'];
                                        $tanggal = $data['tanggal_lahir'];
                                        $tanggal_lahir = date("d-F-Y", strtotime($tanggal));
                                        $kolom3 = $tempat.",".$tanggal_lahir;
                                        $kolom4 = $data['jenis_kelamin'];
                                        $kolom5 = $data['alamat'];
                                    ?>
									<tr>
										<td><?php echo $no++;?></td>
										<td><?php echo $kolom1; ?></td>
										<td><?php echo $kolom2; ?></td>
										<td><?php echo $kolom3; ?></td>
										<td><?php echo $kolom4; ?></td>
										<td><?php echo $kolom5; ?></td>
									</tr>
								<?php }
								}
								?>
										</tbody>
									</table>
								
        <!-- <script>
            window.print();
        </script> -->