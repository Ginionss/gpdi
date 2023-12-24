<?php include '../konek.php'; 

$hak_akses = $_SESSION['hak_akses'];
if ($hak_akses == "Pemohon") {
	$nik_pemohon = $_SESSION['nik'];
	$jekel = $_SESSION['password'];
}
?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">Data Penyerahan Anak</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add1" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Request</th>
									<th>Nama</th>
									<th>Nama Orang Tua</th>
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
									$cek1 = "SELECT * FROM jemaat where id_jemaat = '$nik_pemohon'";
									$query1 = mysqli_fetch_array(mysqli_query($konek, $cek1));
									$nama_a = $query1['nama'];
									if ($jekel == "Laki-laki") {
										$sql = "SELECT * FROM penyerahan b natural join jemaat j where b.nik = j.nik and b.nama_ayah = '$nama_a'";
									}elseif ($jekel == "Perempuan"){
									$sql = "SELECT * FROM penyerahan b natural join jemaat j where b.nik = j.nik and b.nama_ibu = '$nama_a'";
									}
								}else {
									$sql = "SELECT * FROM penyerahan b natural join jemaat j where b.nik= j.nik ORDER BY b.tanggal_request DESC";
								}
								$query = mysqli_query($konek, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$id_penyerahan = $data['id_penyerahan'];
                                    $no_surat = $data['no_surat'];
                                    $tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik = $data['nik'];
									$nama = $data['nama'];
									$nama_ayah = $data['nama_ayah'];
									$nama_ibu = $data['nama_ibu'];
									$status = $data['status'];
									$file_surat = $data['file_surat'];
									
									if (isset($data['tanggal_penyerahan'])) {
										$tanggal_penyerahan = $data['tanggal_penyerahan'];
										$format2 = date('d F Y', strtotime($tanggal_penyerahan));
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
										<td><?php echo $nama; ?></td>
										<td><?php echo "Ayah: ".$nama_ayah ."<br>Ibu: ". $nama_ibu; ?></td>
										<td><?php if ($status == "<b style='color:black'>Diproses</b>") {
											echo $status."<br>Tgl Penyerahan:".$format2 ."<br> Pendeta:". $nama_pendeta;
										} else {echo $status; } ?></td>
										<td><?php echo $keterangan; ?></td>
										<td>
											<?php  if ($hak_akses != "gembala") {
											if ($hak_akses != "Pemohon") {
												if ($status == "<b style='color:black'>Verifikasi Data</b>") {
												?>
												<div class="form-button-action">
												<a href="?halaman=view_penyerahan&id_penyerahan=<?= $id_penyerahan; ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Verifikasi Data">
														<i class="fa fa-eye"></i>
													</button>
												</a>
											</div>
											<?php }
											else if ($status == "<b style='color:black'>Diproses</b>") {?>
												<div class="form-button-action">
												<a href="?halaman=view_penyerahan&id_penyerahan=<?= $id_penyerahan; ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Verifikasi Data">
														<i class="fa fa-eye"></i>
													</button>
												</a>
											</div>
												<div class="form-button-action">
												<a target="_blank" href="cetak_penyerahan.php?id_penyerahan=<?= $id_penyerahan; ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Unduh">
														<i class="fa fa-download"></i>
													</button>
												</a>
											</div>
											<?php }
											else if ($status == "<b style='color:blue'>Selesai</b>") {?>
												<div class="form-button-action">
												<a href="?halaman=upload_surat&id_surat=<?= $id_penyerahan; ?>&jenis=penyerahan">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Upload">
														<i class="fa fa-upload"></i>
													</button>
												</a>
											</div>
											<?php }?>
											<?php }else { ?>
											<div class="form-button-action">
												<?php if ($status == "<b style='color:black'>Verifikasi Data</b>") {  ?>
												<a href="?halaman=ubah_penyerahan&id_penyerahan=<?= $id_penyerahan; ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Permohonan">
														<i class="fa fa-edit"></i>
													</button>
												</a>
												<a href="?halaman=tampil_penyerahan&id_penyerahan=<?php echo $id_penyerahan; ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus Permohonan">
                                                        <i class="fa fa-times"></i>
                                                    </a>
												<?php }
											else if ($status == "<b style='color:blue'>Selesai</b>") {?>
												<a target="_blank" href="../dataFile/surat_keluar/<?= $file_surat ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Unduh">
														<i class="fa fa-download"></i>
													</button>
												</a>
											<?php }?>
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
if (isset($_GET['id_penyerahan'])) {
    $sql_hapus = "DELETE FROM penyerahan WHERE id_penyerahan='" . $_GET['id_penyerahan'] . "'";
    $query_hapus = mysqli_query($konek, $sql_hapus);
    if ($query_hapus) {
        echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_penyerahan">';
    } else {
        echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_penyerahan">';
    }
}
?>