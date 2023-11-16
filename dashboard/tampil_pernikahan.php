<?php include '../konek.php'; 
$hak_akses = $_SESSION['hak_akses'];
if ($hak_akses == "Pemohon") {
	$id_pemohon = $_SESSION['nik'];
	$jekel = $_SESSION['password'];
	$tampil_nik = "SELECT * FROM jemaat where id_jemaat = '$id_pemohon'";
	$query1 = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query1, MYSQLI_BOTH);
	$nik_pemohon = $data['nik'];
}?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">Data Pernikahan</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add1" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Request</th>
									<th>Nama Mempelai</th>
									<th>Status</th>
									<th>Keterangan</th>
									<?php if ($hak_akses != "gembala") {?>
									<th style="width: 10%">Action</th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($hak_akses == "Pemohon") {
									$sql1 = "SELECT * FROM pernikahan b natural join jemaat j where b.nik_wanita = j.nik and b.nik_wanita = '$nik_pemohon'";
									$sql = "SELECT * FROM pernikahan b natural join jemaat j where b.nik_pria = j.nik and b.nik_pria = '$nik_pemohon'";
									if (isset($sql) && $jekel == "Laki-laki") {
										$sql1 = "SELECT * FROM pernikahan b natural join jemaat j where b.nik_wanita = j.nik";
									}elseif (isset($sql1)&& $jekel == "Perempuan"){
									$sql = "SELECT * FROM pernikahan b natural join jemaat j where b.nik_pria = j.nik";
									}
								}
								else {
									$sql1 = "SELECT * FROM pernikahan b natural join jemaat j where b.nik_wanita = j.nik";
									$sql = "SELECT * FROM pernikahan b natural join jemaat j where b.nik_pria = j.nik";
									
								}
								$query1 = mysqli_fetch_array(mysqli_query($konek, $sql1));
                                $nik_wanita = $query1['nik_wanita'];
                                $nama_wanita = $query1['nama'];

								$query = mysqli_query($konek, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$id_pernikahan = $data['id_pernikahan'];
                                    $no_surat = $data['no_surat'];
                                    $tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik_pria = $data['nik_pria'];
									$nama_pria = $data['nama'];
									$status = $data['status'];
									if (isset($data['tanggal_pernikahan'])) {
										$tanggal_pernikahan = $data['tanggal_pernikahan'];
										$format2 = date('d F Y', strtotime($tanggal_pernikahan));
									}else {							
										$format2 = "-";
									}
									if (isset($data['nama_pendeta'])) {
										$nama_pendeta = $data['nama_pendeta'];
									}else {							
										$nama_pendeta = "-";
									}
									if (isset($data['keterangan'])) {
										$keterangan = $data['keterangan'];
									}else {							
										$keterangan = "-";
									}

									if ($status == "3") {
										$status = "<b style='color:red'>Ditolak</b>";
									} elseif ($status == "2") {
										$status = "<b style='color:blue'>Selesai</b>";
									}elseif ($status == "1") {
										$status = "<b style='color:black'>Diproses</b>";
									}elseif ($status == "0") {
										$status = "<b style='color:black'>Verifikasi Data</b>";
									}
								?>
                                
									<tr>
										<td><?php echo $format; ?></td>
										<td><?php echo "1. ".$nama_pria ."<br>". "2. ".$nama_wanita; ?></td>
										<td><?php if ($status == "<b style='color:black'>Diproses</b>") {
											echo $status."<br>Tgl Pernikahan:".$format2 ."<br> Pendeta:". $nama_pendeta;
										} else {echo $status; } ?></td>
										<td><?php echo $keterangan; ?></td>
										<td>
											<?php if ($hak_akses != "gembala") {
											if ($hak_akses != "Pemohon") {?>
												<div class="form-button-action">
												<a href="?halaman=view_pernikahan&id_pernikahan=<?= $id_pernikahan; ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Verifikasi Data">
														<i class="fa fa-eye"></i>
													</button>
												</a>
											</div><?php 
											if ($status == "<b style='color:black'>Diproses</b>") {?>
												<div class="form-button-action">
												<a target="_blank" href="cetak_pernikahan.php?id_pernikahan=<?= $id_pernikahan; ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Unduh">
														<i class="fa fa-download"></i>
													</button>
												</a>
											</div>

											<?php }?>

											<?php }else { ?>
											<div class="form-button-action">
												<a href="?halaman=ubah_pernikahan&id_pernikahan=<?= $id_pernikahan; ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Permohonan">
														<i class="fa fa-edit"></i>
													</button>
												</a>
												<a href="?halaman=tampil_pernikahan&id_pernikahan=<?php echo $id_pernikahan; ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus Permohonan">
                                                        <i class="fa fa-times"></i>
                                                    </a>
											</div>
												
											<?php }
										 } ?>
											
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if (isset($_GET['id_pernikahan'])) {
    $sql_hapus = "DELETE FROM pernikahan WHERE id_pernikahan='" . $_GET['id_pernikahan'] . "'";
    $query_hapus = mysqli_query($konek, $sql_hapus);
    if ($query_hapus) {
        echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_pernikahan">';
    } else {
        echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_pernikahan">';
    }
}
?>