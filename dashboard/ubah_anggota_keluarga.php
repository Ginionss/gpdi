<?php
if (isset($_GET['id_ak'])) {
	$id_ak = $_GET['id_ak'];
	$tampil_ak = "SELECT * FROM anggota_keluarga  where id_ak=$id_ak";
	$query = mysqli_query($konek, $tampil_ak);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id_ak = $data['id_ak'];
	$id_kk = $data['id_kk'];
	$id_kepala = $data['id_jemaat'];
    $ak_status = $data['status_ak'];
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
						<div class="card-title">UBAH ANGGOTA KELUARGA</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6 col-lg-6">
								<div class="form-group">
                                    <label>NIK - NAMA</label>
									<select name="id_jemaat" class="form-control">
                                        <?php  $tampil = "SELECT * FROM anggota_keluarga a join jemaat j on a.id_jemaat = j.id_jemaat where id_kk=$id_kk and a.id_ak=$id_ak";
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
                                <div class="form-group">
									<label>Status dalam Keluarga</label>
									<select id="cari_jemaat" name="status_ak" class="form-control">
                                        <option <?php if($ak_status == "Anak") { echo "selected";} ?>  value="Anak">Anak</option>
                                        <?php 
                                    $tampil1 = "SELECT * FROM kepala_keluarga k join jemaat j where k.id_jemaat = j.id_jemaat";
                                    $query1 = mysqli_fetch_array(mysqli_query($konek, $tampil1));
                                    $jekel = $query1['jenis_kelamin']; 
                                    if ($jekel == "Laki-laki") {?>
                                        <option <?php if($ak_status == "Isteri") { echo "selected";} ?>  value="Isteri">Isteri</option>
                                    <?php }else{ ?>
                                        <option <?php if($ak_status == "Suami") { echo "selected";} ?>  value="Suami">Suami</option>
                                   <?php }?>
                                    </select>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action">
						<button name="ubah" class="btn btn-success">Ubah</button>
						<a href="?halaman=tampil_anggota_keluarga&id_kk=<?php echo $id_kk; ?>" class="btn btn-default">Batal</a>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>

<?php
if (isset($_POST['ubah'])) {
	$id_jemaat = $_POST['id_jemaat'];
	$status_ak = $_POST['status_ak'];

	$sql = "UPDATE anggota_keluarga SET
	id_jemaat='$id_jemaat',
    status_ak ='$status_ak' WHERE id_ak=$id_ak";
	$query = mysqli_query($konek, $sql);

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Ubah Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=beranda">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Ubah Gagal', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=?halaman=beranda">';
	}
}

?>