<?php include '../konek.php'; 
if (isset($_GET['id_kk'])) {
	$id_kk = $_GET['id_kk'];
	$tampil_kk = "SELECT * FROM kepala_keluarga k join jemaat j where k.id_jemaat = j.id_jemaat and k.id_kk=$id_kk";
	$query = mysqli_query($konek, $tampil_kk);
	$data = mysqli_fetch_array($query, MYSQLI_BOTH);
	$id_kk = $data['id_kk'];
	$nama_kepala = $data['nama'];
}else {
    $id_kk = 0;
}
?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Keluarga</h4>
                        <a href="?halaman=tambah_anggota_keluarga&id_kk=<?php echo $id_kk; ?>" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Tambah Anggota Keluarga
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                            New
                                        </span>
                                        <span class="fw-light">
                                            Row
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Create a new row using this form, make sure you fill them all</p>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Name</label>
                                                <input id="addName" type="text" class="form-control" placeholder="fill name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 pr-0">
                                            <div class="form-group form-group-default">
                                                <label>Position</label>
                                                <input id="addPosition" type="text" class="form-control" placeholder="fill position">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-group-default">
                                                <label>Office</label>
                                                <input id="addOffice" type="text" class="form-control" placeholder="fill office">
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center col-md-3">
                    <input class="form-control" type="text" id="myInput" onkeyup="myFunction3()" placeholder="Search" title="Type in a name">
                    </div>
                    <form action="">
                        <div class="table-responsive"> 
                            <table id="add" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $tampil = "SELECT * FROM anggota_keluarga a join jemaat j where a.id_jemaat = j.id_jemaat and id_kk = '$id_kk'";
                                    $query = mysqli_query($konek, $tampil);
                                    while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                        $id_ak = $data['id_ak'];
                                        $id_kk = $data['id_kk'];
                                        $id_jemaat = $data['id_jemaat'];
                                        $username = $data['nik'];
                                        $nama = $data['nama'];
                                        $status_ak = $data['status_ak'];
                                        $sql2 = "SELECT * from kepala_keluarga";
                                        $query2 = mysqli_fetch_array(mysqli_query($konek, $sql2));
                                        $tampil1 = "SELECT * FROM kepala_keluarga where id_jemaat = '$id_jemaat'";
										 $query1 = mysqli_fetch_array(mysqli_query($konek, $tampil1));
										//  if (isset($query1)) {
                                        $id_kepala = $query1['id_jemaat'];
                                            if ($id_kepala == $id_jemaat) {
                                                $status_ak = "Kepala Keluarga";
                                            }
                                        //  }
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $nama; ?></td>
                                            <td><?php echo $status_ak; ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="?halaman=view_jemaat_ak&id_jemaat=<?php echo $id_jemaat; ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Lihat Anggota Keluraga">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                <?php if ($id_kepala != $id_jemaat) { ?>
                                                    <a href="?halaman=ubah_anggota_keluarga&id_ak=<?php echo $id_ak; ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Anggota Keluraga">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="?halaman=tampil_anggota_keluarga&id_ak=<?php echo $id_ak; ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus Anggota Keluarga">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
if (isset($_GET['id_ak'])) {
    $sql_hapus = "DELETE FROM anggota_keluarga WHERE id_ak='" . $_GET['id_ak'] . "'";
    $query_hapus = mysqli_query($konek, $sql_hapus);
    if ($query_hapus) {
        echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=beranda">';
    } else {
        echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=beranda">';
    }
}
?>