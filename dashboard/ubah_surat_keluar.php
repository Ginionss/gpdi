<?php
if (isset($_GET['id_surat_keluar'])) {
	$id_surat_keluar = $_GET['id_surat_keluar'];
	$tampil_nik = "SELECT * FROM suratkeluar  WHERE id_surat_keluar=$id_surat_keluar";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id_surat_keluar = $data['id_surat_keluar'];
    $noSurat = $data['no_surat_keluar'];
    $tgl1 = $data['tgl_surat'];
    $tujuan = $data['tujuan_surat'];
    $perihal = $data['perihal'];
    $file = $data['file_surat_keluar'];
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
						<div class="card-title">UBAH SURAT KELUAR</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
                            <div class="form-group">
									<label>Nomor Surat</label>
									<input type="text" name="no_surat_keluar" class="form-control" value="<?= $noSurat ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Tanggal Surat</label>
									<input type="date" name="tgl_surat" class="form-control" value="<?= $tgl1 ?>">
								</div>
                                <div class="form-group">
									<label>Tujuan Surat</label>
                                    <input type="text" name="tujuan_surat" class="form-control" value="<?= $tujuan ?>">
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
						<a href="?halaman=tampil_surat_keluar" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	$no_surat_keluar = $_POST['no_surat_keluar'];
	$tgl_surat = $_POST['tgl_surat'];
	$tujuan_surat = $_POST['tujuan_surat'];
	$perihal = $_POST['perihal'];
	$file_surat= isset($_FILES['file_surat']);
    $file_surat_keluar = $_POST['tgl_surat']."_".$_POST['tujuan_surat'].".pdf";

	$sql = "UPDATE suratkeluar SET
	no_surat_keluar='$no_surat_keluar',
    tgl_surat='$tgl_surat',
    tujuan_surat='$tujuan_surat',
    perihal='$perihal',
    file_surat_keluar='$file_surat_keluar' WHERE id_surat_keluar=$id_surat_keluar";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		unlink("../dataFile/surat_keluar/".$file_surat_masuk);
        copy($_FILES['file_surat']['tmp_name'],"../dataFile/surat_keluar/".$file_surat_keluar);
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_surat_keluar">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_surat_keluar">';
	}
}

?>