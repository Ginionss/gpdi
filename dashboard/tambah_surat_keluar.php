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
						<div class="card-title">FORM ARSIP SURAT KELUAR</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Nomor Surat</label>
									<input type="text" name="no_surat_keluar" class="form-control" placeholder="Nomor Surat.." autofocus>
								</div>
								<div class="form-group">
									<label>Tanggal Surat</label>
									<input type="date" name="tgl_surat" class="form-control" placeholder="Tanggal Surat..">
								</div>
                                <div class="form-group">
									<label>Tujuan Surat</label>
                                    <input type="text" name="tujuan_surat" class="form-control" placeholder="Tujuan Surat..">
								</div>
                                <div class="form-group">
									<label>Perihal</label>
                                    <input type="text" name="perihal" class="form-control" placeholder="Perihal Surat..">
								</div>
                                <div class="form-group">
									<label>File Surat</label>
                                    <input type="file" name="file_surat" class="form-control" placeholder="File Surat..">
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
						<a href="?halaman=tampil_surat_keluar" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$no_surat_keluar = $_POST['no_surat_keluar'];
	$tgl_surat = $_POST['tgl_surat'];
	$tujuan_surat = $_POST['tujuan_surat'];
	$perihal = $_POST['perihal'];
	$file_surat= isset($_FILES['file_surat']);
    $file_surat_keluar = $_POST['tgl_surat']."_".$_POST['tujuan_surat'].".pdf";

	$sql = "INSERT INTO suratkeluar (no_surat_keluar,tgl_surat,tujuan_surat,perihal,file_surat_keluar) VALUES ('$no_surat_keluar','$tgl_surat','$tujuan_surat','$perihal','$file_surat_keluar')";
	$query = mysqli_query($konek, $sql);

	if ($query) {
        copy($_FILES['file_surat']['tmp_name'],"../dataFile/surat_keluar/".$file_surat_keluar);
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_surat_keluar">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_surat_keluar">';
	}
}
?>
