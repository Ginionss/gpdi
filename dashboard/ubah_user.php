<?php
if (isset($_GET['nik'])) {
	$nik = $_GET['nik'];
	$tampil_nik = "SELECT * FROM user u join jemaat j on u.nik= j.nik WHERE u.nik=$nik";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$nik = $data['nik'];
	$nama = $data['nama'];
	$password = $data['password'];
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
						<div class="card-title">UBAH USER</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input type="text" name="nik" class="form-control" value="<?= $nik .'-'. $nama; ?>" readonly>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="text" name="password" class="form-control" placeholder="Nama Lengkap Anda.." value="<?= $password; ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success">Ubah</button>
						<a href="?halaman=tampil_user" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	$nik = $nik;
	$password = $_POST['password'];

	$sql = "UPDATE user SET
	password='$password'WHERE nik=$nik";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_user">';
	}
}

?>