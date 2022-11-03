<?php
session_start();
if (isset($_SESSION['user']) == false) {
    header('Location: ../');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LELANG KUYY</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/inc/TimeCircles.js"></script>
    <link rel="stylesheet" href="../assets/inc/TimeCircles.css" />

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-fw fa-box"></i>

                </div>
                <div class="sidebar-brand-text mx-3">LELANG<sup>KUY</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>


            <!-- Nav Item - Laporan -->
            <li class="nav-item active">
                <a class="nav-link" href="lelang.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Riwayat Lelang</span></a>
            </li>

        </ul>
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

                    <!-- Topbar Search -->
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama']?></span>
                                <img class="img-profile rounded-circle"
                                    src="../assets/img/FotoSMK.JPG">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profilModal">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#passwordModal">
                                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ubah Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                
               


               <!-- Begin Page Content -->
               <div class="container-fluid">

                    <center>
                        <h1 class="py-3 ">Barang Yang Sedang Dilelang</h1>
                    </center>

    <div class="row">

        <?php
        include "../koneksi.php";
        $sql = mysqli_query($conn,"select * from barang");
        while($row = mysqli_fetch_array($sql)){
            $id = $row['id'];
            $sql2 = mysqli_query($conn,"select * from barang where id = '$id'");
            $barang = mysqli_fetch_array($sql2);
            date_default_timezone_set('Asia/Jakarta'); 
            $date = date('m-d-y H:i:s');



            if ($barang['tgl_exp'] < $date ){
                $exp = mysqli_query($conn,"update barang set status = 'tertutup' where id = '$id'");
            }else{

                if ($barang['status'] == "terbuka"){
                    ?>
                        <div class="col-md-3 mb-5">
                    <div class="card" style="text-align: center" >
                    <h2 class="text-gray-800" style="text-transform: capitalize;"><?=$barang['nama_barang']?></h2>
                        
                        <img src="../assets/img/<?php echo $barang['foto_barang']?>"alt="">

                    <div class="card-footer">
                    <h2 class="text-success"> $ <?=$barang['harga_awal']?></h2>

                    <button type="button" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#lelang<?php echo $barang['id'] ?>">
                        <span class="icon text-white-50" >
                            <i class="fas fa-hammer"></i>
                        </span>
                        <span class="text">Lelang</span>
                    </button>

                    </div>

                    <div class="div card-footer">
                        <div id="DateCountdown<?php echo $row['id']?>" data-date="<?php echo $barang['tgl_exp'] ?>  ">
                        </div>
                    </div>

                    </div>
                    </div>

                    <!-- Modal Lelang -->
                    <div class="modal fade" id="lelang<?php echo $barang['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Lelang Barang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <form action="" method="post">
                                    <div class="form-group">
                                        <label for="nama">Nama Barang</label>
                                        <input type="hidden" name="id" value="<?=$barang['id']?>">
                                        <input type="text" name="nama" class="form-control" value="<?=$barang['nama_barang']?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Harga Lelang</label>
                                        <input type="hidden" name="harga_awal" value="<?=$barang['harga_awal']?>">
                                        <input type="number" name="harga_akhir" class="form-control" value="<?=$barang['harga_awal']?>">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="lelang" class="btn btn-success" value="Lelang">
                                    </form>

                                </div>

                            </div>
                        </div>
                        </div>

                    <script>
                        $("#DateCountdown<?php echo $row['id']?>").TimeCircles();
                    </script>

                    <?php
                }else{
                    
                }
            
            
            }
            
        }
        ?>


    </div>


    </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
            <!-- End of Main Content -->

            <!-- 

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda Yakin Ingin "Logout" Dari Website Ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="" method="post">
                    <input type="submit" name="logout" class="btn btn-danger" value="Logout">
                    </form>
                </div>
            </div>
        </div>
    </div>

            <!-- Profil Ubah Profil -->
                <div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Profil Saya</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                            <div class="form-group">
                                <label for="username">Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $_SESSION['nama']?>" >
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $_SESSION['username']?>" >
                            </div>
                            <div class="form-group">
                                <label for="username">No Tlpn</label>
                                <input type="text" name="tlpn" class="form-control" value="<?php echo $_SESSION['tlpn']?>" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <input type="submit" name="ubahprofil" class="btn btn-warning" value="Ubah Profil">
                            </form>

                    </div>
                    </div>
                </div>
                </div>

                <!-- Profil ubah password -->
                <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <input type="hidden" name="iduser" value="<?php echo $_SESSION['id_petugas']?>">
                            <div class="form-group">
                                <label for="username">Old Password</label>
                                <input type="text" name="old_password" class="form-control" placeholder="Masukkan Password Lama" required >
                            </div>
                            <div class="form-group">
                                <label for="username">New Password</label>
                                <input type="text" name="new_password" class="form-control" placeholder="Masukkan Password Baru" required >
                            </div>
                            <div class="form-group">
                                <label for="username">Retype Password</label>
                                <input type="password" name="retype_password" class="form-control" placeholder="Ketikkan Ulang Password Baru" required >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <input type="submit" name="ubahpassword" class="btn btn-warning" value="Rubah Password">
                            </form>

                    </div>
                    </div>
                </div>
                </div>

                <!-- Alert Harga -->
            <div class="modal fade" id="harga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Pemberitahuan</h5>
                </div>
                <div class="modal-body text-danger">
                    Harga Lelang Yang Anda Masukkan Lebih Rendah Dari Harga Barang Lelang Yang Dibuka, Mohon Masukkan Harga Yang Lebih Tinggi Untuk Melanjutkan Proses Lelang Anda
                </div>
                <div class="modal-footer">
                    <a href="index.php" type="button" class="btn btn-danger">Paham</a>
                </div>
                </div>
            </div>
            </div>

            <!-- Alert Sukses Lelang -->
            <div class="modal fade" id="sukseslelang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-success" id="exampleModalLabel">Pemberitahuan</h5>
                </div>
                <div class="modal-body text-success">
                    Terimakasih Telah Berpartisipasi Dalam Event Lelang, Transaksi Lelang Anda Sedang Diproses Oleh Petugas. Good Luck >_<
                </div>
                <div class="modal-footer">
                    <a href="index.php" type="button" class="btn btn-success">Sama-Sama</a>
                </div>
                </div>
            </div>
            </div>

            <!-- Alert Gagal Lelang -->
            <div class="modal fade" id="gagallelang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Pemberitahuan</h5>
                </div>
                <div class="modal-body text-danger">
                    Mohon Maaf Transaksi Lelang Anda Gagal
                </div>
                <div class="modal-footer">
                    <a href="index.php" type="button" class="btn btn-danger">Paham</a>
                </div>
                </div>
            </div>
            </div>


    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../assets/js/demo/chart-area-demo.js"></script>
    <script src="../assets/js/demo/chart-pie-demo.js"></script>



</body>

</html>

<?php
#logut
if (isset($_POST['logout'])){
    session_destroy();
    echo "<script>location.href='../';</script>";
}
?>

<?php
#edit password
if (isset($_POST['ubahpassword'])){
    include "../koneksi.php";
    $iduser = $_SESSION['id_petugas'];
    $pw = $_SESSION['password'];
    $pw1 = $_POST['old_password'];
    $pw2= $_POST['new_password'];
    $pw3 = $_POST['retype_password'];

    if ($pw2 == $pw3){
        if ($pw1 == $pw){
            
        $ubahpassword = mysqli_query($conn,"update petugas set password='$pw3' where id = '$iduser'") ;
        if ($ubahpassword){
            echo "<script>alert('Sukses Ubah Password, Silahkan Login Kembali');location.href='http://localhost/login/index.php';</script>";
        }else{
            echo "<script>alert('Gagal Ubah Password');</script>";
        }

        }else{
            echo "<script>alert('Password Yang Anda Masukkan Salah');</script>";
        }
    }else{
        echo "<script>alert('Masukkan Ulang Password Dengan Benar');location.href='http://localhost/login/admin</script>";
    }
}
?>

<?php
#edit password
if (isset($_POST['ubahpassword'])){
    include "../koneksi.php";
    $iduser = $_SESSION['id_petugas'];
    $pw = $_SESSION['password'];
    $pw1 = $_POST['old_password'];
    $pw2= $_POST['new_password'];
    $pw3 = $_POST['retype_password'];

    if ($pw2 == $pw3){
        if ($pw1 == $pw){
            
        $ubahpassword = mysqli_query($conn,"update petugas set password='$pw3' where id = '$iduser'") ;
        if ($ubahpassword){
            session_destroy();
            echo "<script>alert('Sukses Ubah Password, Silahkan Login Kembali');location.href='http://localhost/login/index.php';</script>";
        }else{
            echo "<script>alert('Gagal Ubah Password');</script>";
        }

        }
    }else{
        echo "<script>alert('Password Yang Anda Masukkan Salah');</script>";
    }
}
?>

<?php
#edit profile
if (isset($_POST['ubahprofil'])){
    include "../koneksi.php";
    $iduser = $_SESSION['id_user'];
    $nama= $_POST['nama'];
    $username = $_POST['username'];
    $tlp = $_POST['tlp'];

    $ubahprofi = mysqli_query($conn,"update user set nama='$nama',username='$username',tlpn='$tlp' where id = '$iduser'") ;
    if ($ubahprofi){
        session_destroy();
        echo "<script>alert('Sukses Ubah Profil , Silahkan Login Lagi');location.href='http://localhost/login/admin/';</script>";
    }else {
        echo "<script>alert('Gagal Ubah Profil');";
    }
        
}
?>

<?php
if (isset($_POST['lelang'])){
    $id_user = $_SESSION['id_user'];
    $id = $_POST['id'];
    $harga_awal = $_POST['harga_awal'];
    $harga_akhir = $_POST['harga_akhir'];
    $date = date('m-d-y');

    if ($harga_akhir < $harga_awal) {
        ?>
        <script>
            $(document).ready(function(){
                $("#harga").modal('show');
            });
        </script>
        <?php
    }else{
        include "../koneksi.php";
        $qry = mysqli_query($conn,"insert into lelang (id, id_barang, tgl_lelang, harga_akhir, id_user, status) values ('','$id','$date','$harga_akhir','$id_user','pending')") or die(mysqli_error($conn));

        if($qry){
            ?>
                    <script>
            $(document).ready(function(){
                $("#sukseslelang").modal('show');
            });
        </script>
        <?php
        }else{
            ?>
                    <script>
            $(document).ready(function(){
                $("#gagallelang").modal('show');
            });
        </script>
        <?php
        }
    }
}

?>