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
									<input type="text" name="tanggal_request" class="form-control" value= "<?= $nama_pria ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama Mempelai Wanita</label>
									<input type="text" name="tanggal_request" class="form-control" value= "<?= $nama_wanita ?>" readonly>
								</div>
                                <div class="form-group">
									<label>Tanggal pernikahan</label>
                                    <input type="date" name="tanggal_pernikahan" class="form-control" value="<?= $tanggal_pernikahan ?>" readonly>
								</div>
                                <div class="form-group">
									<label>Nama Pendeta</label> 
                                    <input type="text" name="nama_pendeta" class="form-control" value="<?= $nama_pendeta ?>" readonly>
								</div>
                            </div>
						</div>
					</div>
					<div class="card-action">
						<a href="?halaman=tampil_pernikahan" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>
