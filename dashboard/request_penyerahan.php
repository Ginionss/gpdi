<?php include '../konek.php'; 
if (!isset($_SESSION)) {
	session_start();
}
$ortu = $_SESSION['ortu'];
$nik_pemohon = $_SESSION['nik'];
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
						<div class="card-title">FORM PERMOHONAN PENYERAHAN ANAK</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Tanggal Permohonan</label>
									<input type="date" name="tanggal_request" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama Anak</label>
                                    <select id="cari_anak" name="nik" class="form-control">
                                        <option value=""></option>
                                        <?php  $tampil = "SELECT * FROM jemaat";
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                             $nik = $data['nik'];
                                             $nama = $data['nama'];
                                         ?>
                                        <option value="<?= $nik?>"><?= $nik.'- '.$nama?></option>
                                        <?php } ?>
                                    </select>
								</div>
								<div class="form-group">
									<label>Nama Ayah</label>
                                    <select id="cari_ayah" name="nama_ayah" class="form-control">
                                        <option value=""></option>
                                        <?php if($ortu == "ayah"){$tampil = "SELECT * FROM jemaat where id_jemaat = '$nik_pemohon' AND jenis_kelamin = 'Laki-laki'and pernikahan > 0";} 
                                        else {
                                            $tampil = "SELECT * FROM jemaat where jenis_kelamin = 'Laki-laki'and pernikahan > 0 and nik != ''"; 
                                        }
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
											$nik = $data['nik'];
                                             $nama = $data['nama'];
                                         ?>
                                        <option <?php if ($ortu == "ayah") echo 'selected' ?> value="<?= $nama?>"><?= $nik.'- '.$nama?></option>
                                        <?php } ?>
                                    </select>
								</div>
                                <div class="form-group">
									<label>Nama Ibu</label>
                                    <select id="cari_ibu" name="nama_ibu" class="form-control">
                                        <option value=""></option>
                                        <?php if($ortu == "ibu"){$tampil = "SELECT * FROM jemaat where id_jemaat = '$nik_pemohon' AND jenis_kelamin = 'Perempuan' and pernikahan > 0";} 
                                        else {
                                            $tampil = "SELECT * FROM jemaat where jenis_kelamin = 'Perempuan'and pernikahan > 0 and nik != ''"; 
                                        }
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
											$nik = $data['nik'];
                                             $nama = $data['nama'];
                                         ?>
                                        <option <?php if ($ortu == "ibu") echo 'selected' ?> value="<?= $nama?>"><?= $nik.'- '.$nama?></option>
                                        <?php } ?>
                                    </select>
								</div>
                                <div class="form-group">
									<label>File Kartu Keluarga</label>
                                    <input type="file" name="file_kk" class="form-control" >
								</div>
                                <div class="form-group">
									<label>File Akta Kelahitan</label>
                                    <input type="file" name="file_akta" class="form-control" >
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
	$nik = $_POST['nik'];
	$nama_ayah = $_POST['nama_ayah'];
	$nama_ibu = $_POST['nama_ibu'];
	$file_kk= isset($_FILES['file_kk']);
    $file_kartu_keluarga = "Penyerahan_".$_POST['nik'].".pdf";
	$file_akta= isset($_FILES['file_akta']);
    $file_akta_kelahiran ="Penyerahan_".$_POST['nik'].".pdf";

	$sql = "INSERT INTO penyerahan (tanggal_request,nik,nama_ayah,nama_ibu,file_kartu_keluarga,file_akta_kelahiran,status) VALUES ('$tanggal_request','$nik','$nama_ayah','$nama_ibu','$file_kartu_keluarga','$file_akta_kelahiran','0')";
	$query = mysqli_query($konek, $sql);

	if ($query) {
        copy($_FILES['file_kk']['tmp_name'],"../dataFile/file_kk/".$file_kartu_keluarga);
        copy($_FILES['file_akta']['tmp_name'],"../dataFile/file_akta/".$file_akta_kelahiran);
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_penyerahan">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_penyerahan">';
	}
}
?>
