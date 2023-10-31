<?php
if (isset($_GET['id_pengguna'])) {
	$id_pengguna = $_GET['id_pengguna'];
	$tampil_nik = "SELECT * FROM operator WHERE id_pengguna=$id_pengguna";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$username = $data['username'];
	$password = $data['password'];
	$nama = $data['nama'];
	$jabatan = $data['jabatan'];
	$hak_akses = $data['hak_akses'];
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
						<div class="card-title">Ubah Data Pengguna</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control" value="<?= $username; ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="text" name="password" class="form-control" value="<?= $password; ?>">
								</div>
                                <div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" value="<?= $nama; ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input type="text" name="jabatan" class="form-control" value="<?= $jabatan; ?>">
								</div>
                                <div class="form-group">
									<label>Hak Akses</label>
                                    <select class="form-control" name="hak_akses" id="">
                                        <option value="member" <?php if ($hak_akses == "member") echo 'selected' ?>>Member</option>
                                        <option value="admin" <?php if ($hak_akses == "admin") echo 'selected' ?>>Admin</option>
                                        <option value="gembala" <?php if ($hak_akses == "gembala") echo 'selected' ?>>Gembala</option>
                                    </select>
								</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success">Ubah</button>
						<a href="?halaman=tampil_admin" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$jabatan = $_POST['jabatan'];
	$hak_akses = $_POST['hak_akses'];

	$sql = "UPDATE operator SET
    username = '$username',
	password='$password',
    nama = '$nama',
    jabatan = '$jabatan',
    hak_akses = '$hak_akses' WHERE id_pengguna=$id_pengguna";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_admin">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_admin">';
	}
}

?>