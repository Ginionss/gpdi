<?php
if (isset($_GET['id_pernikahan'])) {
	$id_pernikahan = $_GET['id_pernikahan'];
	$tampil_nik = "SELECT * FROM pernikahan b natural join jemaat j  where b.nik_pria = j.nik and b.id_pernikahan = $id_pernikahan";
	$query1 = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query1, MYSQLI_BOTH);
	$id_pernikahan = $data['id_pernikahan'];
    $tgl = $data['tanggal_request'];
	$format = date('d F Y', strtotime($tgl));
	$nik_pria = $data['nik'];
	$nama_pria = $data['nama'];
	$no_surat = $data['no_surat'];
	$tanggal_pernikahan = $data['tanggal_pernikahan'];
	$nama_pendeta = $data['nama_pendeta'];
	$keterangan = $data['keterangan'];
	$status = $data['status'];
    
	$tampil_nik2 = "SELECT * FROM pernikahan b natural join jemaat j  where b.nik_wanita = j.nik and b.id_pernikahan = $id_pernikahan";
	$query2 = mysqli_query($konek, $tampil_nik2);
	$data2 = mysqli_fetch_array($query2, MYSQLI_BOTH);
	$nik_wanita = $data2['nik'];
	$nama_wanita = $data2['nama'];
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
						<div class="card-title">FORM VERIFIKASI PERMOHONAN PERNIKAHAN </div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Tanggal Permohonan</label>
									<input type="date" name="tanggal_request" class="form-control" value= "<?= $tgl ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama Mempelai Pria</label>
                                    <select id="cari_anak" name="nik_pria" class="form-control">
                                        <option value=""></option>
                                        <option selected value="<?= $nik_pria?>"><?= $nama_pria?></option>
                                        
                                    </select>
								</div>
								<div class="form-group">
									<label>Nama Mempelai Wanita</label>
                                    <select id="cari_anak" name="nik_wanita" class="form-control">
                                        <option value=""></option>
                                        <option selected value="<?= $nik_wanita?>"><?= $nama_wanita?></option>
                                        
                                    </select>
								</div>
                                <div class="form-group">
									<label>Status Permohonan</label>
                                    <select class="form-control" name="status" id="">
                                        <option value="0" <?php if ($status == 0) echo 'selected' ?>>Verifikasi Data</option>
                                        <option value="1" <?php if ($status == 1) echo 'selected' ?>>Diproses</option>
                                        <option value="2" <?php if ($status == 2) echo 'selected' ?>>Selesai</option>
                                        <option value="3" <?php if ($status == 3) echo 'selected' ?>>Ditolak</option>
                                    </select>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
                                <div class="form-group">
									<label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" value="<?= $keterangan ?>">
								</div>
                                <div class="form-group">
									<label>Nomor Surat</label> 
                                    <input type="text" name="no_surat" class="form-control" value="<?= $no_surat ?>">
								</div>
                                <div class="form-group">
									<label>Tanggal pernikahan</label>
                                    <input type="date" name="tanggal_pernikahan" class="form-control" value="<?= $tanggal_pernikahan ?>">
								</div>
                                <div class="form-group">
									<label>Nama Pendeta</label> 
                                    <input type="text" name="nama_pendeta" class="form-control" value="<?= $nama_pendeta ?>">
								</div>
                            </div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success btn-sm">Simpan</button>
						<a href="?halaman=tampil_pernikahan" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	$no_surat = $_POST['no_surat'];
	$status = $_POST['status'];
	$keterangan = $_POST['keterangan'];
	$tanggal_pernikahan = $_POST['tanggal_pernikahan'];
	$nama_pendeta = $_POST['nama_pendeta'];

	$sql = "UPDATE pernikahan SET
	no_surat='$no_surat',
	status='$status',
	keterangan='$keterangan',
	tanggal_pernikahan='$tanggal_pernikahan',
	nama_pendeta ='$nama_pendeta' WHERE id_pernikahan=$id_pernikahan";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_pernikahan">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_pernikahan">';
	}
}

?>