<?php
if (isset($_GET['id_surat_masuk'])) {
	$id_surat_masuk = $_GET['id_surat_masuk'];
	$tampil_nik = "SELECT * FROM suratmasuk  WHERE id_surat_masuk=$id_surat_masuk";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id_surat_masuk = $data['id_surat_masuk'];
    $noSurat = $data['no_surat_masuk'];
    $tgl1 = $data['tgl_surat'];
    $tgl2 = $data['tgl_terima'];
    $asal = $data['asal_surat'];
    $perihal = $data['perihal'];
    $file = $data['file_surat_masuk'];
}

?>

<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header">
						<div class="card-title">UBAH SURAT MASUK</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
                            <div class="form-group">
									<label>Nomor Surat</label>
									<input type="text" name="no_surat_masuk" class="form-control" value="<?= $noSurat ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Tanggal Surat</label>
									<input type="date" name="tgl_surat" class="form-control" value="<?= $tgl1 ?>">
								</div>
								<div class="form-group">
									<label>Tanggal Terima</label>
									<input type="date" name="tgl_terima" class="form-control" value="<?= $tgl2 ?>">
								</div>
                                <div class="form-group">
									<label>Asal Surat</label>
                                    <input type="text" name="asal_surat" class="form-control" value="<?= $asal ?>">
								</div>
                                <div class="form-group">
									<label>Perihal</label>
                                    <input type="text" name="perihal" class="form-control" value="<?= $perihal ?>">
								</div>
                                <div class="form-group">
									<label>File Surat</label>
                                    <input type="file" name="file_surat" class="form-control" value="<?= $file ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success">Ubah</button>
						<a href="?halaman=tampil_surat_masuk" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	$no_surat_masuk = $_POST['no_surat_masuk'];
	$tgl_surat = $_POST['tgl_surat'];
	$tgl_terima = $_POST['tgl_terima'];
	$asal_surat = $_POST['asal_surat'];
	$perihal = $_POST['perihal'];
	$file_surat= isset($_FILES['file_surat']);
    $file_surat_masuk = $_POST['tgl_surat']."_".$_POST['asal_surat'].".pdf";

	$sql = "UPDATE suratmasuk SET
	no_surat_masuk='$no_surat_masuk',
    tgl_surat='$tgl_surat',
    tgl_terima='$tgl_terima',
    asal_surat='$asal_surat',
    perihal='$perihal',
    file_surat_masuk='$file_surat_masuk' WHERE id_surat_masuk=$id_surat_masuk";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		unlink("../dataFile/surat_masuk/".$file_surat_masuk);
        copy($_FILES['file_surat']['tmp_name'],"../dataFile/surat_masuk/".$file_surat_masuk);
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_surat_masuk">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_surat_masuk">';
	}
}

?>