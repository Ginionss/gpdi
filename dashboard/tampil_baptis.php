<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="card-title">Data Baptis</h4>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="add1" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Tanggal Request</th>
									<th>Nama</th>
									<th>Nama Orang Tua</th>
									<th>Status</th>
									<th>Keterangan</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "SELECT * FROM baptis b natural join jemaat j where b.nik = j.nik";
								$query = mysqli_query($konek, $sql);
								while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
									$id_baptis = $data['id_baptis'];
                                    $tgl = $data['tanggal_request'];
									$format = date('d F Y', strtotime($tgl));
									$nik = $data['nik'];
									$nama = $data['nama'];
									$nama_ayah = $data['nama_ayah'];
									$nama_ibu = $data['nama_ibu'];
									$status = $data['status'];
									$keterangan = $data['keterangan'];

									if ($status == "1") {
										$status = "<b style='color:blue'>ACC</b>";
									} elseif ($status == "0") {
										$status = "<b style='color:red'>BELUM ACC</b>";
									}
								?>
									<tr>
										<td><?php echo $format; ?></td>
										<td><?php echo $nama; ?></td>
										<td><?php echo $nama_ayah ."<br>". $nama_ibu; ?></td>
										<td><?php echo $status; ?></td>
										<td><?php echo $keterangan; ?></td>
										<td>
											<div class="form-button-action">
												<a href="?halaman=view_cetak_sktm&id_request_sktm=<?= $id_request_sktm; ?>">
													<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Cetak">
														<i class="fa fa-edit"></i>
													</button>
												</a>
											</div>
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>