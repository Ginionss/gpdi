<?php include '../konek.php'; 
if (!isset($_SESSION)) {
	session_start();
}
$mempelai = $_SESSION['mempelai'];
$nik_pemohon = $_SESSION['nik'];
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
						<div class="card-title">FORM PERMOHONAN PERNIKAHAN</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Tanggal Permohonan</label>
									<input type="date" name="tanggal_request" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama Mempelai Pria</label>
                                    <select id="cari_pria" name="nik_pria" class="form-control">
                                        <option value=""></option>
                                        <?php if($mempelai == "pria"){$tampil = "SELECT * FROM jemaat where nik = '$nik_pemohon' AND jenis_kelamin = 'Laki-laki'";} 
                                        else {
                                            $tampil = "SELECT * FROM jemaat where jenis_kelamin = 'Laki-laki'"; 
                                        }
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                            $nik = $data['nik'];
                                             $nama = $data['nama'];
                                         ?>
                                        <option <?php if ($mempelai == "pria") echo 'selected' ?> value="<?= $nik?>"><?= $nama?></option>
                                        <?php } ?>
                                    </select>
								</div>
                                <div class="form-group">
									<label>Nama Mempelai Wanita</label>
                                    <select id="cari_wanita" name="nik_wanita" class="form-control">
                                        <option value=""></option>
                                        <?php if($mempelai == "wanita"){$tampil = "SELECT * FROM jemaat where nik = '$nik_pemohon' AND jenis_kelamin = 'Perempuan'";} 
                                        else {
                                            $tampil = "SELECT * FROM jemaat where jenis_kelamin = 'Perempuan'"; 
                                        }
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                            $nik = $data['nik'];
                                             $nama = $data['nama'];
                                         ?>
                                        <option <?php if ($mempelai == "wanita") echo 'selected' ?> value="<?= $nik?>"><?= $nama?></option>
                                        <?php } ?>
                                    </select>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
						<a href="?halaman=transit_penyerahan" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$tanggal_request = $_POST['tanggal_request'];
	$nik_pria = $_POST['nik_pria'];
	$nik_wanita = $_POST['nik_wanita'];

	$sql = "INSERT INTO pernikahan (tanggal_request,nik_pria,nik_wanita,status) VALUES ('$tanggal_request','$nik_pria','$nik_wanita','1')";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_pernikahan">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_pernikahan">';
	}
}
?>
