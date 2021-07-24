<?php 
require_once "lib/mainconfig.php";
if(isset($_SESSION['user']))
{
    $sudahlogin = "yes";
}
$data = $conn->query("SELECT * FROM info");
$info    = $data->fetch_assoc(); 
$petugas = $conn->query("SELECT * FROM petugas");
$infopetugas    = $petugas->fetch_assoc(); 
$rekening = $conn->query("SELECT * FROM rekening");
$berita = $conn->query("SELECT * FROM berita INNER JOIN detail_berita ON berita.id_berita = detail_berita.id_berita limit 6");
$pageindex = "yes";
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$info['nama_yayasan'];?> - Beranda</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/set1.css" />
  <link href="css/overwrite.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
<style type="text/css">
/*----- Tabs -----*/
.tabs {
  width:100%;
  display:inline-block;
}

  /*----- Tab Links -----*/
  /* Clearfix */
  .tab-links:after {
    display:block;
    clear:both;
    content:'';
  }

  .tab-links li {
    margin:0px 5px;
    float:left;
    list-style:none;
  }

    .tab-links a {
      padding:9px 15px;
      display:inline-block;
      border-radius:3px 3px 0px 0px;
      background:#264181;
      font-size:16px;
      font-weight:600;
      color:white;
      transition:all linear 0.15s;
    }

    .tab-links a:hover {
      background:#264181;
      text-decoration:none;
    }

  li.active a, li.active a:hover {
    background:#fff;
    color:#264181;
  }

  /*----- Content of Tabs -----*/
  .tab-content {
    padding:15px;
    border-radius:3px;
    box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
    background:#fff;
  }

    .tab {
      display:none;
    }

    .tab.active {
      display:block;
    }</style>
<?php include "navbar.phtml";?>
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="blogs">
          <div class="text-center">
            <h2>Siap Bayar Zakat Sekarang ?</h2>
            <p>Zakat adalah harta tertentu yang wajib dikeluarkan oleh orang yang beragama islam dan diberikan kepada golongan yang berhak menerimanya (fakir miskin dan sebagainya). Zakat dari segi bahasa berarti 'suci', 'subur', 'berkat', dan 'berkembang'. Menurut ketentuan yang telah ditetapkan oleh syariat Islam. Zakat merupakan rukun ketiga dari rukun islam. Sudahkah bayar zakat? Jika belum, Hitung berapa besar zakat yang mesti anda keluarkan.<br>
            </p>
          </div>
          <hr>
        </div>
      </div>
      <div class="col-md-6">
        <div class="blogs">
          <div class="text-center">
 <div class="tabs">
<ul class="tab-links">
<li class="active"><a  data-toggle="tab" href="#tab1">Profesi</a></li>
<li><a  data-toggle="tab" href="#tab2">Maal</a></li>
<li><a  data-toggle="tab" href="#tab3">Fitrah</a></li>
</ul>
<div class="tab-content">
<div id="tab1" class="tab active">
<p>Ayo hitung zakat profesi Anda!</p>
        <form method="post">
        <div class="form-group">
                    Rp.<input class="form-control form-control" name="pendapatanperbulan" placeholder="Pendapatan perbulan">
                    </div>
        <div class="form-group">
                    Rp.<input class="form-control form-control" name="pendapatanlain" placeholder="Pendapatan lain (jika ada)">
                    </div>
        <div class="form-group">
                    Rp.<input class="form-control form-control" name="cicilan" placeholder="Hutang/Cicilan (jika ada)">
                    </div>
                    <center>
                    <button type="submit" style="width:100%;background-color:#264181; color:white;" class="btn">Hitung zakat anda</button>
                    </center>
                    </form>
</div>
<div id="tab2" class="tab">
<p>Khusus untuk harta yang telah tersimpan selama 1 tahun (Haul) dan mencapai batas tertentu (Nisab). Nisab = 85gr emas (85 x Rp. 530.000 = 45.050.000)</p>
        <form method="post">
        <div class="form-group">
                    Rp.<input class="form-control form-control" name="deposito" placeholder="Nilai deposito/tabungan/giro">
                    </div>
        <div class="form-group">
                    Rp.<input class="form-control form-control" name="properti" placeholder="Nilai Properti & Kendaraan">
                    </div>
        <div class="form-group">
                    Rp.<input class="form-control form-control" name="emas" placeholder="Emas, perak, permata atau sejenisnya">
                    </div>
        <div class="form-group">
                    Rp.<input class="form-control form-control" name="lainnya" placeholder="Lainnya (saham,piutang, dan surat - surat berharga lainnya)">
                    </div>
                    <center>
                    <button type="submit" style="width:100%;background-color:#264181; color:white;" class="btn">Hitung zakat anda</button>
                    </center>
                    </form>
</div>
<div id="tab3" class="tab">
<p>Zakat fitrah besarnya 3.5 liter atau setara 2.5 kilogram makanan pokok yang biasa dikonsumsi. Dalam nominal uang yaitu 2.5 x harga makanan pokok yang biasa dikonsumsi (beras).</p>
<p>        <form method="post">
        <div class="form-group">
                    Rp.<input class="form-control form-control" name="beras" placeholder="Harga bahan pokok beras perKg">
                    </div>
                    <center>
                    <button type="submit" style="width:100%;background-color:#264181; color:white;" class="btn">Hitung zakat anda</button>
                    </center>
                    </form></p>
</div>
</div>
</div>
            </p>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>


<?php include "footer.phtml";?>

  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.bxslider.min.js"></script>
  <script type="text/javascript" src="js/fliplightbox.min.js"></script>
  <script src="js/functions.js"></script>
  <script type="text/javascript">
    $('.portfolio').flipLightBox()
  </script>
</body>
</html>
