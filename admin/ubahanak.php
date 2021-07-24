<?php 
error_reporting(0);
require_once "../lib/mainconfig.php";
if(!isset($_SESSION['user']))
{
    header("Location: ../index.php");
    exit;
}
if (!$_GET['id']) {
  header("Location: anak.php");
  exit;
}
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM info");
$info    = $data->fetch_assoc();
$anak = $conn->query("SELECT * FROM anak_bina WHERE id_anak = '$id'");
$anak    = $anak->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $info['nama_yayasan']; ?> - Ubah Data Anak</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "nav.phtml"; ?>
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
                        <h1 class="h3 mb-0 text-gray-800">Ubah Data Anak</h1>
                    </div>

                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-info">Ubah Data Anak</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Nama Anak :</label>
                                            <input type="text" name="nama" class="form-control form-control-user"
                                                value="<?= $anak['nama_anak']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Tanggal Lahir Anak :</label>
                                            <input type="date" name="tgl" class="form-control form-control-user"
                                                value="<?= $anak['ttl_anak']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Tempat Lahir Anak :</label>
                                            <input type="text" name="tempat" class="form-control form-control-user"
                                                value="<?= $anak['tempat_anak']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Pendidikan Anak :</label>
                                            <input type="text" name="pendidikan" class="form-control form-control-user"
                                                value="<?= $anak['pendidikan_anak']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Alamat Anak :</label>
                                            <textarea name="alamat"
                                                class="form-control form-control-user"> <?= $anak['alamat_anak']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Status Anak :</label>
                                            <select name="status" class="form-control" required>
                                                <option value="Dhuafa" <?php if ($anak['status_anak'] == "Dhuafa") {
                                                  echo 'selected=""';
                                                } ?>>Dhuafa</option>
                                                <option value="Yatim" <?php if ($anak['status_anak'] == "Yatim") {
                                                echo 'selected=""';
                                              } ?>>Yatim</option>
                                                <option value="Piatu" <?php if ($anak['status_anak'] == "Piatu") {
                                                echo 'selected=""';
                                              } ?>>Piatu</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Mukim Anak :</label>
                                            <select name="mukim" class="form-control" required>
                                                <option value="1" <?php if ($anak['mukim_anak'] == "1") {
                                            echo 'selected=""';
                                          } ?>>Ya</option>
                                                <option value="0" <?php if ($anak['mukim_anak'] == "0") {
                                            echo 'selected=""';
                                          } ?>>Tidak</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Gambar :</label>
                                            <center><img src="../gambar/<?= $anak['gambar_anak']; ?>" height="200"
                                                    width="150"></center>
                                            <input type="file" name="gambar" class="form-control">
                                        </div>
                                        <center>
                                            <button type="submit" class="btn btn-info">Simpan</button>
                                            <a href="anak.php" class="btn btn-info">Kembali</a>
                                        </center>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <!-- Default Card Example -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    Info :
                                </div>
                                <div class="card-body">
                                    <?php if ($_POST['nama']) {
                    $nama    = $_POST['nama'];
                    $tgl    = $_POST['tgl'];
                    $tempat    = $_POST['tempat'];
                    $alamat    = $_POST['alamat'];
                    $status    = $_POST['status'];
                    $mukim    = $_POST['mukim'];
                    $pendidikan = $_POST['pendidikan'];
                    $idx = strpos($_FILES['gambar']['name'], '.');
                    $ext = substr($_FILES['gambar']['name'], $idx);
                    $idpetugas = $_SESSION['user'];
                    $file_ext   = strtolower(end(explode('.', $_FILES['gambar']['name'])));
                    $file_name = $nama . $ext;
                    $output_dir = "../gambar/";
                    if ($idx) {
                      $allow      = array("jpg", "png", "jpeg", "svg");
                      if (in_array($file_ext, $allow)) {
                        if ($_FILES["gambar"]["error"] > 0) {
                          echo '<div class="alert alert-danger">Poster Gagal Di Upload!</div>';
                        } else {
                          move_uploaded_file($_FILES["gambar"]["tmp_name"], $output_dir . $file_name);
                          $update = "UPDATE anak_bina SET gambar_anak='$file_name', nama_anak='$nama', ttl_anak='$tgl', tempat_anak='$tempat', alamat_anak='$alamat', pendidikan_anak='$pendidikan', status_anak='$status', mukim_anak='$mukim'  WHERE id_petugas='$idpetugas'";
                          $submit = $conn->query($update);
                          echo '            <script>
                window.alert("data anak berhasil diubah.");
                window.location = "ubahanak.php?id=' . $id . '";
            </script>';
                        }
                      } else {
                        echo 'Format Gambar Harus JPG, PNG, JPEG, Atau SVG!';
                      }
                    } else {
                      $update = "UPDATE anak_bina SET nama_anak='$nama', ttl_anak='$tgl', tempat_anak='$tempat', alamat_anak='$alamat', pendidikan_anak='$pendidikan', status_anak='$status', mukim_anak='$mukim'  WHERE id_petugas='$idpetugas'";
                      $submit = $conn->query($update);
                      echo '            <script>
                window.alert("data anak berhasil diubah.");
                window.location = "ubahanak.php?id=' . $id . '";
            </script>';
                    }
                  } else {
                    echo "tidak ada aksi.";
                  }
                  ?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; <?= $info['nama_yayasan']; ?> 2019</span>
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