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
	if(isset($_GET['id_baptis'])){
		$id_baptis=$_GET['id_baptis'];
        $tampil_nik = "SELECT * FROM baptis b natural join jemaat j  where b.nik = j.nik and b.id_baptis = $id_baptis";
        $query1 = mysqli_query($konek, $tampil_nik);
        $data = mysqli_fetch_array($query1, MYSQLI_BOTH);
        $no_surat = $data['no_surat'];
        $tgl = $data['tanggal_baptis'];
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
    <title>CETAK BAPTIS</title>
    <style>
        
  .baptis{
    position: relative;
    text-align: center;
    color: black;
  }
  .no_surat{
    position: absolute;
    top: 30%;
    left: 28%;
  }
  .jemaat{
    position: absolute;
    top: 33%;
    left: 28%;
  }
  .hari{
    position: absolute;
    top: 48%;
    left: 24%;
  }
  .tgl_baptis{
    position: absolute;
    top: 48%;
    left: 49%;
  }
  .nama{
    position: absolute;
    top: 56.5%;
    left: 38%;
    text-transform: uppercase;
  }
  .ttl{
    position: absolute;
    top: 58%;
    left: 27%;
  }
  .nama_ayah{
    position: absolute;
    top: 60.5%;
    left: 27%;
  }
  .nama_ibu{
    position: absolute;
    top: 63%;
    left: 27%;
  }
  .pendeta{
    position: absolute;
    top: 65.5%;
    left: 33%;
  }
  .tgl_baptis2{
    position: absolute;
    top: 68%;
    left: 74%;
  }
  .jemaat2{
    position: absolute;
    top: 72%;
    left: 74%;
  }
  .gembala{
    position: absolute;
    top: 81%;
    left: 65%;
  }
    </style>
</head>
<body>
<div class="baptis">
    <table border="0" align="center">
        <h5 class="no_surat"><?= $no_surat ?></h5>
        <h5 class="jemaat">GPdI Bukit Zaitun Oesapa - Kupang</h5>
        <h5 class="hari"><?= $format2 ?></h5>
        <h5 class="tgl_baptis"><?= $format ?></h5>
        <h4 class="nama"><strong><?= $nama ?></strong></h4>
        <h5 class="ttl"><?= $tempat_lahir.", ".$format3 ?></h5>
        <h5 class="nama_ayah"><?= $nama_ayah ?></h5>
        <h5 class="nama_ibu"><?= $nama_ibu ?></h5>
        <h5 class="pendeta"><?= $nama_pendeta ?></h5>
        <h5 class="tgl_baptis2"><?= $format ?></h5>
        <h5 class="jemaat2">Bukit Zaitun-Oesapa</h5>
        <h5 class="gembala">Pdt. Jacky D. Karawisan</h5>
        <img class="gambar" src="../main/images/surat/baptis.jpg" alt="baptis" style="width: 100%;">
    </table>
    </div>


    
</body>
</html>
        <script>
            window.print();
        </script>