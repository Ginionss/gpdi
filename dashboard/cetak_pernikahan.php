<?php include '../konek.php';
function tgl_indo ($tanggal){
    $bulan = array (
        1=> 'Januari','Februari','Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $pecahkan = explode('-',$tanggal);
        return $pecahkan[2].' '.$bulan[(int)$pecahkan[1]]. ' ' .$pecahkan[0];
}
function hariIndo ($hari){
        switch ($hari) {
            case 'Sunday':
                return 'Minggu';
                break;
            case 'Monday':
                return 'Senin';
                break;
             case 'Tuesday':
                 return 'Selasa';
                 break;
             case 'Wednesday':
                 return 'Rabu';
                 break;
             case 'Thursday':
                 return 'Kamis';
                 break;
             case 'Friday':
                 return 'jumat';
                 break;
             case 'Saturday':
                 return 'Sabtu';
                 break;
            default:
               return 'hari tidak valid';
                break;
        }
}
	if(isset($_GET['id_pernikahan'])){
		$id_pernikahan=$_GET['id_pernikahan'];
        $tampil_nik = "SELECT * FROM pernikahan b natural join jemaat j  where b.nik_pria = j.nik and b.id_pernikahan = $id_pernikahan";
        $query1 = mysqli_query($konek, $tampil_nik);
        $data = mysqli_fetch_array($query1, MYSQLI_BOTH);
        $no_surat = $data['no_surat'];
        $tgl = $data['tanggal_pernikahan'];
        $format = tgl_indo($tgl);
        $format2 = hariIndo(date('l', strtotime($tgl)));
        $nama_pria = $data['nama'];
        $tempat_lahir_pria = $data['tempat_lahir'];
        $tanggal_lahir_pria = $data['tanggal_lahir'];
        $format3 = tgl_indo($tanggal_lahir_pria);
        $nama_pendeta = $data['nama_pendeta'];

        
        $tampil_nik2 = "SELECT * FROM pernikahan b natural join jemaat j  where b.nik_wanita = j.nik and b.id_pernikahan = $id_pernikahan";
        $query2 = mysqli_query($konek, $tampil_nik2);
        $data2 = mysqli_fetch_array($query2, MYSQLI_BOTH);
        $nama_wanita = $data2['nama'];
        $tempat_lahir_wanita = $data2['tempat_lahir'];
        $tanggal_lahir_wanita = $data2['tanggal_lahir'];
        $format4 = tgl_indo($tanggal_lahir_wanita);
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK PERNIKAHAN</title>
    <style>
        
  .pernikahan{
    position: relative;
    text-align: center;
    color: black;
  }
  .no_surat{
    position: absolute;
    top: 29%;
    left: 23%;
  }
  .jemaat{
    position: absolute;
    top: 30.6%;
    left: 23%;
  }
  .hari{
    position: absolute;
    top: 43%;
    left: 30%;
  }
  .tanggal_pernikahan{
    position: absolute;
    top: 43%;
    left: 66%;
  }
  .lokasi{
    position: absolute;
    top: 47%;
    left: 45%;
  }
  .nama_pria{
    position: absolute;
    top: 53.5%;
    left: 39%;
    text-transform: uppercase;
  }
  .ttl_pria{
    position: absolute;
    top: 55.5%;
    left: 39%;
    text-transform: uppercase;
  }
  .nama_wanita{
    position: absolute;
    top: 60%;
    left: 39%;
    text-transform: uppercase;
  }
  .ttl_wanita{
    position: absolute;
    top: 62%;
    left: 39%;
    text-transform: uppercase;
  }
  .pendeta{
    position: absolute;
    top: 66%;
    left: 49%;
  }
  .tgl_pernikahan2{
    position: absolute;
    top: 75%;
    left: 65%;
  }
  .gembala{
    position: absolute;
    top: 82%;
    left: 60%;
  }
    </style>
</head>
<body>
<div class="pernikahan">
    <table border="0" align="center">
        <h5 class="no_surat"><?= $no_surat ?></h5>
        <h5 class="jemaat">GPdI Bukit Zaitun Oesapa - Kupang</h5>
        <h5 class="hari"><?= $format2 ?></h5>
        <h5 class="tanggal_pernikahan"><?= $format ?></h5>
        <h5 class="lokasi">GPdI Bukit Zaitun Oesapa</h5>
        <h5 class="nama_pria"><?= $nama_pria ?></h5>
        <h5 class="ttl_pria"><?= $tempat_lahir_pria.", ".$format3 ?></h5>
        <h5 class="nama_wanita"><?= $nama_wanita ?></h5>
        <h5 class="ttl_wanita"><?= $tempat_lahir_wanita.", ".$format4 ?></h5>
        <h5 class="pendeta"><?= $nama_pendeta ?></h5>
        <h5 class="tgl_pernikahan2">GPdI Bukit Zaitun Oesapa</h5>
        <h5 class="gembala">Pdt. Jacky D. Karawisan</h5>
        <img class="gambar" src="../main/images/surat/pernikahan1.jpg" alt="pernikahan" style="width: 100%;">
    </table>
    </div>


    
</body>
</html>
        <!-- <script>
            window.print();
        </script> -->