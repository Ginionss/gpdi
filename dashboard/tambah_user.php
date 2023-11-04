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
						<div class="card-title">FORM TAMBAH USER</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK - NAMA</label>
									<select id="cari_jemaat" name="nik" class="form-control">
                                        <option value=""></option>
                                        <?php  $tampil = "SELECT * FROM jemaat where status = 1";
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                             $nik = $data['nik'];
                                             $nama = $data['nama'];
                                         ?>
                                        <option  value="<?= $nik?>"><?= $nik."-".$nama?></option>
                                        <?php } ?>
                                    </select>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="text" name="password" class="form-control" value="user">
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
	$nik = $_POST['nik'];
	$password = $_POST['password'];

	$sql = "INSERT INTO user (nik,password) VALUES ('$nik','$password')";
	$query = mysqli_query($konek, $sql);
	
	$status = 2;

	$sql = "UPDATE jemaat SET
	status='$status' WHERE nik=$nik";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_user">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_user">';
	}
}
?>