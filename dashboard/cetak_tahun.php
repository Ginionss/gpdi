<?php 

include '../konek.php';
date_default_timezone_set('Asia/Jakarta');
?>
<?php
	 if (isset($_GET['jenis_laporan'])) {
        $jenis_laporan = $_GET['jenis_laporan'];
		if ($jenis_laporan == "baptis") {
			$text = "BAPTIS";
		}else if ($jenis_laporan == "penyerahan") {
			$text = "PENYERAHAN ANAK";
		}else if ($jenis_laporan == "pernikahan") {
			$text = "PERNIKAHAN";
		}else if ($jenis_laporan == "jemaat_tetap") {
			$text = "JEMAAT TETAP";
		}else if ($jenis_laporan == "jemaat_sementara") {
			$text = "JEMAAT SEMANTARA";
		}
    }

    if (isset($_GET['tahun']) && $_GET['tahun'] != 0) {
		$tahun = $_GET['tahun'];
        $text2 = "TAHUN ". $tahun;
        if ($jenis_laporan == "baptis") {
			$sql = "SELECT * FROM baptis b natural join jemaat j where b.nik = j.nik and b.status = 2 and year(b.tanggal_baptis) = '$tahun' ORDER BY b.tanggal_baptis ASC";
			$query = mysqli_query($konek, $sql);
		}else if ($jenis_laporan == "penyerahan") {
			$sql = "SELECT * FROM penyerahan b natural join jemaat j where b.nik = j.nik and b.status = 2 and year(b.tanggal_penyerahan) = '$tahun'  ORDER BY b.tanggal_penyerahan ASC";
			$query = mysqli_query($konek, $sql);
		}else if ($jenis_laporan == "pernikahan") {
			$sql1 = "SELECT * FROM pernikahan b natural join jemaat j where b.nik_wanita = j.nik and b.status = 2 and year(b.tanggal_pernikahan) = '$tahun'";
			$sql = "SELECT * FROM pernikahan b natural join jemaat j where b.nik_pria = j.nik and b.status = 2 and year(b.tanggal_pernikahan) = '$tahun'";
			$query1 = mysqli_fetch_array(mysqli_query($konek, $sql1));
            $nik_wanita = $query1['nik_wanita'];
            $kolom3 = $query1['nama'];
			$query = mysqli_query($konek, $sql);
		}else if ($jenis_laporan == "jemaat_tetap") {
            $tampil = "SELECT * FROM jemaat where status_j > 0 and ket = 1 and year(tanggal_pendaftaran) = '$tahun' ORDER BY nama ASC";
            $query = mysqli_query($konek, $tampil);
		}else if ($jenis_laporan == "jemaat_sementara") {
            $tampil = "SELECT * FROM jemaat where status_j > 0 and ket = 0 and year(tanggal_pendaftaran) = '$tahun' ORDER BY nama ASC";
            $query = mysqli_query($konek, $tampil);
		}

    }else {
        $text2 ="";
        if ($jenis_laporan == "baptis") {
			$sql = "SELECT * FROM baptis b natural join jemaat j where b.nik = j.nik and b.status = 2  ORDER BY b.tanggal_baptis ASC";
			$query = mysqli_query($konek, $sql);
		}else if ($jenis_laporan == "penyerahan") {
			$sql = "SELECT * FROM penyerahan b natural join jemaat j where b.nik = j.nik and b.status = 2  ORDER BY b.tanggal_penyerahan ASC";
			$query = mysqli_query($konek, $sql);
		}else if ($jenis_laporan == "pernikahan") {
			$sql1 = "SELECT * FROM pernikahan b natural join jemaat j where b.nik_wanita = j.nik and b.status = 2";
			$sql = "SELECT * FROM pernikahan b natural join jemaat j where b.nik_pria = j.nik and b.status = 2 ";
			$query1 = mysqli_fetch_array(mysqli_query($konek, $sql1));
            $nik_wanita = $query1['nik_wanita'];
            $kolom3 = $query1['nama'];
			$query = mysqli_query($konek, $sql);
		}else if ($jenis_laporan == "jemaat_tetap") {
            $tampil = "SELECT * FROM jemaat where status_j > 0 and ket = 1 ORDER BY nama ASC";
            $query = mysqli_query($konek, $tampil);
		}else if ($jenis_laporan == "jemaat_sementara") {
            $tampil = "SELECT * FROM jemaat where status_j > 0 and ket = 0 ORDER BY nama ASC";
            $query = mysqli_query($konek, $tampil);
		}
    }

