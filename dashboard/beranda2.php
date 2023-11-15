<?php
error_reporting(0);
if (!isset($_SESSION)) {
	session_start();
}
if (isset($_SESSION['password']) == "" || ($_SESSION['hak_akses']) == "") {
	header('location:po-admin.php');
} else {
	$hak_akses = $_SESSION['hak_akses'];
	$nama = $_SESSION['nama'];
	$id_pengguna = $_SESSION['password'];
}
?>
<?php
if ($hak_akses == "admin") {
?>
	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold">Halo <?php echo $nama; ?>!</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="page-inner">
		<!-- Card -->
		<h3 class="fw-bold">Selamat Datang di SISTEM INFORMASI MANAJEMEN GPdI BUKIT ZAITUN OESAPA</h3>
		<!-- Card With Icon States Background -->
		<br>
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<a href="?halaman=tampil_jemaat_baru">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="flaticon-user"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Permohonan Jemaat Baru</p>
									<?php
									$sql = "SELECT * FROM jemaat where status_j = 0";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									// $status = $data['status'];

									// if($status=="1"){
									// 	$count ="Belum ada request";
									// }


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<a href="?halaman=tampil_surat_masuk">
								<div class="col-icon">
									<div class="icon-big text-center icon-success bubble-shadow-small">
										<i class="flaticon-down-arrow"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Jumlah Surat Masuk</p>
									<?php
									$sql = "SELECT * FROM suratmasuk";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									// $status = $data['status'];

									// if($status=="1"){
									// 	$count ="Belum ada request";
									// }


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<a href="?halaman=tampil_surat_keluar">
								<div class="col-icon">
									<div class="icon-big text-center icon-warning bubble-shadow-small">
										<i class="flaticon-up-arrow"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Jumlah Surat Keluar</p>
									<?php
									$sql = "SELECT * FROM suratkeluar";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									// $status = $data['status'];

									// if($status=="1"){
									// 	$count ="Belum ada request";
									// }


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<h4>Data Permohonan</h4>
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<a href="?halaman=tampil_penyerahan">
								<div class="col-icon">
									<div class="icon-big text-center icon-success bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Permohonan Penyerahan Anak</p>
									<?php
									$sql = "SELECT * FROM penyerahan WHERE status=0";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									$status = $data['status'];

									// if($status=="1"){
									// 	$count ="Belum ada request";
									// }


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<a href="?halaman=tampil_baptis">
								<div class="col-icon">
									<div class="icon-big text-center icon-warning bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Permohonan Baptis</p>
									<?php
									$sql = "SELECT * FROM baptis WHERE status=0";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									$status = $data['status'];

									// if($status=="1"){
									// 	$count ="Belum ada request";
									// }


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<a href="?halaman=tampil_prnikahan">
								<div class="col-icon">
									<div class="icon-big text-center icon-secondary bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Permohonan Pernikahan</p>
									<?php
									$sql = "SELECT * FROM pernikahan WHERE status=0";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									$status = $data['status'];

									// if($status=="1"){
									// 	$count ="Belum ada request";
									// }


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jumlah Jemaat</h5>

              <!-- Pie Chart -->
              <div id="pieChart" style="min-height: 400px;" class="echart"></div>
			  <?php 
					$jumlah_jemaat = mysqli_query($konek,"SELECT * from jemaat where status_j > 0 ");
					$jum = mysqli_num_rows($jumlah_jemaat);
					?>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#pieChart")).setOption({
                    title: {
                      text: '<?= $jum ?>',
                      subtext: 'Orang',
                      left: 'center'
                    },
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      orient: 'vertical',
                      left: 'left'
                    },
                    series: [{
                      name: 'Jumlah',
                      type: 'pie',
                      radius: '50%',
                      data: [{
                          value: <?php 
					$jumlah_sementara = mysqli_query($konek,"SELECT * from jemaat where ket='0' and status_j > 0");
					echo mysqli_num_rows($jumlah_sementara);
					?>,
                          name: 'Jemaat Sementara'
                        },
                        {
                          value: <?php 
					$jumlah_tetap = mysqli_query($konek,"SELECT * from jemaat where ket='1' and status_j > 0");
					echo mysqli_num_rows($jumlah_tetap);
					?>,
                          name: 'Jemaat Tetap'
                        }
                      ],
                      emphasis: {
                        itemStyle: {
                          shadowBlur: 10,
                          shadowOffsetX: 0,
                          shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                      }
                    }]
                  });
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div>
    	    </div>
				
			<div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sebaran Jumlah Jemaat</h5>

              <!-- Bar Chart -->
              <div id="barChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#barChart")).setOption({
                    xAxis: {
                      type: 'category',
                      data: ['Kaum Pria', 'Kaum Wanita', 'Pemuda/i']
                    },
                    yAxis: {
                      type: 'value'
                    },
                    series: [{
                      data: [<?php 
					$jumlah_pria = mysqli_query($konek,"SELECT * from jemaat where pernikahan='1' and jenis_kelamin = 'Laki-laki'");
					echo mysqli_num_rows($jumlah_pria);
					?>, 
					<?php 
					$jumlah_wanita = mysqli_query($konek,"SELECT * from jemaat where pernikahan='1' and jenis_kelamin = 'Perempuan'");
					echo mysqli_num_rows($jumlah_wanita);
					?>, 
					<?php 
					$jumlah_pem = mysqli_query($konek,"SELECT * from jemaat where pernikahan='0'");
					echo mysqli_num_rows($jumlah_pem);
					?>],
                      type: 'bar'
                    }]
                  });
                });
              </script>
              <!-- End Bar Chart -->

            </div>
          </div>
    	    </div>
		</div>
	</div>
