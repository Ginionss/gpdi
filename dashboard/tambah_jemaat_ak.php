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
						<div class="card-title">FORM TAMBAH DATA ANGGOTA KELUARGA</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
									<label>Tanggal Pendaftaran</label>
									<input type="date" name="tanggal_pendaftaran" class="form-control" value="<?= date('Y-m-d'); ?>" readonly>
								</div>
                                <input type="hidden" name="id_kk" value="<?= $id_kk?>">
								<div class="form-group">
									<label>NIK</label>
									<input type="number" name="nik" class="form-control" placeholder="NIK.." autofocus>
								</div>
								<div class="form-group">
									<label>Nama</label>
									<input type="nama" name="nama" class="form-control" placeholder="Nama..">
								</div>
								<div class="form-group">
									<label>Tempat Lahir</label>
									<input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir..">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>
									<input type="date" name="tanggal" class="form-control">
								</div>
								<div class="form-group">
									<label>Nomor HP</label>
									<input type="text" name="no_hp" class="form-control">
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>
									<select name="jekel" class="form-control">
										<option disabled="" selected="">Pilih Jenis Kelamin</option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="form-group">
									<label>Alamat</label>
									<textarea name="alamat" class="form-control" cols="30" rows="10" placeholder="Alamat.."></textarea>
								</div>
                                <div class="form-group">
									<label>Status dalam Keluarga</label>
									<select id="cari_jemaat" name="status_ak" class="form-control">
                                        <option  value="Anak">Anak</option>
                                        <?php
										$tampil11 = "SELECT * FROM anggota_keluarga where id_kk = '$id_kk' and status_ak = 'Suami' OR status_ak = 'Istri' ";
                                    $query11 = mysqli_fetch_array(mysqli_query($konek, $tampil11));
										if (!isset($query11)) {
                                    $tampil1 = "SELECT * FROM kepala_keluarga k join jemaat j where k.id_jemaat = j.id_jemaat";
                                    $query1 = mysqli_fetch_array(mysqli_query($konek, $tampil1));
                                    $jekel = $query1['jenis_kelamin']; 
                                    if ($jekel == "Laki-laki") {?>
                                        <option  value="Istri">Istri</option>
                                    <?php }else{ ?>
                                        <option  value="Suami">Suami</option>
                                   <?php }  
								}?>
                                    </select>
								</div>
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="username" class="form-control" placeholder="Username..">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="text" name="password" class="form-control" placeholder="Password..">
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="simpan" class="btn btn-success btn-sm">Simpan</button>
						<a href="?halaman=tambah_anggota_keluarga&id_kk=<?php echo $id_kk; ?>" class="btn btn-default btn-sm">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];
	$id_kk = $_POST['id_kk'];
	$nik = $_POST['nik'];
	$tempat = $_POST['tempat'];
	$tanggal = $_POST['tanggal'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$jekel = $_POST['jekel'];
	$alamat = $_POST['alamat'];
	$ket = 1;
	$username = $_POST['username'];
	$password = $_POST['password'];
	$status = 1;
	$status_ak = $_POST['status_ak'];

	$sql = "INSERT INTO jemaat (tanggal_pendaftaran,nik,nama,jenis_kelamin,tempat_lahir,tanggal_lahir,no_hp,alamat,status_j,ket,username,password) VALUES ('$tanggal_pendaftaran','$nik','$nama','$jekel','$tempat','$tanggal','$no_hp','$alamat','$status','$ket','$username','$password')";
	$query = mysqli_query($konek, $sql);

	$sql2 = "SELECT MAX(id_jemaat) as jum_kk from jemaat";
	$query2 = mysqli_fetch_assoc(mysqli_query($konek, $sql2));
	$jumlah = $query2['jum_kk'];

	if ($query) {
		$sql3 = "INSERT INTO anggota_keluarga (id_kk,id_jemaat,status_ak) VALUES ('$id_kk','$jumlah','$status_ak')";
		$query3 = mysqli_query($konek, $sql3);
		echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=beranda">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=beranda">';
	}
}
?>