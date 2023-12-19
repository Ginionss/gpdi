<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM TAMBAH DATA JEMAAT TETAP</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Tanggal Pendaftaran</label>
									<input type="date" name="tanggal_pendaftaran" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
								</div>
								<div class="form-group">
									<label>NIK</label>
									<input type="number" name="nik" class="form-control" placeholder="NIK.." autofocus>
								</div>
								<div class="form-group">
									<label>Nama</label>
									<input type="nama" name="nama" class="form-control" placeholder="Nama..">
								</div>
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir..">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" name="tanggal" class="form-control">
								</div>
								<div class="form-group">
									<label>Nomor HP</label>
									<input type="text" name="no_hp" class="form-control">
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select name="jekel" class="form-control">
										<option disabled="" selected="">Pilih Jenis Kelamin</option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea name="alamat" class="form-control" cols="30" rows="10" placeholder="Alamat.."></textarea>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control" placeholder="Username..">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="text" name="password" class="form-control" placeholder="Password..">
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
						<a href="?halaman=tampil_jemaat" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];
	$nik = $_POST['nik'];
	$tempat = $_POST['tempat'];
	$tanggal = $_POST['tanggal'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$jekel = $_POST['jekel'];
	$alamat = $_POST['alamat'];
	$ket = 1;
	$username = $_POST['username'];
	$password = $_POST['password'];
	$status = 1;

	$sql = "INSERT INTO jemaat (tanggal_pendaftaran,nik,nama,jenis_kelamin,tempat_lahir,tanggal_lahir,no_hp,alamat,status_j,ket,username,password) VALUES ('$tanggal_pendaftaran','$nik','$nama','$jekel','$tempat','$tanggal','$no_hp','$alamat','$status','$ket','$username','$password')";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_jemaat">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_jemaat">';
	}
}
?>