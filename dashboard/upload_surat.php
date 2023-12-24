<?php include '../konek.php'; 
    $id_surat = $_GET['id_surat'];
if (isset($id_surat )) {
    $jenis = $_GET['jenis'];
    if ($jenis == 'baptis') {
        $text = "Surat Baptis";
        $tampil_nik = "SELECT * FROM baptis b natural join jemaat j  where b.nik = j.nik and b.id_baptis = $id_surat";
        $query1 = mysqli_query($konek, $tampil_nik);
        $data = mysqli_fetch_array($query1, MYSQLI_BOTH);
        $no_surat = $data['no_surat'];
        $tgl_surat = $data['tanggal_baptis'];
        $nama = $data['nama'];
    }else if ($jenis == 'penyerahan') {
        $text = "Surat Penyerahan Anak";
        $tampil_nik = "SELECT * FROM penyerahan p natural join jemaat j  where p.nik = j.nik and p.id_penyerahan = $id_surat";
        $query1 = mysqli_query($konek, $tampil_nik);
        $data = mysqli_fetch_array($query1, MYSQLI_BOTH);
        $no_surat = $data['no_surat'];
        $tgl_surat = $data['tanggal_penyerahan'];
        $nama = $data['nama'];
    }else {
        $text = "Surat Pernikahan";
        $tampil_nik = "SELECT * FROM pernikahan n natural join jemaat j  where n.nik_pria = j.nik and n.id_pernikahan = $id_surat";
        $query1 = mysqli_query($konek, $tampil_nik);
        $data = mysqli_fetch_array($query1, MYSQLI_BOTH);
        $no_surat = $data['no_surat'];
        $tgl_surat = $data['tanggal_pernikahan'];
        $nama = $data['nama'];
    }
}?>
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
									<input type="text"  name="no_surat_keluar" class="form-control" value="<?= $no_surat ?>" autofocus>
								</div>
								<div class="form-group">
									<label>Tanggal Surat</label>
									<input type="date"  name="tgl_surat" class="form-control" value="<?= $tgl_surat?>">
								</div>
                                <div class="form-group">
									<label>Tujuan Surat</label>
                                    <input type="text"  name="tujuan_surat" class="form-control" value="<?= $nama ?>">
								</div>
                                <div class="form-group">
									<label>Perihal</label>
                                    <input type="text" name="perihal" class="form-control" value="<?= $text ?>">
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

    if ($jenis = "baptis") {
        $sql = "UPDATE baptis SET
        file_surat='$file_surat_keluar' WHERE id_baptis=$id_surat";
        $query = mysqli_query($konek, $sql);
    }elseif ($jenis = "penyerahan") {
        $sql = "UPDATE penyerahan SET
        file_surat='$file_surat_keluar' WHERE id_penyerahan=$id_surat";
        $query = mysqli_query($konek, $sql);
    }else if ($jenis = "pernikahan") {
        $sql = "UPDATE pernikahan SET
        file_surat='$file_surat_keluar' WHERE id_pernikahan=$id_surat";
        $query = mysqli_query($konek, $sql);
    } 

	$sql1 = "INSERT INTO suratkeluar (no_surat_keluar,tgl_surat,tujuan_surat,perihal,file_surat_keluar) VALUES ('$no_surat_keluar','$tgl_surat','$tujuan_surat','$perihal','$file_surat_keluar')";
	$query1 = mysqli_query($konek, $sql1);

	if ($query && $query1) {
		unlink("../dataFile/surat_keluar/".$file_surat_keluar);
        copy($_FILES['file_surat']['tmp_name'],"../dataFile/surat_keluar/".$file_surat_keluar);
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_surat_keluar">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_surat_keluar">';
	}
}
?>
