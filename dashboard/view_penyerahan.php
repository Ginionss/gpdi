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
	$no_surat = $data['no_surat'];
	$tanggal_penyerahan = $data['tanggal_penyerahan'];
	$nama_pendeta = $data['nama_pendeta'];
	$keterangan = $data['keterangan'];
	$status = $data['status'];
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
						<div class="card-title">FORM VERIFIKASI PERMOHONAN PENYERAHAN </div>
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
									<label>Status Permohonan</label>
                                    <select class="form-control" name="status" id="">
                                        <option value="0" <?php if ($status == 0) echo 'selected' ?>>Verifikasi Data</option>
                                        <option value="1" <?php if ($status == 1) echo 'selected' ?>>Diproses</option>
                                        <option value="2" <?php if ($status == 2) echo 'selected' ?>>Selesai</option>
                                        <option value="3" <?php if ($status == 3) echo 'selected' ?>>Ditolak</option>
                                    </select>
								</div>
                                <div class="form-group">
									<label>Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" value="<?= $keterangan ?>">
								</div>
                                <div class="form-group">
									<label>Nomor Surat</label> 
                                    <input type="text" name="no_surat" class="form-control" value="<?= $no_surat ?>">
								</div>
                                <div class="form-group">
									<label>Tanggal penyerahan</label>
                                    <input type="date" name="tanggal_penyerahan" class="form-control" value="<?= $tanggal_penyerahan ?>">
								</div>
                                <div class="form-group">
									<label>Nama Pendeta</label> 
                                    <input type="text" name="nama_pendeta" class="form-control" value="<?= $nama_pendeta ?>">
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
							<div class="form-group">
									<label>File Kartu Keluarga</label> <br>
									<iframe id="iframepdf" width="100%" height="250px" src="..//dataFile/file_kk/<?= $file_kartu_keluarga?>"></iframe>
									<br><a target="_blank" href="..//dataFile/file_kk/<?= $file_kartu_keluarga?>">Lihat>></a>
								</div>
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
	$no_surat = $_POST['no_surat'];
	$status = $_POST['status'];
	$keterangan = $_POST['keterangan'];
	$tanggal_penyerahan = $_POST['tanggal_penyerahan'];
	$nama_pendeta = $_POST['nama_pendeta'];

	$sql = "UPDATE penyerahan SET
	no_surat='$no_surat',
	status='$status',
	keterangan='$keterangan',
	tanggal_penyerahan='$tanggal_penyerahan',
	nama_pendeta ='$nama_pendeta' WHERE id_penyerahan=$id_penyerahan";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_penyerahan">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=view_penyerahan">';
	}
}

?>