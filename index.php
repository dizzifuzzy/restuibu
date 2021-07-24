<?php 
require_once "lib/mainconfig.php";
if(isset($_SESSION['user']))
{
    $sudahlogin = "yes";
}
$data = $conn->query("SELECT * FROM info");
$anak = $conn->query("SELECT * FROM anak_bina");
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

<?php include "navbar.phtml";?>

<div class="jumbotron"  style="height:500px;background-image: url(img/background.JPG); background-color:#fff background-size: 100% 100%;">
</div>
<section style="background-color:#fff" class="supporing-content">
<div class="row has-padding-top">
<div class="col-md-7">
<h1> Anggota Keluarga <?=$info['nama_yayasan'];?></h1>
<p>Setiap orang mempunyai cerita dibalik senyum manisnya.</p>
</div>
<div class="col-md-5">
        <div class="img-responsive">
          <ul class="bxslider">
            <?php while ($bina = $anak->fetch_assoc()){?>
            <center><li><img src="gambar/<?=$bina['gambar_anak'];?>" height="150px" width="150px" alt="" /><?=$bina['nama_anak'];?></li></center>
            <?php }?>
          </ul>
        </div>
      </div>
</div>
</section>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <h2><?=$info['nama_yayasan'];?></h2>
        <div class="text-center">
          <p><?=$info['tentang_yayasan'];?></p>
            <?php while ($blog = $berita->fetch_assoc()){?>
                <img height="150px" width="150px" class="card-img-top" src="imgberita/<?=$blog['gambar_berita'];?>" alt="<?=$blog['judul_berita'];?>">
          <?php } ?>
          <p><button type="button" style="background-color:#264181; color:white; float: right;" class="btn"><a style="color:white;" href="berita.php">Lihat Semua</a></button></p>
        </div>
     </div>
</div>

</div>
<br>
<div style="background-color:#264181" class="jumbotron">
  <div class="container">
    <div class="row ">
      <div class="col-md-12">
        <center><h2 style="color:white;" class="title">Donasi di Restu Ibu</h2>
        <p style="color:white; text-align: center;" class="info">Dari menolong anggota keluarga, hingga membangun orang makan di desa, ribuan orang telah mendonasikan ke panti asuhan Restu Ibu untuk sebagian hartanya.</p>
        <button type="button" data-toggle="modal" data-target="#donasi" class="btn">Donasi Sekarang!</button><br><br>
      <button type="button" class="btn btn-success"><a href="https://api.whatsapp.com/send?phone=<?php echo $infopetugas['tlp_petugas'];?>">Hubungi melalui WhatsApp!</a></button></center>
      </div>
    </div>
  </div>
</div>
<br>

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
