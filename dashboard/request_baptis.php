<?php include '../konek.php'; 
if (!isset($_SESSION)) {
	session_start();
}
$nik_pemohon = $_SESSION['nik'];
if ($_GET['status_j']) {
	$status_j = $_GET['status_j'];

	if ($status_j == 1) {
		$tampil_kk = "SELECT * FROM kepala_keluarga k join jemaat j on k.id_jemaat = j.id_jemaat join anggota_keluarga a where k.id_jemaat=$nik or a.id_jemaat=$nik";
		$query_kk =  mysqli_fetch_array(mysqli_query($konek, $tampil_kk));
		$id_kk = $query_kk['id_kk'];
	}
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
						<div class="card-title">FORM PERMOHONAN BAPTIS</div>
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
                                        <?php  $tampil = "SELECT * FROM jemaat where id_jemaat = '$nik_pemohon'";
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
											$id_jemaat = $data['id_jemaat'];
                                             $nik = $data['nik'];
                                             $nama = $data['nama'];
                                         ?>
                                        <option <?php if ($id_jemaat = $nik_pemohon) echo 'selected' ?> value="<?= $nik?>"><?= $nik."-".$nama?></option>
                                        <?php } ?>
                                    </select>
								</div>
								<div class="form-group">
									<label>Nama Ayah</label>
									<?php if ($status_j == 1) {
                                       $tampil1 = "SELECT * FROM jemaat j join anggota_keluarga a on j.id_jemaat = a.id_jemaat join kepala_keluarga k on a.id_kk= k.id_kk where a.id_kk = $id_kk and a.status_ak = 'Suami'";
                                         $query1 = mysqli_query($konek, $tampil1);
										 $data1 = mysqli_fetch_array($query1);
										 $nik = $data1['nik'];
										  $nama = $data1['nama']; ?>
									<input type="text" name="nama_ayah" class="form-control" value="<?= $nama?>" readonly>
									<?php }else { ?>
									<input type="text" name="nama_ayah" class="form-control">
									<?php } ?>
								</div>
                                <div class="form-group">
									<label>Nama Ibu</label>
                                    <?php if ($status_j == 1) {
                                       $tampil2 = "SELECT * FROM jemaat j join anggota_keluarga a on j.id_jemaat = a.id_jemaat join kepala_keluarga k on a.id_kk= k.id_kk where a.id_kk = $id_kk and a.status_ak = 'Istri'";
                                         $query2 = mysqli_query($konek, $tampil2);
										 $data2 = mysqli_fetch_array($query2);
										 $nik = $data2['nik'];
										  $nama = $data2['nama']; ?>
									<input type="text" name="nama_ibu" class="form-control" value="<?= $nama?>" readonly>
									<?php }else { ?>
									<input type="text" name="nama_ibu" class="form-control">
									<?php } ?>
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
						<a href="?halaman=halaman=beranda" class="btn btn-default btn-sm">Batal</a>
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
    $file_kartu_keluarga = "Baptis_".$_POST['nik'].".pdf";
	$file_akta= isset($_FILES['file_akta']);
    $file_akta_kelahiran ="Baptis_".$_POST['nik'].".pdf";

	$sql = "INSERT INTO baptis (tanggal_request,nik,nama_ayah,nama_ibu,file_kartu_keluarga,file_akta_kelahiran,status) VALUES ('$tanggal_request','$nik','$nama_ayah','$nama_ibu','$file_kartu_keluarga','$file_akta_kelahiran','0')";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		$sql1 = "UPDATE jemaat SET baptis = '2' WHERE nik = '$nik'";
		$query1 = mysqli_query($konek, $sql1);
        copy($_FILES['file_kk']['tmp_name'],"../dataFile/file_kk/".$file_kartu_keluarga);
        copy($_FILES['file_akta']['tmp_name'],"../dataFile/file_akta/".$file_akta_kelahiran);
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_baptis">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=request_penyerahan">';
	}
}
?>