?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>

           
								<h2 align = "center">LAPORAN PERTAHUN <?= $text ." ".$text2 ?></h2>
									<table border="1" align="center">
										<thead>
											<tr>
												<th scope="col">No</th>
                                            <?php if ($jenis_laporan == "baptis") {?> 
												<th>Tanggal Baptis</th>
									            <th>Nama</th>
									            <th>Nama Ayah</th>
									            <th>Nama Ibu</th>
									            <th>Pendeta</th>
                                            <?php }else if ($jenis_laporan == "penyerahan") {?>
												<th>Tanggal Penyerahan Anak</th>
									            <th>Nama Anak</th>
									            <th>Nama Ayah</th>
									            <th>Nama Ibu</th>
									            <th>Pendeta</th>
                                            <?php    }else if ($jenis_laporan == "pernikahan") { ?>
												<th>Tanggal Pernikahan</th>
									            <th>Nama Mempelai Pria</th>
									            <th>Nama Mempelai Wanita</th>
									            <th>Pendeta</th>
                                                <th></th>
                                            <?php    }else if ($jenis_laporan == "jemaat_tetap") { ?>
												<th>Tanggal Pendaftaran</th>
									            <th>Nama</th>
									            <th>TTL</th>
									            <th>Jenis kelamin</th>
									            <th>Alamat</th>
                                            <?php    }else if ($jenis_laporan == "jemaat_sementara") { ?>
												<th>Tanggal Pendaftaran</th>
									            <th>Nama</th>
									            <th>TTL</th>
									            <th>Jenis kelamin</th>
									            <th>Alamat</th>
                                            <?php } ?>
											</tr>
										</thead>
										<tbody>
										<?php
								
                                $no=0;
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                    $no++;
                                    if ($jenis_laporan == "baptis") {
                                        $tanggal_baptis = $data['tanggal_baptis'];
                                        $kolom1 = date('d F Y', strtotime($tanggal_baptis));
                                        $kolom2 = $data['nama'];
                                        $kolom3 = $data['nama_ayah'];
                                        $kolom4 = $data['nama_ibu'];
                                        $kolom5 = $data['nama_pendeta'];
                                    }else if ($jenis_laporan == "penyerahan") {
                                        $tanggal_penyerahan = $data['tanggal_penyerahan'];
                                        $kolom1 = date('d F Y', strtotime($tanggal_penyerahan));
                                        $kolom2 = $data['nama'];
                                        $kolom3 = $data['nama_ayah'];
                                        $kolom4 = $data['nama_ibu'];
                                        $kolom5 = $data['nama_pendeta'];
                                    }else if ($jenis_laporan == "pernikahan") {
                                        $tanggal_pernikahan = $data['tanggal_pernikahan'];
                                        $kolom1 = date('d F Y', strtotime($tanggal_pernikahan));
                                        $kolom2 = $data['nama'];
                                        $kolom4 = $data['nama_pendeta'];
                                        $kolom5 = "";                                        
                                    }else if ($jenis_laporan == "jemaat_tetap") {
                                        $tanggal_pendaftaran = $data['tanggal_pendaftaran'];;
                                        $kolom1 = date('d F Y', strtotime($tanggal_pendaftaran));
                                        $kolom2 = $data['nama'];
                                        $tempat = $data['tempat_lahir'];
                                        $tanggal = $data['tanggal_lahir'];
                                        $tanggal_lahir = date("d-F-Y", strtotime($tanggal));
                                        $kolom3 = $tempat.",".$tanggal_lahir;
                                        $kolom4 = $data['jenis_kelamin'];
                                        $kolom5 = $data['alamat'];
                                    }else if ($jenis_laporan == "jemaat_sementara") {
                                        $tanggal_pendaftaran = $data['tanggal_pendaftaran'];;
                                        $kolom1 = date('d F Y', strtotime($tanggal_pendaftaran));
                                        $kolom2 = $data['nama'];
                                        $tempat = $data['tempat_lahir'];
                                        $tanggal = $data['tanggal_lahir'];
                                        $tanggal_lahir = date("d-F-Y", strtotime($tanggal));
                                        $kolom3 = $tempat.",".$tanggal_lahir;
                                        $kolom4 = $data['jenis_kelamin'];
                                        $kolom5 = $data['alamat'];
                                    }
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $kolom1; ?></td>
										<td><?php echo $kolom2; ?></td>
										<td><?php echo $kolom3; ?></td>
										<td><?php echo $kolom4; ?></td>
										<td><?php echo $kolom5; ?></td>
									</tr>
								<?php 
								}
								?>
										</tbody>
									</table>
								
        <script>
            window.print();
        </script>