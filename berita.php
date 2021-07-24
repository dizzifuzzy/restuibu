<?php 
require_once "lib/mainconfig.php";
if(isset($_SESSION['user']))
{
    $sudahlogin = "yes";
}
require_once "lib/mainconfig.php";
$data = $conn->query("SELECT * FROM info");
$info    = $data->fetch_assoc(); 
$halaman = 2;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = $conn->query("SELECT * FROM berita");
$total = $result->num_rows;
$pages = ceil($total/$halaman);            
$blogs = $conn->query("SELECT * FROM berita INNER JOIN detail_berita ON berita.id_berita = detail_berita.id_berita ORDER 
BY berita.id_berita DESC LIMIT $mulai, $halaman");
$no =$mulai+1;
$pageberita = "yes";
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$info['nama_yayasan'];?> - Kegiatan</title>

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


  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="blogs">
          <div class="text-center">
            <h2>Kegiatan</h2>
            <p>Beberapa kegiatan yang rutin dilakukan di LKSA Restu ibu <br>
            </p>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <?php if($blogs->fetch_assoc()){?>

        <?php while ($blog = $blogs->fetch_assoc()){?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <strong><?=$blog['judul_berita'];?></strong>
          </div>
          <div class="panel-body">
            <small>Diposting pada tanggal : <?=date('d-M-Y',strtotime($blog['tgl_berita']));?></small><br>
            <center><img src="imgberita/<?=$blog['gambar_berita'];?>" height="500" width="650"></center><br>
            <?=$blog['isi_berita'];?>
          </div>
        </div>
      <?php } ?>
        <div class="container">
          <div class="row">
            <nav>
              <ul class="pagination">
                  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <li><a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
  <?php } ?>
              </ul>
            </nav>
          </div>
        </div>

<?php }else {?>
        Belum ada berita.
      </div>
<?php }?>



<?php include "sidebar.phtml";?>

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
