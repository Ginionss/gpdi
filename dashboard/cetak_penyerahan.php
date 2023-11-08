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
	if(isset($_GET['id_penyerahan'])){
		$id_penyerahan=$_GET['id_penyerahan'];
        $tampil_nik = "SELECT * FROM penyerahan b natural join jemaat j  where b.nik = j.nik and b.id_penyerahan = $id_penyerahan";
        $query1 = mysqli_query($konek, $tampil_nik);
        $data = mysqli_fetch_array($query1, MYSQLI_BOTH);
        $no_surat = $data['no_surat'];
        $tgl = $data['tanggal_penyerahan'];
        $format = tgl_indo($tgl);
        $format2 = hariIndo(date('l', strtotime($tgl)));
        $nik = $data['nik'];
        $nama = $data['nama'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $format3 = tgl_indo($tanggal_lahir);
        $nama_ayah = $data['nama_ayah'];
        $nama_ibu = $data['nama_ibu'];
        $nama_pendeta = $data['nama_pendeta'];
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CETAK PENYERAHAN ANAK</title>
    <style>
        
  .penyerahan{
    position: relative;
    text-align: center;
    color: black;
  }
  .no_surat{
    position: absolute;
    top: 30%;
    left: 24%;
  }
  .jemaat{
    position: absolute;
    top: 32.2%;
    left: 24%;
  }
  .hari{
    position: absolute;
    top: 50%;
    left: 27%;
  }
  .lokasi{
    position: absolute;
    top: 52.5%;
    left: 27%;
  }
  .nama{
    position: absolute;
    top: 59%;
    left: 35.5%;
    text-transform: uppercase;
  }
  .tempat_lahir{
    position: absolute;
    top: 63%;
    left: 36%;
  }
  .tanggal_lahir{
    position: absolute;
    top: 63%;
    left: 66%;
  }
  .nama_ayah{
    position: absolute;
    top: 65%;
    left: 36%;
  }
  .nama_ibu{
    position: absolute;
    top: 67%;
    left: 36%;
  }
  .pendeta{
    position: absolute;
    top: 69%;
    left: 36%;
  }
  .tgl_penyerahan2{
    position: absolute;
    top: 74%;
    left: 73.5%;
  }
  .gembala{
    position: absolute;
    top: 84%;
    left: 67%;
  }
    </style>
</head>
<body>
<div class="penyerahan">
    <table border="0" align="center">
        <h5 class="no_surat"><?= $no_surat ?></h5>
        <h5 class="jemaat">GPdI Bukit Zaitun Oesapa - Kupang</h5>
        <h5 class="hari"><?= $format2.", ".$format ?></h5>
        <h5 class="lokasi">Bukit Zaitun-Oesapa</h5>
        <h3 class="nama"><strong><?= $nama ?></strong></h3>
        <h5 class="tempat_lahir"><?= $tempat_lahir?></h5>
        <h5 class="tanggal_lahir"><?= $format3 ?></h5>
        <h5 class="nama_ayah"><?= $nama_ayah ?></h5>
        <h5 class="nama_ibu"><?= $nama_ibu ?></h5>
        <h5 class="pendeta"><?= $nama_pendeta ?></h5>
        <h5 class="tgl_penyerahan2"><?= $format ?></h5>
        <h5 class="gembala">Pdt. Jacky D. Karawisan</h5>
        <img class="gambar" src="../main/images/surat/penyerahan.jpg" alt="penyerahan" style="width: 100%;">
    </table>
    </div>


    
</body>
</html>
        <!-- <script>
            window.print();
        </script> -->