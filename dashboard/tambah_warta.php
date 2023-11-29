<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM TAMBAH WARTA JEMAAT</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Tanggal</label>
									<input type="date" name="tanggal" class="form-control" placeholder="Tanggal.." autofocus>
								</div>
								<div class="form-group">
									<label>Judul</label>
									<input type="text" name="judul" class="form-control" placeholder="Judul..">
								</div>
                                <div class="form-group">
									<label>Isi</label>
									<input type="file" name="isi" class="form-control" >
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
						<a href="?halaman=tampil_warta" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$tanggal = $_POST['tanggal'];
	$judul = $_POST['judul'];
	$isi= isset($_FILES['isi']);
    $file_warta ="warta-".$_POST['tanggal'].".pdf";

	$sql = "INSERT INTO wartajemaat (tanggal,judul, isi) VALUES ('$tanggal','$judul','$file_warta')";
	$query = mysqli_query($konek, $sql);

	if ($query) {
        copy($_FILES['isi']['tmp_name'],"../dataFile/warta/".$file_warta);
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_warta">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_warta">';
	}
}
?>
