<?php
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['password']) == "" || ($_SESSION['hak_akses']) == "") {
	header('location:login.php');
} else {
	$hak_akses = $_SESSION['hak_akses'];
	$nama = $_SESSION['nama'];
	$id_jemaat = $_SESSION['nik'];
	$tampil_nik = "SELECT * FROM jemaat WHERE id_jemaat=$_SESSION[nik]";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$nik = $data['nik'];
	$baptis = $data['baptis'];
	$penyerahan = $data['penyerahan'];
	$pernikahan = $data['pernikahan'];
	$status_j = $data['ket'];
	$jekel = $data['jenis_kelamin'];
}
?>
<?php
if ($hak_akses == "Pemohon") {
?>
	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold">Halo <?php echo $nama; ?>!</h2>
					<h5 class="text-white op-7 mb-2">Sebelum Anda Melakukan Request Surat Mohon Pastikan Biodata dan keluarga Sudah Benar, Klik Biodata Anda atau Data Keluarga</h5>
					<h7 class="text-white op-7 mb-2">(Tombol Request akan muncul otomatis apabila Biodata anda sudah lengkap)</h7>
				</div>
				<div class="ml-md-auto py-2 py-md-0">
					<a href="?halaman=tampil_pemohon" class="btn btn-sm btn-primary btn-round"><span class="btn-label">
							<i class="fas fa-user"></i> Biodata Anda</a>
				</div>
			</div>
		</div>
	</div>
	<div class="page-inner mt--5">
		<div class="row mt--2">
			<?php if ($pernikahan > 0 && $pernikahan < 3 && $status_j == 1 && $status_ak != "Anak") {?>
			<div class="col-md-3 pr-md-0">
				<div class="card-pricing2 card-primary">
					<div class="pricing-header">
						<h6 class="fw-bold text-center text-uppercase">Penyerahan Anak</h6>
					</div>
					<div class="price-value">
						<div class="value">
							<span class="currency"></span>
							<span class="amount"><i class="flaticon-envelope-1"></i><span></span></span>
							<span class="month"></span>
						</div>
					</div>
					<ul class="pricing-content">
					</ul>
					<?php if ($nik != null) {?>
					<a href="?halaman=request_penyerahan&id_kk=<?= $id_kk?>" class="btn btn-primary btn-round btn-sm mb-3">
						<span class="btn-label">
							<i class="fas fa-plus-circle"></i>
						</span> Request</a>
					<?php }?>
				</div>
			</div>
			<?php }
			if ($baptis == 0) {?>
			<div class="col-md-3 pr-md-0">
				<div class="card-pricing2 card-success">
					<div class="pricing-header">
						<h6 class="fw-bold text-center text-uppercase">Baptis</h6>
					</div>
					<div class="price-value">
						<div class="value">
							<span class="currency"></span>
							<span class="amount"><i class="flaticon-envelope-1"></i><span></span></span>
							<span class="month"></span>
						</div>
					</div>
					<ul class="pricing-content">
					</ul>
					<?php if ($nik != null) {?>
					<a href="?halaman=request_baptis&status_j=<?= $status_j?>" class="btn btn-success btn-round btn-sm mb-3">
						<span class="btn-label">
							<i class="fas fa-plus-circle"></i></span> Request</a>
					<?php }?>
				</div>
			</div>
			<?php }
			if ($pernikahan == 0 || $pernikahan == 2) {?>
			<div class="col-md-3 pr-md-0">
				<div class="card-pricing2 card-secondary">
					<div class="pricing-header">
						<h6 class="fw-bold text-center text-uppercase">Pernikahan</h6>
					</div>
					<div class="price-value">
						<div class="value">
							<span class="currency"></span>
							<span class="amount"><i class="flaticon-envelope-1"></i><span></span></span>
							<span class="month"></span>
						</div>
					</div>
					<ul class="pricing-content">
					</ul>
					<?php if ($nik != null) {?>
					<a href="?halaman=request_pernikahan&jekel=<?= $jekel ?>" class="btn btn-secondary btn-round btn-sm mb-3">
						<span class="btn-label">
							<i class="fas fa-plus-circle"></i> Request</a>
					<?php }?>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
<?php
} ?>