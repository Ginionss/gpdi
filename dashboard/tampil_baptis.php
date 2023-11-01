<?php include '../konek.php'; 

$hak_akses = $_SESSION['hak_akses'];
if ($hak_akses == "Pemohon") {
	$nik_pemohon = $_SESSION['nik'];
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
						<h4 class="card-title">Data Baptis</h4>
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
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if ($hak_akses == "Pemohon") {
									$sql = "SELECT * FROM baptis b natural join jemaat j  where b.nik = j.nik AND j.nik = '$nik_pemohon'";
								}else {
									$sql = "SELECT * FROM baptis b natural join jemaat j where b.nik = j.nik";
								}
								$query = mysqli_query($konek, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$id_baptis = $data['id_baptis'];
                                    $tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik = $data['nik'];
									$nama = $data['nama'];
									$nama_ayah = $data['nama_ayah'];
									$nama_ibu = $data['nama_ibu'];
									$status = $data['status'];
									
									if (isset($data['tanggal_baptis'])) {
										$tanggal_baptis = $data['tanggal_baptis'];
										$format2 = date('d F Y', strtotime($tanggal_baptis));
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
											echo $status."<br>Tgl Baptis:".$format2 ."<br> Pendeta:". $nama_pendeta;
										} else {echo $status; } ?></td>
										<td><?php echo $keterangan; ?></td>
										<td>
											<?php 
											if ($hak_akses != "Pemohon") {?>
												<div class="form-button-action">
												<a href="?halaman=view_baptis&id_baptis=<?= $id_baptis; ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Verifikasi Data">
														<i class="fa fa-edit"></i>
													</button>
												</a>
											</div>

											<?php }else { ?>
											<div class="form-button-action">
												<a href="?halaman=ubah_baptis&id_baptis=<?= $id_baptis; ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Permohonan">
														<i class="fa fa-edit"></i>
													</button>
												</a>
												<a href="?halaman=tampil_baptis&id_baptis=<?php echo $id_baptis; ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus Permohonan">
                                                        <i class="fa fa-times"></i>
                                                    </a>
											</div>
												
											<?php } ?>
											
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
if (isset($_GET['id_baptis'])) {
    $sql_hapus = "DELETE FROM baptis WHERE id_baptis='" . $_GET['id_baptis'] . "'";
    $query_hapus = mysqli_query($konek, $sql_hapus);
    if ($query_hapus) {
        echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_baptis">';
    } else {
        echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_baptis">';
    }
}
?>