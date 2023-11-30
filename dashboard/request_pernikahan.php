<?php include '../konek.php'; 
if (!isset($_SESSION)) {
	session_start();
}
$nik_pemohon = $_SESSION['nik'];

if ($_GET['jekel']) {
	$jekel = $_GET['jekel'];
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
                                        <?php if($jekel == "Laki-laki"){$tampil = "SELECT * FROM jemaat where id_jemaat = '$nik_pemohon' AND jenis_kelamin = 'Laki-laki'and pernikahan = 0";} 
                                        else {
                                            $tampil = "SELECT * FROM jemaat where jenis_kelamin = 'Laki-laki'and pernikahan = 0 and nik != ''"; 
                                        }
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                            $nik = $data['nik'];
                                             $nama = $data['nama'];
                                         ?>
                                        <option <?php if ($jekel == "Laki-laki") echo 'selected' ?> value="<?= $nik?>"><?= $nik.'- '.$nama?></option>
                                        <?php } ?>
                                    </select>
								</div>
                                <div class="form-group">
									<label>Nama Mempelai Wanita</label>
                                    <select id="cari_wanita" name="nik_wanita" class="form-control">
                                        <option value=""></option>
                                        <?php if($jekel == "Perempuan"){$tampil = "SELECT * FROM jemaat where id_jemaat = '$nik_pemohon' AND jenis_kelamin = 'Perempuan'and pernikahan = 0";} 
                                        else {
                                            $tampil = "SELECT * FROM jemaat where jenis_kelamin = 'Perempuan'and pernikahan = 0 and nik != ''"; 
                                        }
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                            $nik = $data['nik'];
                                             $nama = $data['nama'];
                                         ?>
                                        <option <?php if ($jekel == "Perempuan") echo 'selected' ?> value="<?= $nik?>"><?= $nik.'- '.$nama?></option>
                                        <?php } ?>
                                    </select>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
						<a href="?halaman=beranda" class="btn btn-default btn-sm">Batal</a>
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

	$sql = "INSERT INTO pernikahan (tanggal_request,nik_pria,nik_wanita,status) VALUES ('$tanggal_request','$nik_pria','$nik_wanita','0')";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		$sql1 = "UPDATE jemaat SET pernikahan = '3' WHERE nik = '$nik_pria'";
		$query1 = mysqli_query($konek, $sql1);
		$sql2 = "UPDATE jemaat SET pernikahan = '3' WHERE nik = '$nik_wanita'";
		$query2 = mysqli_query($konek, $sql2);
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_pernikahan">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_pernikahan">';
	}
}
?>
