<?php
session_start();
if (isset($_SESSION['petugas']) == false) {
    header('Location: ../');
}
date_default_timezone_set("Asia/Jakarta");
$tgl = date("d-m-y");
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
                <div class="sidebar-brand-text mx-3">LELANG<sup>KUYY</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Data -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kumpulan Data </h6>
                        <a class="collapse-item" href="user.php">User</a>
                        <a class="collapse-item" href="barang.php">Barang Lelang</a>
                    </div>
                </div>
            </li>
            
                        <!-- Divider -->
                        <hr class="sidebar-divider">

                        <!-- Nav Item - Laporan -->
                        <li class="nav-item active">
                <a class="nav-link" href="lelang.php">
                    <i class="fas fa-fw fa-hammer"></i>
                    <span>Lelang</span></a>
            </li>

            <!-- Nav Item - Laporan -->
            <li class="nav-item active">
                <a class="nav-link" href="laporan.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan</span></a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']?></span>
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

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Data Tabel Lelang</h1>
                
                
        
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Tabel Lelang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="tabel-data" width="100%" cellspacing="0" style="text-align:center">
                                    <thead>

                                        <tr>
                                            <th>No</th>
                                            <th>Foto Produk</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal Lelang</th>
                                            <th>Income</th>
                                            <th>Pelelang</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "../koneksi.php";
                                    $petugas = mysqli_query($conn,"SELECT * FROM lelang");
                                    $no = 0;
                                    while ($data = mysqli_fetch_array($petugas)) {
                                    $no++;
                                    $id = $data['id_barang'];
                                    $sql = mysqli_query($conn,"SELECT * FROM barang where id = $id");
                                    $lelang = mysqli_fetch_array($sql);
                                    $foto_barang = $lelang['foto_barang'];
                                    ?>
                                        <tr>
                                            <td><?php echo $no?></td>
                                            <td><img src="../assets/img/<?php echo $foto_barang ?>" style="width: 100px; text-align:center;" alt=""></td>
                                            <td><?=$lelang['nama_barang']?></td>
                                            <td><?=$data['tgl_lelang']?></td>
                                            <td class="text-success"><?php
                                            $awal = $lelang['harga_awal'];
                                            $akhir = $data['harga_akhir'];
                                            $income = $akhir - $awal;
                                            if ($income < "0") {
                                                ?>
                                                <h5 class="text-danger">Rp <?php
                                                echo $income;
                                                ?>
                                                </h5>
                                                <?php
                                            }else{
                                                ?>
                                                <h5>Rp + <?php
                                                echo $income;
                                                ?>
                                                </h5>
                                                <?php
                                            }
                                            ?>
                                            <td>
                                            <?php $id = $data['id_user'];
                                            $sql = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
                                            $user = mysqli_fetch_array($sql);
                                            echo $user['nama'];
                                            ?></td>
                                            </td>
                                            <td style="width:120px;">
                                                <?php
                                                $status = $data['status'];
                                                if ($status == "pending"){
                                                    ?>
                                                    <div class="btn btn-warning" style="pointer-events: none;width:120px;">PROSES</div>
                                                    <?php
                                                }elseif ($status == "terlelang"){
                                                    ?>

                                                    <div class="btn btn-success" style="pointer-events: none;width:120px;">TERLELANG</div>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <div class="btn btn-danger" style="pointer-events: none;width:120px;">KALAH</div>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td style="width:120px  ;">
                                                <?php
                                                $status = $data['status'];
                                                if ($status == "pending"){
                                                    ?>
                                                    <form action="" method="post">
                                                    <input type="hidden" name="id_barang" value="<?=$lelang['id']?>">
                                                    <input type="hidden" name="id" value="<?=$data['id']?>">
                                                    <button type="submit" name="terima" class="btn btn-success mb-2"style="width:120px;" >TERIMA</button>
                                                    <button type="submit" name="tolak" class="btn btn-danger mb-2"style="width:120px;">TOLAK</button>
                                                    </form>
                                                    <?php
                                                }elseif ($status == "terlelang"){
                                                    ?>
                         
                                                    <?php
                                                }else{
                                                    ?>
                       
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            
                                        </tr>
                                        <!-- Modal EDit -->
                                                <div class="modal fade" id="EditModal<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Petugas</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php

                                                        include "../koneksi.php";
                                                        
                                                        $id = $data['id'];
                                                        $qry = mysqli_query($conn,"select * from petugas where id='$id'");
                                                        $data = mysqli_fetch_array($qry);
                                                        $nama = $data['nama_petugas'];
                                                        $username = $data['username'];
                                                        $password = $data['password'];

                                                        ?>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?=$data['id']?>">
                                                        <div class="form-group">
                                                            <label for="username">Nama</label>
                                                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Namaa Petugas" value="<?php
                                                            echo $nama?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username Petugas" value="<?php
                                                            echo $username?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="username">Password</label>
                                                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password" value="">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <input type="submit" name="edit" class="btn btn-warning" value="Edit Petugas">
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
       


    </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
            <!-- End of Main Content -->

            
            <!-- End of Footer -->

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
    $iduser = $_SESSION['id_petugas'];
    $nama= $_POST['nama'];
    $username = $_POST['username'];

    $ubahprofi = mysqli_query($conn,"update petugas set nama_petugas='$nama',username='$username' where id = '$iduser'") ;
    if ($ubahprofi){
        session_destroy();
        echo "<script>alert('Sukses Ubah Profil , Silahkan Login Lagi');location.href='http://localhost/login/admin/';</script>";
    }else {
        echo "<script>alert('Gagal Ubah Profil');";
    }
        
}
?>

<?php
if (isset($_POST['tolak'])){
    $id = $_POST['id'];
    include "../koneksi.php";
    $sql = mysqli_query($conn,"UPDATE `lelang` SET `status` = 'kalah' WHERE `lelang`.`id` ='$id' ");
    if ($sql){
        echo "<script>location.href='lelang.php'</script>";
    }
}

?>

    <?php
    if (isset($_POST['terima'])){
        $id = $_POST['id'];
        $id_barang = $_POST['id_barang'];
        include "../koneksi.php";
        $sql = mysqli_query($conn,"UPDATE `lelang` SET `status` = 'terlelang' WHERE `lelang`.`id` ='$id' ");
        $tutup = mysqli_query($conn,"UPDATE `barang` SET `status` = 'terlelang' WHERE `barang`.`id` ='$id_barang'");
        if ($sql && $tutup) {
            echo "<script>location.href='lelang.php'</script>";
        }
    }

    ?>

<?php   
                                        include "../koneksi.php";
                                        $info = "kalah";
                                        $kalah = mysqli_query($conn, "SELECT * FROM lelang");
                                        while ($isi = mysqli_fetch_array($kalah)){
                                            echo " + ";
                                            $kalah2 = mysqli_query($conn,"select * from lelang where status='terlelang'");
                                            $row = mysqli_num_rows($kalah2);
                                            if($row > 0 ){
                                                echo " a ";
                                                $id_barang = $isi['id_barang'];
                                                $ubah_status = mysqli_query($conn,"update lelang set status='kalah' where id_barang='$id_barang' and status='pending'");
                                            }else{
                                                echo "";
                                            }
                                        }

?>


