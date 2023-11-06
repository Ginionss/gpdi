<?php
if (isset($_GET['id_jemaat'])) {
	$id_jemaat = $_GET['id_jemaat'];
	$tampil_nik = "SELECT * FROM jemaat WHERE id_jemaat=$id_jemaat";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id_jemaat = $data['id_jemaat'];
	$nik = $data['nik'];
	$nama = $data['nama'];
	$tempat = $data['tempat_lahir'];
	$tanggal = $data['tanggal_lahir'];
	$jekel = $data['jenis_kelamin'];
    $alamat =$data['alamat'];
    $no_hp =$data['no_hp'];
    $ket =$data['ket'];
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
						<div class="card-title">UBAH DATA JEMAAT</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK</label>
									<input  type="number" name="nik" class="form-control" placeholder="NIK Anda.." value="<?= $nik; ?>">
								</div>
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Anda.." value="<?= $nama; ?>">
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select name="jekel" class="form-control">
										<option disabled="" selected="">Pilih Jenis Kelamin</option>
										<option value="Laki-Laki" <?php if ($jekel == "Laki-laki") echo 'selected' ?>>Laki-Laki</option>
										<option value="Perempuan" <?php if ($jekel == "Perempuan") echo 'selected' ?>>Perempuan</option>
									</select>
								</div>
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" name="tempat" class="form-control" value="<?= $tempat; ?>">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" name="tgl" class="form-control" value="<?= $tanggal; ?>">
								</div>
								<div class="form-group">
									<label for="comment">No HP</label>
									<input type="text" name="no_hp" class="form-control" value="<?= $no_hp; ?>">
								</div>
								<div class="form-group">
									<label for="comment">Alamat</label>
									<textarea class="form-control" name="alamat" rows="5"><?= $alamat ?></textarea>
								</div>
								<div class="form-group">
									<label>Status Jemaat</label>
									<select name="ket" class="form-control">
										<option disabled="" selected="">Pilih Status</option>
										<option value="1" <?php if ($ket == 1) echo 'selected' ?>>Tetap</option>
										<option value="0" <?php if ($ket == 0) echo 'selected' ?>>Sementara</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success">Ubah</button>
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
	$nama = $_POST['nama'];
	$tempat = $_POST['tempat'];
	$tgl = $_POST['tgl'];
	$jekel = $_POST['jekel'];
	$alamat = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
	$ket = $_POST['ket'];

	$sql = "UPDATE jemaat SET
	nik= '$nik',
	nama='$nama',
	tanggal_lahir='$tgl',
	tempat_lahir='$tempat',
	jenis_kelamin='$jekel',
	no_hp='$no_hp',
	alamat='$alamat',
	ket='$ket' WHERE id_jemaat=$id_jemaat";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_jemaat">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_jemaat">';
	}
}

?>