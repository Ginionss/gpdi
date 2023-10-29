<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
$tampil_nik = "SELECT * FROM data_user WHERE nik=$_SESSION[nik]";
$query = mysqli_query($konek, $tampil_nik);
$data = mysqli_fetch_array($query, MYSQLI_BOTH);
$nik = $data['nik'];
$nama = $data['nama'];
?>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM TAMBAH REQUEST SURAT REKOMENDASI</div>
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
									<input type="text" name="program" class="form-control" placeholder="Program yang ingin Anda ikuti.." autofocus>
								</div>
								<div class="form-group">
									<label>Program Studi</label>
									<input type="text" name="prodi" class="form-control" placeholder="Program Studi tujuan Anda.." autofocus>
								</div>
								<div class="form-group">
									<label>Fakultas</label>
									<input type="text" name="fakultas" class="form-control" placeholder="Fakultas tujuan Anda.." autofocus>
								</div>
								<div class="form-group">
									<label>Kampus</label>
									<input type="text" name="kampus" class="form-control" placeholder="Kampus tujuan Anda.." autofocus>
								</div>
								<div class="form-group">
									<label>Lokasi</label>
									<input type="text" name="lokasi" class="form-control" placeholder="kota kampus tujuan Anda.." autofocus>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>No Akta Notaris</label>
									<input type="text" name="no_akta" class="form-control" placeholder="Nomor Akta Notaris.." autofocus>
								</div>
								<div class="form-group">
									<label>Nama Notaris</label>
									<input type="text" name="nm_notaris" class="form-control" autofocus>
								</div>
								<div class="form-group">
									<label>Tanggal Akta Notaris</label>
									<input type="date" name="tgl_akta" class="form-control" autofocus>
								</div>
								<div class="form-group">
									<label>Surat Permohonan</label>
									<input type="file" name="sp" class="form-control" size="37" required>
								</div>
								<div class="form-group">
									<label>Berkas Pendukung</label>
									<input type="file" name="berkas" class="form-control" size="37" required>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="kirim" class="btn btn-success">Kirim</button>
						<a href="?halaman=beranda" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['kirim'])) {
	$nik = $_POST['nik'];
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
	$sql = "INSERT INTO data_request_sktm (nik,scan_berkas,scan_sp,program,prodi,fakultas,kampus,lokasi,no_akta,nm_notaris,tgl_akta) VALUES ('$nik','$file_berkas','$file_sp','$program','$prodi','$fakultas','$kampus','$lokasi','$no_akta','$nm_notaris','$tgl_akta')";
	$query = mysqli_query($konek, $sql) or die(mysqli_error());

	if ($query) {
		copy($_FILES['berkas']['tmp_name'], "../dataFoto/scan_berkas/" . $file_berkas);
		copy($_FILES['sp']['tmp_name'], "../dataFoto/scan_sp/" . $file_sp);
		echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_sktm">';
	}
}

?>