<?php
} elseif ($hak_akses == "member") {
?>
	<div class="panel-header bg-primary-gradient">
		<div class="page-inner py-5">
			<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
				<div>
					<h2 class="text-white pb-2 fw-bold">Halo <?php echo $nama; ?>!</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="page-inner">
		<!-- Card -->
		<h4 class="page-title">Selamat Datang di SISTEM INFORMASI MANAJEMEN GPdI BUKIT ZAITUN OESAPA</h4>
		<!-- Card With Icon States Background -->
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<a href="?halaman=tampil_disposisi">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Surat Masuk</p>
									<?php
									$sql = "SELECT * FROM disposisi where kepada = '$id_pengguna'";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									$status = $data['status'];


									?>
									<h4 class="card-title"><?php echo $count; ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jumlah Jemaat</h5>

              <!-- Pie Chart -->
              <div id="pieChart" style="min-height: 400px;" class="echart"></div>
			  <?php 
					$jumlah_jemaat = mysqli_query($konek,"SELECT * from jemaat where status_j > 0 ");
					$jum = mysqli_num_rows($jumlah_jemaat);
					?>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#pieChart")).setOption({
                    title: {
                      text: '<?= $jum ?>',
                      subtext: 'Orang',
                      left: 'center'
                    },
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      orient: 'vertical',
                      left: 'left'
                    },
                    series: [{
                      name: 'Jumlah',
                      type: 'pie',
                      radius: '50%',
                      data: [{
                          value: <?php 
					$jumlah_sementara = mysqli_query($konek,"SELECT * from jemaat where ket='0' and status_j > 0");
					echo mysqli_num_rows($jumlah_sementara);
					?>,
                          name: 'Jemaat Sementara'
                        },
                        {
                          value: <?php 
					$jumlah_tetap = mysqli_query($konek,"SELECT * from jemaat where ket='1' and status_j > 0");
					echo mysqli_num_rows($jumlah_tetap);
					?>,
                          name: 'Jemaat Tetap'
                        }
                      ],
                      emphasis: {
                        itemStyle: {
                          shadowBlur: 10,
                          shadowOffsetX: 0,
                          shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                      }
                    }]
                  });
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div>
    	    </div>
				
			<div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sebaran Jumlah Jemaat</h5>

              <!-- Bar Chart -->
              <div id="barChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#barChart")).setOption({
                    xAxis: {
                      type: 'category',
                      data: ['Kaum Pria', 'Kaum Wanita', 'Pemuda/i']
                    },
                    yAxis: {
                      type: 'value'
                    },
                    series: [{
                      data: [<?php 
					$jumlah_pria = mysqli_query($konek,"SELECT * from jemaat where pernikahan='1' and jenis_kelamin = 'Laki-laki'");
					echo mysqli_num_rows($jumlah_pria);
					?>, 
					<?php 
					$jumlah_wanita = mysqli_query($konek,"SELECT * from jemaat where pernikahan='1' and jenis_kelamin = 'Perempuan'");
					echo mysqli_num_rows($jumlah_wanita);
					?>, 
					<?php 
					$jumlah_pem = mysqli_query($konek,"SELECT * from jemaat where pernikahan='0'");
					echo mysqli_num_rows($jumlah_pem);
					?>],
                      type: 'bar'
                    }]
                  });
                });
              </script>
              <!-- End Bar Chart -->

            </div>
          </div>
    	    </div>
		</div>
	</div>
