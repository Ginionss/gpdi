<?php include '../konek.php'; 
$nik_pemohon = $_SESSION['nik'];
$tampil_nik = "SELECT * FROM jemaat WHERE id_jemaat=$nik_pemohon";
$query = mysqli_query($konek, $tampil_nik);
$data = mysqli_fetch_array($query, MYSQLI_BOTH);
$jekel = $data['jenis_kelamin'];?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM PILIHAN</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
                            <div class="form-group">
									<label>Anda adalah</label>
                                    <select class="form-control" name="ortu" id="">
                                        <option value="ayah" <?php if ($jekel == "Laki-laki") echo 'selected' ?>>Ayah</option>
                                        <option value="ibu" <?php if ($jekel == "Perempuan") echo 'selected' ?>>Ibu</option>
                                    </select>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="simpan" class="btn btn-success btn-sm">Lanjutkan</button>
						<a href="?halaman=beranda" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $_SESSION['ortu'] = $_POST['ortu'];
    echo "<script language='javascript'>swal('Pilihan anda...', 'Berhasil Disimpan!', 'success');</script>";
      echo '<meta http-equiv="refresh" content="3; url=?halaman=request_penyerahan">';
}
?>