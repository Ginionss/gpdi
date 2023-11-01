<?php
session_start();
if (isset($_SESSION['password']) == "" || ($_SESSION['hak_akses']) == "") {
	header('location:login.php');
} else {
	$hak_akses = $_SESSION['hak_akses'];
	$nama = $_SESSION['nama'];
	$nik = $_SESSION['nik'];
}
?>
<?php include 'header.php'; ?>
<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<ul class="nav nav-primary">
				<li class="nav-item active">
					<a href="main.php">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">fitur</h4>
				</li>
				<?php
				if ($hak_akses == "Pemohon") {
				?>
					<li class="nav-item">
						<a href="?halaman=tampil_pemohon">
							<i class="fas fa-user-alt"></i>
							<p>Biodata Anda</p>
						</a>
					</li>
					<!-- <li class="nav-item">
						<a href="?halaman=tampil_status">
							<i class="far fa-calendar-check"></i>
							<p>Status Request</p>
						</a>
					</li> -->
					<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
							<i class="far fa-calendar-check"></i>
							<p>Status Request</p>
								<span class="caret"></span>
							</a>
						<ul class="nav nav-collapse">
									<li>
										<a href="?halaman=tampil_baptis">
											<span class="sub-item">Baptis</span>
										</a>
									</li>
									<li>
										<a href="?halaman=tampil_penyerahan">
											<span class="sub-item">Penyerahan Anak</span>
										</a>
									</li>
									<li>
										<a href="?halaman=tampil_pernikahan">
											<span class="sub-item">Pernikahan</span>
										</a>
									</li>
								</ul>
						</li>
				<?php
				}
				?>
				<li class="mx-4 mt-2">
					<a href="logout.php" class="btn btn-danger btn-block"><span class="btn-label mr-2"> <i class="icon-logout"></i> </span>Logout</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- End Sidebar -->

<div class="main-panel">
	<div class="content">
		<?php
		if (isset($_GET['halaman'])) {
			$hal = $_GET['halaman'];
			switch ($hal) {
				case 'beranda';
					include 'beranda.php';
					break;
				//pemohon
				case 'ubah_pemohon';
					include 'ubah_pemohon.php';
					break;
				case 'tampil_pemohon';
					include 'tampil_pemohon.php';
					break;
				case 'tampil_user';
					include 'tampil_user.php';
					break;
				case 'tambah_user';
					include 'tambah_user.php';
					break;
				case 'ubah_user';
					include 'ubah_user.php';
					break;
				//penyerahan
				case 'transit_penyerahan';
				include 'transit_penyerahan.php';
				break;
				case 'request_penyerahan';
				include 'request_penyerahan.php';
				break;
				case 'tampil_penyerahan';
				include 'tampil_penyerahan.php';
			  break;
				//baptis
				case 'request_baptis';
				include 'request_baptis.php';
				break;
				case 'tampil_baptis';
				include 'tampil_baptis.php';
			  break;
				//pernikahan
				case 'transit_pernikahan';
				include 'transit_pernikahan.php';
				break;
				case 'request_pernikahan';
				include 'request_pernikahan.php';
				break;
				case 'tampil_pernikahan';
				include 'tampil_pernikahan.php';
			  break;
				default:
					echo "<center>HALAMAN KOSONG</center>";
					break;
			}
		} else {
			include 'beranda.php';
		}
		?>
	</div>
	<?php include 'footer.php'; ?>