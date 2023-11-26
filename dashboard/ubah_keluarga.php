<?php
if (isset($_GET['id_kk'])) {
	$id_kk = $_GET['id_kk'];
	$tampil_kk = "SELECT * FROM kepala_keluarga where id_kk=$id_kk";
	$query = mysqli_query($konek, $tampil_kk);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id_kk = $data['id_kk'];
	$id_kepala = $data['id_jemaat'];
}

?>

<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST">
				<div class="card">
					<div class="card-header">
						<div class="card-title">UBAH KEPALA KELUARGA</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
                                    <label>NIK - NAMA</label>
									<select id="cari_jemaat" name="id_jemaat" class="form-control">
                                        <option value=""></option>
                                        <?php  $tampil = "SELECT * FROM anggota_keluarga a join jemaat j on a.id_jemaat = j.id_jemaat where id_kk=$id_kk";
                                         $query2 = mysqli_query($konek, $tampil);
                                         while ($data2 = mysqli_fetch_array($query2, MYSQLI_BOTH)) {
											$id_jemaat = $data2['id_jemaat'];
                                             $nik = $data2['nik'];
                                             $nama = $data2['nama'];
                                         ?>
                                        <option <?php if($id_kepala == $id_jemaat){ echo "selected";} ?>  value="<?= $id_jemaat?>"><?= $nik."-".$nama?></option>
                                        <?php } ?>
                                    </select>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success">Ubah</button>
						<a href="?halaman=tampil_keluarga" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	$id_jemaat = $_POST['id_jemaat'];

	$sql = "UPDATE kepala_keluarga SET
	id_jemaat='$id_jemaat'WHERE id_kk=$id_kk";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_keluarga">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=ubah_keluarga">';
	}
}

?>