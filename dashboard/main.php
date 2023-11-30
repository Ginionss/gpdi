<?php
session_start();
include '../konek.php';
if (isset($_SESSION['password']) == "" || ($_SESSION['hak_akses']) == "") {
	header('location:login.php');
} else {
	$hak_akses = $_SESSION['hak_akses'];
	$nama = $_SESSION['nama'];
	$nik = $_SESSION['nik'];
	$tampil_kk = "SELECT * FROM kepala_keluarga k join jemaat j on k.id_jemaat = j.id_jemaat join anggota_keluarga a where k.id_jemaat=$nik or a.id_jemaat=$nik or j.id_jemaat=$nik";
	$query = mysqli_query($konek, $tampil_kk);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	if (isset($data)) {
		$id_kk = $data['id_kk'];
		$jekel = $data['jenis_kelamin'];
		$status_j = $data['ket'];
		$status_ak = $data['status_ak'];
		$pernikahan = $data['pernikahan'];
	}
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
					
				<?php
				if (isset($id_kk)) {
				?>
						<li class="nav-item">
							<a href="?halaman=tampil_anggota_keluarga&id_kk=<?php echo $id_kk; ?>">
								<i class="fas fa-list"></i>
								<p>Data Keluarga</p>
							</a>
						</li>
				<?php } ?>
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
										<a href="?halaman=tampil_pernikahan">
											<span class="sub-item">Pernikahan</span>
										</a>
									</li>
									<?php if ($status_j == 1 && $pernikahan > 0 && $pernikahan < 3) {?>
									<li>
										<a href="?halaman=tampil_penyerahan">
											<span class="sub-item">Penyerahan Anak</span>
										</a>
									</li>
									<?php } ?>
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
				//anggota keluarga
				case 'tampil_anggota_keluarga';
				  include 'tampil_anggota_keluarga.php';
				break;
				case 'tambah_anggota_keluarga';
				  include 'tambah_anggota_keluarga.php';
				break;
				case 'ubah_anggota_keluarga';
				  include 'ubah_anggota_keluarga.php';
				break;
				case 'view_jemaat_ak';
				  include 'view_jemaat_ak.php';
				break;
				case 'ubah_jemaat_ak';
				  include 'ubah_jemaat_ak.php';
				break;
				case 'tambah_jemaat_ak';
				  include 'tambah_jemaat_ak.php';
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
			  case 'ubah_penyerahan';
			  include 'ubah_penyerahan.php';
			break;
			case 'view_penyerahan';
			include 'lihat_penyerahan.php';
		  break;
				//baptis
				case 'request_baptis';
				include 'request_baptis.php';
				break;
				case 'tampil_baptis';
				include 'tampil_baptis.php';
			  break;
			  case 'ubah_baptis';
			  include 'ubah_baptis.php';
			break;
			case 'view_baptis';
			include 'lihat_baptis.php';
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
			  case 'ubah_pernikahan';
			  include 'ubah_pernikahan.php';
			break;
			case 'view_pernikahan';
			include 'lihat_pernikahan.php';
		  break;

			//default
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