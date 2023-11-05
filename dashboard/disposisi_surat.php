<?php

$id_pengguna = $_SESSION['password'];
if (isset($_GET['id_surat_masuk'])) {
	$id_surat_masuk = $_GET['id_surat_masuk'];
	$tampil_nik = "SELECT * FROM suratmasuk  WHERE id_surat_masuk=$id_surat_masuk";
	$query = mysqli_query($konek, $tampil_nik);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id_surat_masuk = $data['id_surat_masuk'];
    $noSurat = $data['no_surat_masuk'];
    $tgl1 = date('Y-m-d');
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
						<div class="card-title">DISPOSISI SURAT <?= $id_pengguna ?></div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
                            <div class="form-group">
									<label>Nomor Surat</label>
									<input type="text" name="no_surat_masuk" class="form-control" value="<?= $noSurat ?>" readonly>
								</div>
								<div class="form-group">
									<label>Tanggal Disposisi</label>
									<input type="date" name="tanggal_disposisi" class="form-control" value="<?= $tgl1 ?>">
								</div>
								<div class="form-group">
									<label>Dari</label>
									<select name="dari" class="form-control">
                                        <option value=""></option>
                                        <?php  $tampil = "SELECT * FROM operator where id_pengguna = '$id_pengguna'";
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                            $id_pengguna = $data['id_pengguna'];
                                             $nama = $data['nama'];
                                             $jabatan = $data['jabatan'];
                                         ?>
                                        <option selected value="<?= $id_pengguna?>"><?= $jabatan."-".$nama?></option>
                                        <?php } ?>
                                    </select>
								</div>
                                <div class="form-group">
									<label>Kepada</label>
									<select id="cari_pengguna" name="kepada" class="form-control">
                                        <option value=""></option>
                                        <?php  $tampil = "SELECT * FROM operator where id_pengguna != '$id_pengguna'";
                                         $query = mysqli_query($konek, $tampil);
                                         while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                            $id_pengguna = $data['id_pengguna'];
                                             $nama = $data['nama'];
                                             $jabatan = $data['jabatan'];
                                         ?>
                                        <option value="<?= $id_pengguna?>"><?= $jabatan."-".$nama?></option>
                                        <?php } ?>
                                    </select>
								</div>
                                <div class="form-group">
									<label>Isi Disposisis</label>
                                    <input type="text" name="isi_disposisi" class="form-control" ">
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="simpan" class="btn btn-success">Disposisi</button>
						<a href="?halaman=tampil_surat_masuk" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['simpan'])) {
	$id_surat_masuk = $id_surat_masuk;
	$tanggal_disposisi = $_POST['tanggal_disposisi'];
	$dari = $_POST['dari'];
	$kepada = $_POST['kepada'];
	$isi_disposisi = $_POST['isi_disposisi'];

	$sql = "INSERT INTO disposisi (id_surat_masuk,tanggal_disposisi,dari,kepada,isi_disposisi) VALUES ('$id_surat_masuk','$tanggal_disposisi','$dari','$kepada','$isi_disposisi')";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Disposisi Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_surat_masuk">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Disposisi Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=disposisi_surat">';
	}
}

?>