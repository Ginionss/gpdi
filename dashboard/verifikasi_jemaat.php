<?php
if (isset($_GET['id_jemaat'])) {
	$id_jemaat = $_GET['id_jemaat'];
	$tampil_nik = "SELECT * FROM jemaat WHERE id_jemaat=$id_jemaat";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$nik = $data['nik'];
	$nama = $data['nama'];
	$tempat = $data['tempat_lahir'];
	$tanggal = $data['tanggal_lahir'];
	$jekel = $data['jenis_kelamin'];
    $alamat =$data['alamat'];
    $no_hp =$data['no_hp'];
    $ket =$data['ket'];
    $penyerahan =$data['penyerahan'];
    $baptis =$data['baptis'];
    $pernikahan =$data['pernikahan'];
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
									<input disabled type="number" name="nik" class="form-control" placeholder="NIK Anda.." value="<?= $nik; ?>">
								</div>
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input disabled type="text" name="nama" class="form-control" placeholder="Nama Lengkap Anda.." value="<?= $nama; ?>">
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<input disabled type="text" name="nama" class="form-control" placeholder="Nama Lengkap Anda.." value="<?= $jekel; ?>">
								</div>
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input disabled type="text" name="tempat" class="form-control" value="<?= $tempat; ?>">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input disabled type="date" name="tgl" class="form-control" value="<?= $tanggal; ?>">
								</div>
								<div class="form-group">
									<label for="comment">No HP</label>
									<input disabled type="text" name="no_hp" class="form-control" value="<?= $no_hp; ?>">
								</div>
								<div class="form-group">
									<label for="comment">Alamat</label>
									<textarea disabled class="form-control" name="alamat" rows="5"><?= $alamat ?></textarea>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Status Penyerahan</label>
                                    <?php if ($penyerahan == 0) {
                                        $penyerahan = "Belum diserahkan";
                                    }else {
                                        $penyerahan = "Sudah diserahkan";
                                    } ?>
									<input disabled type="text" name="no_hp" class="form-control" value="<?= $penyerahan; ?>">
								</div>
								<div class="form-group">
									<label>Status Baptis</label>
                                    <?php if ($baptis == 0) {
                                        $baptis = "Belum dibaptis";
                                    }else {
                                        $baptis = "Sudah dibaptis";
                                    } ?>
									<input disabled type="text" name="no_hp" class="form-control" value="<?= $baptis; ?>">
								</div>
								<div class="form-group">
									<label>Status Pernikahan</label>
									<label>Status Baptis</label>
                                    <?php if ($pernikahan == 0) {
                                        $pernikahan = "Belum Menikah";
                                    }else if ($pernikahan == 1) {
                                        $pernikahan = "Sudah Menikah";
                                    }else {
                                        $pernikahan = "Janda/Duda";
                                    } ?>
									<input disabled type="text" name="no_hp" class="form-control" value="<?= $pernikahan; ?>">
								</div>
								<div class="form-group">
									<label>Status Jemaat</label>
                                    <?php if ($ket == 0) {
                                        $ket = "Sementara";
                                    }else {
                                        $ket = "Tetap";
                                    } ?>
									<input disabled type="text" name="no_hp" class="form-control" value="<?= $ket; ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success">Terima</button>
						<a href="main2.php" class="btn btn-default">Batal</a>
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
	status_j='$status' WHERE id_jemaat=$id_jemaat";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Verifikasi Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_jemaat_sementara">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Verifikasi Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_jemaat_baru">';
	}
}

?>