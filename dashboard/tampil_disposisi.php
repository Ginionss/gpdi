<?php include '../konek.php';

$id_pengguna = $_SESSION['password']; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Disposisi Surat Masuk</h4>
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
                    <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search" title="Type in a name">
                    </div>
                    <form action="">
                        <div class="table-responsive"> 
                            <table id="add" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal Disposisi</th>
                                        <th>Keterangan Surat</th>
                                        <th>Disposisi Dari</th>
                                        <th>Dispisisi Kepada</th>
                                        <th>Isi Disposisi</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $tampil = "SELECT * FROM disposisi d join suratmasuk s where d.kepada = '$id_pengguna'";
                                    $query = mysqli_query($konek, $tampil);
                                    while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                        $id_disposisi = $data['id_disposisi'];
                                        $id_surat_masuk = $data['id_surat_masuk'];
                                        $file_surat_masuk = $data['file_surat_masuk'];
                                        $tgl1 = $data['tanggal_disposisi'];
                                        $dari = $data['dari'];
                                        $kepada = $data['kepada'];
                                        $asal = $data['asal_surat'];
                                        $perihal = $data['perihal'];
                                        $isi_disposisi = $data['isi_disposisi'];
                                        $tgl_surat = date("d-F-Y", strtotime($tgl1));
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $tgl_surat; ?></td>
                                            <td><?php echo "Asal Surat: ".$asal."<br>Perihal: ".$perihal; ?></td>
                                            <td><?php
                                            $tampil1 = "SELECT * FROM operator where id_pengguna = '$dari'";
                                            $query1 = mysqli_fetch_array(mysqli_query($konek, $tampil1));
                                            $nama = $query1['nama'];
                                            $jabatan = $query1['jabatan'];
                                             echo $jabatan."- ".$nama; ?></td>

                                            <td><?php
                                            $tampil2 = "SELECT * FROM operator where id_pengguna = '$kepada'";
                                            $query2 = mysqli_fetch_array(mysqli_query($konek, $tampil2));
                                            $nama2 = $query2['nama'];
                                            $jabatan2 = $query2['jabatan'];
                                             echo $jabatan2."- ".$nama2; ?></td>
                                            <td><?php echo $isi_disposisi; ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="../dataFile/surat_masuk/<?= $file_surat_masuk ?>" target="_blank" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View">
                                                        <i class="fa fa-eye"></i>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
