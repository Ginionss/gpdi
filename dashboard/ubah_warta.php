<?php
if (isset($_GET['id_warta'])) {
	$id_warta = $_GET['id_warta'];
	$tampil_nik = "SELECT * FROM wartajemaat  WHERE id_warta=$id_warta";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$tanggal = $data['tanggal'];
	$judul = $data['judul'];
	$isi = $data['isi'];
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
						<div class="card-title">UBAH WARTA JEMAAT</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Tanggal</label>
									<input type="date" name="tanggal" class="form-control" value="<?= $tanggal; ?>" readonly>
								</div>
								<div class="form-group">
									<label>Judul</label>
									<input type="text" name="judul" class="form-control"  value="<?= $judul; ?>">
								</div>
                                <div class="form-group">
									<label>Isi</label>
                                    <textarea name="isi" id = "myTextarea" cols="30" rows="10"><?= $isi; ?></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success">Ubah</button>
						<a href="?halaman=tampil_warta" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	$id_warta = $id_warta;
	$tanggal = $_POST['tanggal'];
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];

	$sql = "UPDATE wartajemaat SET
	tanggal='$tanggal',
    judul='$judul',
    isi='$isi' WHERE id_warta=$id_warta";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_warta">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_warta">';
	}
}

?>