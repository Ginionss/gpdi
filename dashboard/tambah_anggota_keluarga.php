<?php include '../konek.php';
if (isset($_GET['id_kk'])) {
	$id_kk = $_GET['id_kk'];
	$tampil_kk = "SELECT * FROM kepala_keluarga where id_kk=$id_kk";
	$query = mysqli_query($konek, $tampil_kk);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id_kk = $data['id_kk'];
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
						<div class="card-title">FORM TAMBAH ANGGOTA KELUARGA</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
                                <input type="hidden" name="id_kk" value="<?= $id_kk?>">
								<div class="form-group">
									<label>NIK - NAMA</label>
									<select id="cari_jemaat" name="id_jemaat" class="form-control">
                                        <option value=""></option>
                                        <?php  $tampil = "SELECT * FROM jemaat where status_j > 0 and ket = 1 and nik != ''";
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
											$id_jemaat = $data['id_jemaat'];
                                             $nik = $data['nik'];
                                             $nama = $data['nama'];

											 $tampil1 = "SELECT * FROM anggota_keluarga where id_jemaat = '$id_jemaat'";
											 $query1 = mysqli_fetch_array(mysqli_query($konek, $tampil1));
											 if (!isset($query1)) {
                                         ?>
                                        <option  value="<?= $id_jemaat?>"><?= $nik."-".$nama?></option>
                                        <?php }
									} ?>
                                    </select>
								</div>
                                <div class="form-group">
									<label>Status dalam Keluarga</label>
									<select id="cari_jemaat" name="status_ak" class="form-control">
                                        <option  value="Anak">Anak</option>
                                        <?php 
									// 	$tampil11 = "SELECT * FROM anggota_keluarga where id_kk = '$id_kk' and status_ak = 'Suami' or status_ak = 'Istri'";
                                    // $query11 = mysqli_fetch_array(mysqli_query($konek, $tampil11));
									// 	if (!isset($query11)) {
                                    $tampil1 = "SELECT * FROM kepala_keluarga k join jemaat j where k.id_jemaat = j.id_jemaat and id_kk = '$id_kk'";
                                    $query1 = mysqli_fetch_array(mysqli_query($konek, $tampil1));
                                    $jekel = $query1['jenis_kelamin']; 
                                    if ($jekel == "Laki-laki") {?>
                                        <option  value="Istri">Istri</option>
                                    <?php }else if($jekel == "Perempuan"){ ?>
                                        <option  value="Suami">Suami</option>
                                   <?php }
								// }
								?>
                                    </select>
								</div>
							</div>
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
								<label>*Klik tomboh di bawah jika anggota keluarga yang ingin anda tambahkan <br> belum ada dalam list</label><br>
								<a href="?halaman=tambah_jemaat_ak&id_kk=<?php echo $id_kk; ?>" class="btn btn-default btn-sm">Tambah Jemaat</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
						<a href="?halaman=tampil_anggota_keluarga&id_kk=<?php echo $id_kk; ?>" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$id_kk = $_POST['id_kk'];
	$id_jemaat = $_POST['id_jemaat'];
	$status_ak = $_POST['status_ak'];

    $sql3 = "INSERT INTO anggota_keluarga (id_kk,id_jemaat,status_ak) VALUES ('$id_kk','$id_jemaat','$status_ak')";
	$query3 = mysqli_query($konek, $sql3);
	

	if ($query3) {
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=beranda">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=beranda">';
	}
}
?>