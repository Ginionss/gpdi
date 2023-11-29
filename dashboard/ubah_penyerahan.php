<?php
if (isset($_GET['id_penyerahan'])) {
	$id_penyerahan = $_GET['id_penyerahan'];
	$tampil_nik = "SELECT * FROM penyerahan b natural join jemaat j  where b.nik = j.nik and b.id_penyerahan = $id_penyerahan";
	$query1 = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query1, MYSQLI_BOTH);
	$id_penyerahan = $data['id_penyerahan'];
    $tgl = $data['tanggal_request'];
	$format = date('d F Y', strtotime($tgl));
	$nik = $data['nik'];
	$nama = $data['nama'];
	$nama_ayah = $data['nama_ayah'];
	$nama_ibu = $data['nama_ibu'];
	$file_kartu_keluarga = $data['file_kartu_keluarga'];
	$file_akta_kelahiran = $data['file_akta_kelahiran'];
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
						<div class="card-title">FORM EDIT PERMOHONAN PENYERAHAN </div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Tanggal Permohonan</label>
									<input type="date" name="tanggal_request" class="form-control" value= "<?= $tgl ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama Anak</label>
                                    <select id="cari_anak" name="nik" class="form-control">
                                        <option value=""></option>
                                        <option selected value="<?= $nik?>"><?= $nama?></option>
                                        
                                    </select>
								</div>
								<div class="form-group">
									<label>Nama Ayah</label>
                                    <select id="cari_ayah" name="nama_ayah" class="form-control">
                                        <option value=""></option>
                                        <?php 
                                            $tampil = "SELECT * FROM jemaat where nama = '$nama_ayah'"; 
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data1 = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                             $nama_a = $data1['nama'];
                                         ?>
                                        <option <?php if ($nama_a = $nama_ayah) echo 'selected' ?>  value="<?= $nama_a?>"><?= $nama_a?></option>
                                        <?php } ?>
                                    </select>
								</div>
                                <div class="form-group">
									<label>Nama Ibu</label>
                                    <select id="cari_ibu" name="nama_ibu" class="form-control">
                                        <option value=""></option>
                                        <?php 
                                            $tampil = "SELECT * FROM jemaat where nama = '$nama_ibu'"; 
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data2 = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                             $nama_i = $data2['nama'];
                                         ?>
                                        <option <?php if ($nama_i = $nama_ibu) echo 'selected' ?>  value="<?= $nama_i?>"><?= $nama_i?></option>
                                        <?php } ?>
                                    </select>
								</div>
                                <div class="form-group">
									<label>File Kartu Keluarga</label> 
                                    <input type="file" name="file_kk" class="form-control" value="<?= $file_kartu_keluarga ?>">
								</div>
                                <div class="form-group">
									<label>File Akta Kelahitan</label>
                                    <input type="file" name="file_akta" class="form-control" value="<?= $file_akta_kelahiran ?>">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
                                <div class="form-group">
									<label>File Akta Kelahitan</label><br>
									<iframe id="iframepdf" width="100%" height="250px" src="..//dataFile/file_akta/<?= $file_akta_kelahiran ?>"></iframe>
									<br><a target="_blank" href="..//dataFile/file_akta/<?= $file_akta_kelahiran ?>">Lihat>></a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success btn-sm">Simpan</button>
						<a href="?halaman=tampil_penyerahan" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	$tanggal_request = $_POST['tanggal_request'];
	$nik = $_POST['nik'];
	$nama_ayah = $_POST['nama_ayah'];
	$nama_ibu = $_POST['nama_ibu'];
	$file_akta= isset($_FILES['file_akta']);
    $file_akta_kelahiran ="penyerahan_".$_POST['nik'].".pdf";
    $status = "0";

	$sql = "UPDATE penyerahan SET
	tanggal_request='$tanggal_request',
	nik='$nik',
	nama_ayah='$nama_ayah',
	nama_ibu='$nama_ibu',
	file_akta_kelahiran='$file_akta_kelahiran',
	status ='$status' WHERE id_penyerahan=$id_penyerahan";
	$query = mysqli_query($konek, $sql);

	if ($query) {
        copy($_FILES['file_akta']['tmp_name'],"../dataFile/file_akta/".$file_akta_kelahiran);
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_penyerahan">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_penyerahan">';
	}
}

?>