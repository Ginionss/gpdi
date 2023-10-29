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
						<div class="card-title">FORM TAMBAH PENGURUS</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control" placeholder="Username.." autofocus>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="text" name="password" class="form-control" placeholder="Password..">
								</div>
                                <div class="form-group">
									<label>Nama</label>
									<input type="text" name="nama" class="form-control" placeholder="nama.." autofocus>
								</div>
								<div class="form-group">
									<label>Jabatan</label>
									<input type="text" name="jabatan" class="form-control" placeholder="Jabatan..">
								</div>
                                <div class="form-group">
									<label>Hak Akses</label>
                                    <select class="form-control" name="hak_akses" id="">
                                        <option value="member">Member</option>
                                        <option value="admin">Admin</option>
                                    </select>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
						<a href="?halaman=tampil_user" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];
	$jabatan = $_POST['jabatan'];
	$hak_akses = $_POST['hak_akses'];

	$sql = "INSERT INTO operator (username,password,nama,jabatan,hak_akses) VALUES ('$username','$password','$nama','$jabatan','$hak_akses')";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_admin">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_admin">';
	}
}
?>