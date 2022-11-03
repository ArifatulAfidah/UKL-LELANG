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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button"
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
                    <h1 class="h3 mb-2 text-gray-800">Data Barang Lelang   </h1>
                    

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="TambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data barang</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                            <div class="form-group">
                                <label for="username">Nama Barang</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama barang" >
                            </div>
                            <div class="form-group">
                                <label for="tgl_daftar">Tanggal Daftar</label>
                                <input type="date" name="tgl" class="form-control" placeholder="Masukkan tgl daftar">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga barang" >
                            </div>
                            <div class="form-group">
                                <label for="Deskripsi">Deskripsi</label>
                                <textarea type="text" name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Barang" ></textarea>
                            </div>
                            <div class="form-group">
                            <label for="Foto Produk">Foto Produk</label>
                            <input type="file" name="foto" class="form-control">
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <input type="submit" name="insert" class="btn btn-success" value="Insert barang">
                            </form>

                        </div>
                        </div>
                    </div>
                    </div>


                    
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <button type="button" class="btn btn-success btn-icon-split" style="float: right;" data-toggle="modal" data-target="#TambahModal">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Data</span>
                            </button>
                            
                            <h6 class="m-0 font-weight-bold text-primary">Data Tabel Barang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>

                                        <tr>
                                            <th>No</th>
                                            <th>Foto Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Harga Awal</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        include "../koneksi.php";
                                        $barang = mysqli_query($conn,"SELECT * FROM barang ");
                                        $no = 0;
                                        while ($data = mysqli_fetch_array($barang)) {
                                        $no++;
                                        $foto_barang = $data['foto_barang'];
                                        ?>
                                        <tr>
                                            <td><?php echo $no?></td>
                                            <td><img src="../assets/img/<?php echo $foto_barang ?>" style="width: 100px; text-align:center;" alt=""></td>
                                            <td><?=$data['nama_barang']?></td>
                                            <td><?=$data['tgl_daftar']?></td>
                                            <td><?=$data['harga_awal']?></td>
                                            <td><?=$data['deskripsi']?></td>
                                            
                                            <td>
                                                <form action="" method="post">
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditModal<?php echo $data['id']; ?>">
                                            Edit
                                            </button>
                                            <input type="hidden" name="id" value="<?=$data['id']?>">
                                            <input type="submit" name="hapus" value="Hapus"class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                            </form>
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
                                                        $qry = mysqli_query($conn,"select * from barang where id='$id'");
                                                        $data = mysqli_fetch_array($qry);
                                                        $nama = $data['nama_barang'];
                                                        $tgl = $data['tgl_daftar'];
                                                        $harga = $data['harga_awal'];
                                                        $deskripsi = $data['deskripsi'];

                                                        ?>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?=$data['id']?>">
                                                            <div class="form-group">
                                                                <label for="username">Nama Barang</label>
                                                                <input type="text" name="nama" class="form-control" value="<?php echo $nama ?>" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tgl_daftar">Tanggal Daftar</label>
                                                                <input type="txt" name="tgl" class="form-control" value="<?php echo $tgl?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="harga">Harga</label>
                                                                <input type="number" name="harga" class="form-control" value="<?php echo $harga ?>" >
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Deskripsi">Deskripsi</label>
                                                                <input type="text" name="deskripsi" class="form-control" value="<?php echo $deskripsi ?>">
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
            </div>
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

            <!-- Modal Alert Delete -->
        <form action="" method="post">
        <div class="modal fade" id="AlertDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Menghapus Data ini
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <input type="submit" name="hapus" value="Hapus"class="btn btn-danger">
            </div>
            </div>
        </div>
        </div>
        </form>

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
#insert databse with modal
    if (isset($_POST['insert'])){
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $foto = basename($_FILES["foto"]["name"]);
    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 

    if (empty($nama)){
        echo "<script>alert('Harga Produk Tidak Boleh Kosong')</script>";
    }else if (empty($deskripsi)){
        echo "<script>alert('Deskripsi Produk Tidak Boleh Kosong')</script>";
    }else if (empty($foto)){
        echo "<script>alert('Foto Produk Tidak Boleh Kosong')</script>";
    }else{
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check == false) {
            echo "<script>alert('File yang dipilih bukan foto.');location.href='barang.php';</script>";
            $uploadOk = 0;
        } else {
            $uploadOk = 1;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "<script>alert('File foto sudah ada.');location.href='barang.php';</script>";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["foto"]["size"] > 999999999999) {
            echo "<script>alert('File foto terlalu besar');location.href='barang.php';</script>";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "<script>alert('Hanya menerima file foto JPG, JPEG, PNG & GIF');location.href='tambah_buku.php';</script>";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>alert('File foto tidak terupload');location.href='barang.php';</script>";  
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                
                include "../koneksi.php";
                
                $sql = "INSERT INTO `barang` (`nama_barang`, `tgl_daftar`, `harga_awal`,`deskripsi`, `foto_barang`) VALUES ('$nama','$tgl','$harga', '$deskripsi','$foto')";
                
                $insert=mysqli_query($conn, $sql);

                if($insert) {
                    echo "<script>alert('Sukses menambahkan buku');location.href='barang.php';</script>";
                } else {
                    echo "<script>alert('Gagal menambahkan buku');location.href='barang.php';</script>";
                }
            } else {
                echo "<script>alert('Error saat upload file foto');location.href='barang.php';</script>";
            }
        }

    }
    
}
?>

<?php
#hapus barang
    if (isset($_POST['hapus'])){
    include "../koneksi.php";
    $id = $_POST['id'];
    $hps = mysqli_query($conn,"delete from barang where id='$id' ");

    if ($hps) {
        echo "<script>location.href='barang.php';</script>";
    }else{
        echo "<script>location.href='barang.php';</script>";
    }
}
?>

<?php
#edit barang
if (isset($_POST['edit'])){
    include "../koneksi.php";
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = "petugas";

    if(empty($id)){
        echo "<script>alert('')</script>";
    }else if(empty($nama)){
        echo "<script>alert('')</script>";
    }else if(empty($username)){
        echo "<script>alert('')</script>";
    }else if (empty($password)){
        $edit = mysqli_query($conn,"update petugas set nama_petugas='$nama',username='$username' where id='$id'") or die ;
        if ($edit){
            echo "<script>alert('Sukses edit petugas');location.href='petugas.php';</scrip>";
        }else{
            echo "<script>alert('Gagal edit petugas');location.href='http://localhost/login/admin/petugas.php';</script>";
        }
    }else{
        $edit2 = mysqli_query($conn,"update petugas set nama_petugas='$nama',username='$username',password='$password' where id='$id'") or die ;
    }
}
?>

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