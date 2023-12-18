<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST" action="?halaman=laporan_pertahun">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM LAPORAN TAHUNAN</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Jenis Laporan</label>
									<select name="jenis_laporan" class="form-control">
                                        <option value="">--PILIH--</option>
                                        <option  value="baptis">Baptis</option>
                                        <option  value="penyerahan">Penyerahan Anak</option>
                                        <option  value="pernikahan">Pernikahan</option>
                                        <option  value="jemaat_tetap">Jemaat Tetap</option>
                                        <option  value="jemaat_sementara">Jemaat Sementara</option>
                                    </select>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="simpan" class="btn btn-success btn-sm">Lanjut</button>
						<a href="?halaman=beranda" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>