<?php
}elseif ($hak_akses == "gembala") {
	?>
		<div class="panel-header bg-primary-gradient">
			<div class="page-inner py-5">
				<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
					<div>
						<h2 class="text-white pb-2 fw-bold">Halo <?php echo $nama; ?>!</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="page-inner">
			<!-- Card -->
			<h4 class="page-title">SISTEM INFORMASI MANAJEMEN GPdI BUKIT ZAITUN OESAPA</h4>
			<!-- Card With Icon States Background -->
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<a href="?halaman=tampil_disposisi">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="flaticon-envelope-1"></i>
										</div>
									</div>
								</a>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">disposisi</p>
										<?php
										$sql = "SELECT * FROM disposisi where kepada = '$id_pengguna'";
										$query = mysqli_query($konek, $sql);
										$data = mysqli_fetch_array($query, MYSQLI_BOTH);
										$count = mysqli_num_rows($query);
										$status = $data['status'];
	
	
										?>
										<h4 class="card-title"><?php echo $count; ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<a href="?halaman=tampil_surat_masuk">
								<div class="col-icon">
									<div class="icon-big text-center icon-success bubble-shadow-small">
										<i class="flaticon-envelope-1"></i>
									</div>
								</div>
							</a>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Surat Masuk</p>
									<?php
									$sql = "SELECT * FROM suratmasuk";
									$query = mysqli_query($konek, $sql);
									$data = mysqli_fetch_array($query, MYSQLI_BOTH);
									$count = mysqli_num_rows($query);
									$status = $data['status'];

									// if($status=="1"){
									// 	$count ="Belum ada request";
									// }


										?>
										<h4 class="card-title"><?php echo $count; ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
			<div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jumlah Jemaat</h5>

              <!-- Pie Chart -->
              <div id="pieChart" style="min-height: 400px;" class="echart"></div>
			  <?php 
					$jumlah_jemaat = mysqli_query($konek,"SELECT * from jemaat where status_j > 0 ");
					$jum = mysqli_num_rows($jumlah_jemaat);
					?>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#pieChart")).setOption({
                    title: {
                      text: '<?= $jum ?>',
                      subtext: 'Orang',
                      left: 'center'
                    },
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      orient: 'vertical',
                      left: 'left'
                    },
                    series: [{
                      name: 'Jumlah',
                      type: 'pie',
                      radius: '50%',
                      data: [{
                          value: <?php 
					$jumlah_sementara = mysqli_query($konek,"SELECT * from jemaat where ket='0' and status_j > 0");
					echo mysqli_num_rows($jumlah_sementara);
					?>,
                          name: 'Jemaat Sementara'
                        },
                        {
                          value: <?php 
					$jumlah_tetap = mysqli_query($konek,"SELECT * from jemaat where ket='1' and status_j > 0");
					echo mysqli_num_rows($jumlah_tetap);
					?>,
                          name: 'Jemaat Tetap'
                        }
                      ],
                      emphasis: {
                        itemStyle: {
                          shadowBlur: 10,
                          shadowOffsetX: 0,
                          shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                      }
                    }]
                  });
                });
              </script>
              <!-- End Pie Chart -->

            </div>
          </div>
    	    </div>
				
			<div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sebaran Jumlah Jemaat</h5>

              <!-- Bar Chart -->
              <div id="barChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#barChart")).setOption({
                    xAxis: {
                      type: 'category',
                      data: ['Kaum Pria', 'Kaum Wanita', 'Pemuda/i']
                    },
                    yAxis: {
                      type: 'value'
                    },
                    series: [{
                      data: [<?php 
					$jumlah_pria = mysqli_query($konek,"SELECT * from jemaat where pernikahan='1' and jenis_kelamin = 'Laki-laki'");
					echo mysqli_num_rows($jumlah_pria);
					?>, 
					<?php 
					$jumlah_wanita = mysqli_query($konek,"SELECT * from jemaat where pernikahan='1' and jenis_kelamin = 'Perempuan'");
					echo mysqli_num_rows($jumlah_wanita);
					?>, 
					<?php 
					$jumlah_pem = mysqli_query($konek,"SELECT * from jemaat where pernikahan='0'");
					echo mysqli_num_rows($jumlah_pem);
					?>],
                      type: 'bar'
                    }]
                  });
                });
              </script>
              <!-- End Bar Chart -->

            </div>
          </div>
    	    </div>
		</div>
		</div>
	<?php
	}
?>

<!-- Vendor JS Files -->
<script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>