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
						<div class="card-title">PERMOHONAN PENYERAHAN </div>
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
									<input type="text" name="tanggal_request" class="form-control" value= "<?= $nama ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama Ayah</label><?php 
                                            $tampil = "SELECT * FROM jemaat where nama = '$nama_ayah'"; 
                                         $query = mysqli_query($konek, $tampil);
                                         $data1 = mysqli_fetch_array($query);
                                             $nama_a = $data1['nama'];
                                         ?>
									<input type="text" name="tanggal_request" class="form-control" value= "<?= $nama_a ?>" readonly>
								</div>
                                <div class="form-group">
									<label>Nama Ibu</label><?php 
                                            $tampil = "SELECT * FROM jemaat where nama = '$nama_ibu'"; 
                                         $query = mysqli_query($konek, $tampil);
                                         $data2 = mysqli_fetch_array($query);
                                             $nama_i = $data2['nama'];
                                         ?>
									<input type="text" name="tanggal_request" class="form-control" value= "<?= $nama_i ?>" readonly>
								</div>
                                <div class="form-group">
									<label>Tanggal penyerahan</label>
                                    <input type="date" name="tanggal_penyerahan" class="form-control" value="<?= $tanggal_penyerahan ?>" readonly>
								</div>
                                <div class="form-group">
									<label>Nama Pendeta</label> 
                                    <input type="text" name="nama_pendeta" class="form-control" value="<?= $nama_pendeta ?>" readonly>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
                                <div class="form-group">
									<label>File Akta Kelahiran</label><br>
									<iframe id="iframepdf" width="100%" height="250px" src="..//dataFile/file_akta/<?= $file_akta_kelahiran ?>"></iframe>
									<br><a target="_blank" href="..//dataFile/file_akta/<?= $file_akta_kelahiran ?>">Lihat>></a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<a href="?halaman=tampil_penyerahan" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>
