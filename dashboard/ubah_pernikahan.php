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
						<div class="card-title">FORM EDIT PERMOHONAN PERNIKAHAN </div>
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
	$tanggal_request = $_POST['tanggal_request'];
	$nik_pria = $_POST['nik_pria'];
	$nik_wanita = $_POST['nik_wanita'];
    $status = "0";

	$sql = "UPDATE pernikahan SET
	tanggal_request='$tanggal_request',
	nik_pria='$nik_pria',
    nik_wanita = '$nik_wanita',
	status ='$status' WHERE id_pernikahan=$id_pernikahan";
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