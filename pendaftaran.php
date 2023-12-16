<?php include 'konek.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Halaman Login Pemohon</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="main/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="main/vendors/base/vendor.bundle.base.css">
  <link href="main/css/sweetalert.css" rel="stylesheet" type="text/css">
  <!-- <script src="main/js/jquery-2.1.3.min.js"></script> -->
  <script src="main/js/sweetalert.min.js"></script>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="main/css/style.css">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="main/img/gpdi.png" width="150" height="54" alt="logo">
              </div>
              <h4>PENDAFTARAN JEMAAT BARU</h4>
              <h6 class="font-weight-light"></h6>
              <form name="myForm" method="POST" onsubmit="return validateForm()" class="pt-3" required>
              <div class="form-group">
									<label>NIK</label>*
									<input type="number" name="nik" class="form-control" placeholder="NIK.." autofocus>
								</div>
								<div class="form-group">
									<label>Nama</label>*
									<input type="nama" name="nama" class="form-control" placeholder="Nama..">
								</div>
								<div class="form-group">
									<label>Tempat Lahir</label>*
									<input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir..">
								</div>
								<div class="form-group">
									<label>Tanggal Lahir</label>*
									<input type="date" name="tanggal" class="form-control" >
								</div>
								<div class="form-group">
									<label>Nomor HP</label>
									<input type="text" name="no_hp" class="form-control" placeholder="Nomor HP..">
								</div>
								<div class="form-group">
									<label>Jenis Kelamin</label>**
									<select name="jekel" class="form-control">
										<option disabled="" selected="">Pilih Jenis Kelamin</option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="form-group">
									<label>Alamat</label>*
									<textarea name="alamat" class="form-control" cols="30" rows="10" placeholder="Alamat.."></textarea>
								</div>
								<div class="form-group">
									<label>Status Penyerahan</label>**
									<select name="penyerahan" class="form-control">
										<option disabled="" selected="">--PILIH--</option>
										<option value="0" >Belum diserahkan</option>
										<option value="1">Sudah Diserahkan</option>
									</select>
								</div>
								<div class="form-group">
									<label>Status Baptis</label>**
									<select name="baptis" class="form-control">
										<option disabled="" selected="">--PILIH--</option>
										<option value="0" >Belum dibaptis</option>
										<option value="1">Sudah Dibaptis</option>
									</select>
								</div>
								<div class="form-group">
									<label>Status Pernikahan</label>**
									<select name="pernikahan" class="form-control">
										<option disabled="" selected="">--PILIH--</option>
										<option value="0">Belum Menikah</option>
										<option value="1">Menikah</option>
										<option value="2">Janda/Duda</option>
									</select>
								</div>
								<div class="form-group">
									<label>Status Jemaat</label>**
									<select name="ket" class="form-control">
										<option disabled="" selected="">Pilih status</option>
										<option value="1">Tetap</option>
										<option value="0" selected>Sementara</option>
									</select>
								</div>
								<div class="form-group">
									<label>Username</label>*
									<input type="text" name="username" class="form-control" placeholder="Username..">
								</div>
								<div class="form-group">
									<label>Password</label>*
									<input type="text" name="password" class="form-control" placeholder="Password..">
								</div>
                <div class="mt-3">
                  <!-- <a href="SBAdmin/index.html" class="btn btn-block btn-primary btn-sm font-weight-medium auth-form-btn">LOGIN</a> -->
                  <button type="submit" name="simpan" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                    DAFTAR
                  </button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">

                </div>
                <div class="mb-2">
                  <a class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn" href="http://localhost:8080/gpdi/">BATAL</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  <!-- Belum memiliki akun? <a href="register.php" class="text-primary">Registrasi</a> -->
                </div>
              </form>
			  
			  <h6> Keterangan:</h6>
			  <h6> * Wajib di isi</h6>
			  <h6>** Pilihan Salah Satu</h6>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- login -->
  <?php
if (isset($_POST['simpan'])) {
	if ($_POST['nik'] != "" && $_POST['tempat'] != "" && $_POST['tanggal'] != "" && $_POST['nama'] != "" && $_POST['no_hp'] != "" && $_POST['jekel'] != "" && $_POST['alamat'] != "" && $_POST['ket'] != "" && $_POST['username'] != "" && $_POST['password'] != "") {
		
	$nik = $_POST['nik'];
	$tempat = $_POST['tempat'];
	$tanggal = $_POST['tanggal'];
	$nama = $_POST['nama'];
	$no_hp = $_POST['no_hp'];
	$jekel = $_POST['jekel'];
	$alamat = $_POST['alamat'];
	$ket = $_POST['ket'];
	$username = $_POST['username'];
	$password = $_POST['password'];
  	$status = 0;
  	$penyerahan = $_POST['penyerahan'];
  	$baptis = $_POST['baptis'];
  	$pernikahan = $_POST['pernikahan'];

	$sql = "INSERT INTO jemaat (nik,nama,jenis_kelamin,tempat_lahir,tanggal_lahir,no_hp,alamat,status_j,ket,username,password,penyerahan,baptis,pernikahan) VALUES ('$nik','$nama','$jekel','$tempat','$tanggal','$no_hp','$alamat','$status','$ket','$username','$password','$penyerahan','$baptis','$pernikahan')";
	$query = mysqli_query($konek, $sql);	
}

	if ($query) {
		echo "<script language='javascript'>swal('Selamat...', 'Pendaftaran Berhasil', 'success');</script>";
		echo '<meta http-equiv="refresh" content="3; url=http://localhost:8080/gpdi/">';
	} else {
		echo "<script language='javascript'>swal('Gagal...', 'Pendaftaran Gagal, Pastikan semua field terisi dengan benar!!!', 'error');</script>";
		echo '<meta http-equiv="refresh" content="3; url=http://localhost:8080/gpdi/pendaftaran.php">';
	}

}
?>

<script>
	function validateForm() {
  var nik = document.forms["myForm"]["nik"].value;
  if (nik == "") {
    alert("Nik Tidak Boleh Kosong");
    return false;
  }
  var nama = document.forms["myForm"]["nama"].value;
  if (nama == "") {
    alert("Nama Tidak Boleh Kosong");
    return false;
  }
  var tempat = document.forms["myForm"]["tempat"].value;
  if (tempat == "") {
    alert("Tempat Lahir Tidak Boleh Kosong");
    return false;
  }
  var tanggal = document.forms["myForm"]["tanggal"].value;
  if (tanggal == "") {
    alert("Tanggal lahir Tidak Boleh Kosong");
    return false;
  }
  var jekel = document.forms["myForm"]["jekel"].value;
  if (jekel == "") {
    alert("Jenis Kelamin harus dipilih");
    return false;
  }
  var username = document.forms["myForm"]["username"].value;
  if (username == "") {
    alert("Username Tidak Boleh Kosong");
    return false;
  }
  var password = document.forms["myForm"]["password"].value;
  if (password == "") {
    alert("Password Tidak Boleh Kosong");
    return false;
  }
}
  </script>
  <!-- plugins:js -->
  <script src="main/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="main/js/off-canvas.js"></script>
  <script src="main/js/hoverable-collapse.js"></script>
  <script src="main/js/template.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- endinject -->
  <script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>

</body>

</html>
<!-- oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "16"  -->