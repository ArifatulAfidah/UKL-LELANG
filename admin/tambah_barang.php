<?php
if($_POST) {
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