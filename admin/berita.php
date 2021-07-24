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

  <title><?=$info['nama_yayasan'];?> - Data Berita</title>

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
          <h1 class="h3 mb-2 text-gray-800">Data Berita</h1>
          <!-- DataTales Example -->
              <div class="text-right">
                <a href="tambahberita.php" class="btn btn-info">Tambah Berita</a>
            </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-info">Data Berita</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Judul Berita</th>
                      <th>Tgl Berita</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Judul Berita</th>
                      <th>Tgl Berita</th>
                      <th>Edit</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php while($ambil = $berita->fetch_array()){?>
                    <tr>
                      <td><?=$ambil['id_berita'];?></td>
                      <td><?=$ambil['judul_berita'];?></td>
                      <td><?=date('d M Y',strtotime($ambil['tgl_berita']));?></td>
                      <td><a href="ubahberita.php?id=<?=$ambil['id_berita'];?>">Ubah</a>/<a href="#" data-toggle="modal" data-target="#modal">Hapus</a></td>
                    </tr>
<div id="modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <p>Anda yakin akan menghapus data ini ?</p>
        <p><div class="text-right">
                <a href="?hapus=<?php echo $ambil['id_berita']; ?>" class="btn btn-danger">Ya</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div></p>
        <p>
      </div>
    </div>

  </div>
</div>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
          <?php 
          if($_GET['hapus']){
            $hapus = $_GET['hapus'];
            $hapusanak = $conn->query("DELETE FROM berita WHERE id_berita='$hapus'");
                    echo '
            <script>
                window.alert("Sukses");
                window.location = "berita.php";
            </script>
        ';
          }
          ?>
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
