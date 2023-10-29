<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request_sktm'])) {
	$id = $_GET['id_request_sktm'];
	$tampil_nik = "SELECT * FROM data_request_sktm NATURAL JOIN data_user WHERE id_request_sktm=$id";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id = $data['id_request_sktm'];
	$nik = $data['nik'];
	$nama = $data['nama'];
	$berkas = $data['scan_berkas'];
	$sp = $data['scan_sp'];
	$program = $data['program'];
	$prodi = $data['prodi'];
	$fakultas = $data['fakultas'];
	$kampus = $data['kampus'];
	$lokasi = $data['lokasi'];
	$no_akta = $data['no_akta'];
	$nm_notaris = $data['nm_notaris'];
	$tgl_akta = $data['tgl_akta'];
}
?>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">UBAH REQUEST SKTM</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input type="text" name="keterangan" class="form-control" value="<?= $nik . ' - ' . $nama; ?>" readonly>
								</div>
								<div class="form-group">
									<input type="hidden" name="nik" class="form-control" value="<?= $nik; ?>" readonly>
								</div>
								<div class="form-group">
									<label>Program</label>
									<input type="text" name="program" class="form-control" value="<?= $program; ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Program Studi</label>
									<input type="text" name="prodi" class="form-control" value="<?= $prodi; ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Fakultas</label>
									<input type="text" name="fakultas" class="form-control" value="<?= $fakultas; ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Kampus</label>
									<input type="text" name="kampus" class="form-control" value="<?= $kampus; ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Lokasi</label>
									<input type="text" name="lokasi" class="form-control" value="<?= $lokasi; ?>" autofocus>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>No Akta Notaris</label>
									<input type="text" name="no_akta" class="form-control" value="<?= $no_akta; ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Nama Notaris</label>
									<input type="text" name="nm_notaris" class="form-control" value="<?= $nm_notaris; ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Tanggal Akta Notaris</label>
									<input type="date" name="tgl_akta" class="form-control" value="<?= $tgl_akta; ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Surat Permohonan</label>
									<input type="file" name="sp" class="form-control" size="37" value="<?= $sp; ?>" required>
								</div>
								<div class="form-group">
									<label>Berkas Pendukung</label>
									<input type="file" name="berkas" class="form-control" size="37" value="<?= $berkas; ?>" required>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success">Ubah</button>
						<a href="?halaman=tampil_status" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	$program = $_POST['program'];
	$prodi = $_POST['prodi'];
	$fakultas = $_POST['fakultas'];
	$kampus = $_POST['kampus'];
	$lokasi = $_POST['lokasi'];
	$no_akta = $_POST['no_akta'];
	$nm_notaris = $_POST['nm_notaris'];
	$tgl_akta = $_POST['tgl_akta'];
	$nama_berkas = isset($_FILES['berkas']);
	$file_berkas = $_POST['nik'] . "_" . ".pdf";
	$nama_sp = isset($_FILES['sp']);
	$file_sp = $_POST['nik'] . "_" . ".pdf";
	$sql = "UPDATE data_request_sktm SET
    program='$program',
	program='$prodi',
	program='$fakultas',
	program='$kampus',
	program='$lokasi',
	program='$no_akta',
	program='$nm_notaris',
	program='$tgl_akta',
    scan_berkas='$file_berkas',
    scan_sp='$file_sp' WHERE id_request_sktm=$id";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		copy($_FILES['berkas']['tmp_name'], "../dataFoto/scan_berkas/" . $file_berkas);
		copy($_FILES['sp']['tmp_name'], "../dataFoto/scan_sp/" . $file_sp);
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_sktm">';
	}
}

?>