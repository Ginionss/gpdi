<?php include '../konek.php';
if (isset($_GET['id_kk'])) {
	$id_kk = $_GET['id_kk'];
} ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
	<div class="row">
		<div class="col-md-12">
			<form method="POST">
				<div class="card">
					<div class="card-header">
						<div class="card-title">FORM TAMBAH KEPALA KELUARGA</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>NIK - NAMA</label>
									<select id="cari_jemaat" name="id_jemaat" class="form-control">
                                        <option value=""></option>
                                        <?php  $tampil = "SELECT * FROM jemaat where pernikahan = 1 and jenis_kelamin = 'Laki-laki' and status_j > 0";
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
											$id_jemaat = $data['id_jemaat'];
                                             $nik = $data['nik'];
                                             $nama = $data['nama'];
                                         ?>
                                        <option  value="<?= $id_jemaat?>"><?= $nik."-".$nama?></option>
                                        <?php } ?>
                                    </select>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
						<a href="?halaman=tampil_keluarga" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$id_jemaat = $_POST['id_jemaat'];

	$sql = "INSERT INTO kepala_keluarga (id_jemaat) VALUES ('$id_jemaat')";
	$query = mysqli_query($konek, $sql);

    
    $sql2 = "SELECT COUNT(id_kk) as jum_kk from kepala_keluarga";
    $query2 = mysqli_fetch_array(mysqli_query($konek, $sql2));
    $jumlah = $query2['jum_kk'];

    $sql3 = "INSERT INTO anggota_keluarga (id_kk,id_jemaat) VALUES ('$jumlah','$id_jemaat')";
	$query3 = mysqli_query($konek, $sql3);
	

	if ($query && $query3) {
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_keluarga">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tambah_keluarga">';
	}
}
?>