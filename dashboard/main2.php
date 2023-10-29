<?php
 session_start();
 if (isset($_SESSION['password'])=="" || ($_SESSION['hak_akses'])=="")  {
 header('location:login.php');
 }
 else{
 $hak_akses = $_SESSION['hak_akses'];
 }
 ?>
<?php include 'header.php'; ?>
<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a href="main2.php">
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
							if($hak_akses=="admin"){
						?>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
							<i class="fas fa-user-alt"></i>
								<p>Data Pengguna</p>
								<span class="caret"></span>
							</a>
						<ul class="nav nav-collapse">
									<li>
										<a href="?halaman=tampil_admin">
											<span class="sub-item">Pengurus</span>
										</a>
									</li>
									<li>
										<a href="?halaman=tampil_user">
											<span class="sub-item">User</span>
										</a>
									</li>
								</ul>
						</li>
						<li class="nav-item">
							<a href="?halaman=tampil_jemaat">
								<i class="fas fa-user-alt"></i>
								<p>Data Jemaat</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-envelope"></i>
								<p>Arsip Surat</p>
								<span class="caret"></span>
							</a>
						<ul class="nav nav-collapse">
									<li>
										<a href="?halaman=tampil_surat_masuk">
											<span class="sub-item">Surat Masuk</span>
										</a>
									</li>
									<li>
										<a href="?halaman=tampil_surat_keluar">
											<span class="sub-item">Surat Keluar</span>
										</a>
									</li>
								</ul>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-calendar-check"></i>
								<p>Pelayanan</p>
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
									<li>
										<a href="?halaman=tampil_warta">
											<span class="sub-item">Warta Jemaat</span>
										</a>
									</li>
								</ul>
						</li>


						<!-- <li class="nav-item">
							<a href="?halaman=permohonan_surat">
								<i class="far fa-calendar-check"></i>
								<p>Cetak Surat</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?halaman=surat_dicetak">
								<i class="far fa-calendar-check"></i>
								<p>Surat Selesai</p>
							</a>
						</li> -->
						<?php
							 }elseif($hak_akses=="member"){
						?>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="?halaman=laporan_perbulan">
											<span class="sub-item">Perbulan</span>
										</a>
									</li>
									<li>
										<a href="?halaman=laporan_pertahun">
											<span class="sub-item">Pertahun</span>
										</a>
									</li>
								</ul>
							</div>
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
          if(isset($_GET['halaman'])){
            $hal = $_GET['halaman'];
            switch($hal){
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
			  case 'permohonan_surat';
                include 'permohonan_surat.php';
              break;
			  //admin
			  case 'tampil_admin';
			  include 'tampil_admin.php';
				break;
				case 'tambah_admin';
				  include 'tambah_admin.php';
				break;
				case 'ubah_admin';
				  include 'ubah_admin.php';
				break;
			  //user
			  case 'tampil_user';
                include 'tampil_user.php';
			  break;
			  case 'tambah_user';
                include 'tambah_user.php';
			  break;
			  case 'ubah_user';
                include 'ubah_user.php';
			  break;
			  //jemaat
			  case 'tampil_jemaat';
                include 'tampil_jemaat.php';
			  break;
			  case 'tambah_jemaat';
			  include 'tambah_jemaat.php';
			break;
			case 'ubah_jemaat';
			  include 'ubah_jemaat.php';
			break;
			//surat masuk
			case 'tampil_surat_masuk';
			include 'tampil_surat_masuk.php';
		  break;
			//surat keluar
			case 'tampil_surat_keluar';
			include 'tampil_surat_keluar.php';
		  break;
		  //baptis
			  case 'tampil_baptis';
			  include 'tampil_baptis.php';
			break;
		  //penyerahan
			  case 'tampil_penyerahan';
			  include 'tampil_penyerahan.php';
			break;
		  //pernikahan
			  case 'tampil_pernikahan';
			  include 'tampil_pernikahan.php';
			break;
		  //warta jemaat
			  case 'tampil_warta';
			  include 'tampil_warta.php';
			break;
			case 'tambah_warta';
			  include 'tambah_warta.php';
			break;
			case 'ubah_warta';
			  include 'ubah_warta.php';
			break;
			//laporan
			  case 'laporan_perbulan';
                include 'laporan_perbulan.php';
			  break;
			  case 'laporan_pertahun';
                include 'laporan_pertahun.php';
			  break;
              default:
                echo "<center>HALAMAN KOSONG</center>";
              break;
            }
          }else{
            include 'beranda2.php';
          }
        ?>
			</div>
<?php include 'footer.php'; ?>

<script src="../assets/tinymce/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("add");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

tinymce.init({
    pemilih: '#myTextarea' 
});
</script>
