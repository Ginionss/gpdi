<?php include '../konek.php'; ?>
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
									<label>Anda Adalah</label>
                                    <select class="form-control" name="mempelai" id="">
                                        <option value="pria">Mempelai Pria</option>
                                        <option value="wanita">Mempelai Wanita</option>
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
    $_SESSION['mempelai'] = $_POST['mempelai'];
    echo "<script language='javascript'>swal('Pilihan anda...', 'Berhasil Disimpan!', 'success');</script>";
      echo '<meta http-equiv="refresh" content="3; url=?halaman=request_pernikahan">';
}
?>