<?php include '../konek.php'; ?>
<?php
$tampil_nik = "SELECT * FROM jemaat WHERE id_jemaat=$_SESSION[nik]";
$query = mysqli_query($konek, $tampil_nik);
$data = mysqli_fetch_array($query, MYSQLI_BOTH);
$id_jemaat = $data['id_jemaat'];
$nik = $data['nik'];
$nama = $data['nama'];
$tempat = $data['tempat_lahir'];
$tanggal = $data['tanggal_lahir'];
$format = date('d-m-Y', strtotime($tanggal));
$jekel = $data['jenis_kelamin'];
$alamat = $data['alamat'];
$telepon = $data['no_hp'];
$username = $data['username'];
$password = $data['password'];

?>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">BIODATA ANDA</h4>
                        <a href="?halaman=ubah_pemohon&id_jemaat=<?= $id_jemaat; ?>" class="btn btn-sm btn-warning btn-round ml-auto">
                            <i class="fa fa-edit"></i>
                            Ubah Biodata
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td><?= $nik; ?></td>
                            </tr>
                            <tr>
                                <th>NAMA</th>
                                <td>:</td>
                                <td><?= $nama; ?></td>
                            </tr>
                            <tr>
                                <th>TTL</th>
                                <td>:</td>
                                <td><?= $tempat . ', ' . $format; ?></td>
                            </tr>

                            <tr>
                                <th>JENIS KELAMIN</th>
                                <td>:</td>
                                <td><?= $jekel; ?></td>
                            </tr>
                            <tr>
                                <th>ALAMAT</th>
                                <td>:</td>
                                <td><?= $alamat; ?></td>
                            </tr>
                            <tr>
                                <th>NOMOR TELEPON</th>
                                <td>:</td>
                                <td><?= $telepon; ?></td>
                            </tr>
                            <tr>
                                <th>USERNAME</th>
                                <td>:</td>
                                <td><?= $username; ?></td>
                            </tr>
                            <tr>
                                <th>PASSWORD</th>
                                <td>:</td>
                                <td><?= $password; ?></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>