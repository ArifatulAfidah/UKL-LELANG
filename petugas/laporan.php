<?php 
	require '../koneksi.php';
	date_default_timezone_set("Asia/Jakarta");
?>
<style>
	.judul{
		text-align: center;
	}
</style>
<html>
	<head>
		<title>LAPORAN LELANG </title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	</head>
	<body>
		<script>window.print();</script>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
						<div class="judul py-5 text-success">
						<h1>WEBSITE UKL LELANG </h1>
						<h5>Tanggal : <?php  echo date("j F Y, G:i");?></h5>
						</div>
                        
					<table class="table table-bordered" style="width:100%;text-align:center;">
					<thead class="thead-dark">
						<tr>
							<td>NO</td>
							<td>FOTO</td>
							<td>NAMA BARANG</td>
							<td>TANGGAL TERLELANG</td>
							<td>NAMA PELELANG</td>
							<td>HARGA</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						$sql = mysqli_query($conn, "select * from lelang where status ='terlelang'");
						while ($lelang = mysqli_fetch_array($sql)){
						$id_barang = $lelang['id_barang'];
						$id_user = $lelang['id_user'];
						$sql2 = mysqli_query($conn, "select * from barang where id ='$id_barang'");
						$barang = mysqli_fetch_array($sql2);
						$sql3 = mysqli_query($conn, "select * from user where id = '$id_user'");
						$user = mysqli_fetch_array($sql3);	
						?>
						
						<tr>
							<td><?php echo $no;?></td>
							<td><img src="../assets/img/<?php echo $barang['foto_barang']?>"height="100px"alt=""></td>
							<td><?php echo $barang['nama_barang'];?></td>
							<td><?php echo $lelang['tgl_lelang'];?></td>
							<td><?php echo $user['nama'];?></td>
							<td><?php echo $lelang['harga_akhir'];?></td>
						</tr>
					</tbody>
						<?php $no++; }?>
					</table>
					<div class="clearfix"></div>
					<center>
                    <br>
						<h5 class="text-warning">Laporan Website Lelang by Atull </h5>
					</center>
				</div>
			</div>
		</div>
	</body>
    
</html>
