<?php 
error_reporting(0);
require_once "../lib/mainconfig.php";
if(!isset($_SESSION['user']))
{
    header("Location: ../index.php");
    exit;
}
$data = $conn->query("SELECT * FROM info");
$info    = $data->fetch_assoc(); 
$berita = $conn->query("SELECT * FROM berita");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=$info['nama_yayasan'];?> - Tambah Data Berita</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
<?php include "nav.phtml";?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Berita</h1>
          </div>

          <div class="row">

            <div class="col-lg-12">

              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Tambah Data Berita</h6>
                </div>
                <div class="card-body">
              <form class="user" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-12 control-label">Judul Berita :</label>
                  <input type="text" name="judulberita" class="form-control form-control-user">
                </div>
                <div class="form-group">
                  <label class="col-sm-12 control-label">Isi Berita :</label>
                  <textarea name="isiberita" class="form-control form-control-user"> </textarea>
                </div>
                <div class="form-group">
                  <label class="col-sm-12 control-label">Gambar :</label>
                  <input type="file" name="gambar" class="form-control">
                </div>
                <center>
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="anak.php" class="btn btn-info">Kembali</a>
                </center>
              </form>                
          </div>
              </div>
        <?php if($_POST['judulberita']){
                  $judul    = $_POST['judulberita'];
                  $isi    = $_POST['isiberita'];
                 $idx = strpos($_FILES['gambar']['name'],'.');
                  $ext = substr($_FILES['gambar']['name'],$idx);
                  $idpetugas = $_SESSION['user'];
                  $file_ext   = strtolower(end(explode('.',$_FILES['gambar']['name'])));
                  $file_name = $judul . $ext;
                  $output_dir = "../imgberita/";
                  if(isset($_FILES["gambar"])){
                    $allow      = array("jpg","png","jpeg","svg");
                    if (in_array($file_ext,$allow)) {
                    if ($_FILES["gambar"]["error"] > 0){
                      echo '<script>window.alert("Gambar Gagal Di Upload!");window.location = "berita.php";</script>';
                    }else{
                      move_uploaded_file($_FILES["gambar"]["tmp_name"],$output_dir.$file_name);
                      $conn->query("INSERT INTO berita (judul_berita,tgl_berita,id_petugas) VALUES ('$judul',CURRENT_TIMESTAMP,'$idpetugas')");
                      $idd = $conn->insert_id;
                      $conn->query("INSERT INTO detail_berita (gambar_berita,isi_berita,id_berita) VALUES ('$file_name','$isi','$idd')");
                      echo '<script>window.alert("Sukses..");window.location = "berita.php";</script>';
                    }
                  }else{
                    echo '<script>window.alert("Format Gambar Harus JPG, PNG, JPEG, Atau SVG!");window.location = "berita.php";</script>';
                  }
            }
        }
                ?>
            </div>
          </div>

        </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?=$info['nama_yayasan'];?> 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
