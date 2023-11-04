<?php
if (isset($_GET['nik'])) {
	$nik = $_GET['nik'];
	$tampil_nik = "SELECT * FROM jemaat WHERE nik=$nik";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$nik = $data['nik'];
	$nama = $data['nama'];
	$tempat = $data['tempat_lahir'];
	$tanggal = $data['tanggal_lahir'];
	$jekel = $data['jenis_kelamin'];
    $alamat =$data['alamat'];
    $no_hp =$data['no_hp'];
}

?>

<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST">
				<div class="card">
					<div class="card-header">
						<div class="card-title">VERIFIKASI DATA JEMAAT BARU</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input  type="number" name="nik" class="form-control" placeholder="NIK Anda.." value="<?= $nik; ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input type="text" disabled name="nama" class="form-control" placeholder="Nama Lengkap Anda.." value="<?= $nama; ?>">
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select name="jekel" disabled class="form-control">
										<option disabled="" selected="">Pilih Jenis Kelamin</option>
										<option value="Laki-Laki" <?php if ($jekel == "Laki-laki") echo 'selected' ?>>Laki-Laki</option>
										<option value="Perempuan" <?php if ($jekel == "Perempuan") echo 'selected' ?>>Perempuan</option>
									</select>
								</div>
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" disabled name="tempat" class="form-control" value="<?= $tempat; ?>">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" disabled name="tgl" class="form-control" value="<?= $tanggal; ?>">
								</div>
								<div class="form-group">
									<label for="comment">No HP</label>
									<input type="text" disabled name="no_hp" class="form-control" value="<?= $no_hp; ?>">
								</div>
								<div class="form-group">
									<label for="comment">Alamat</label>
									<input type="text" disabled name="alamat" class="form-control" value="<?= $alamat; ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success">Terima</button>
						<a href="?halaman=beranda" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	$nik = $_POST['nik'];
	$status = 1;

	$sql = "UPDATE jemaat SET
	status='$status' WHERE nik=$nik";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Verifikasi Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_jemaat">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Verifikasi Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_jemaat_baru">';
	}
}

?>