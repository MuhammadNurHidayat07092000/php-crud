<?php 
session_start();
if(!isset($_SESSION['masuk'])) {
	header('location: login.php');
}

require 'connection.php';
$query = 'SELECT * FROM mahasiswa ORDER BY nim ASC';
$result = mysqli_query($link, $query);

// var_dump($result);
 ?>
<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">

	<title>Data mahasiswa</title>
	<h4>Selamat datang, <?php echo $_SESSION['username']; ?></h4>
	

	<style>
		body{
			padding: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2 class="alert alert-warning text-center mt-3">Data Mahasiswa</h2>
	</div>
	<a href="logout.php" onclick="return confirm('Anda Yakin?')" class="fas fa-sign-out-alt text-danger">Logout Data</a>
	<hr>
	
	<?php
	if($_SESSION['status'] == 'admin') {
	?>

	<!-- <button class="btn btn-success"><i class="fas fa-user-edit"></i> -->
		<a href="tambah.php" class="fas fa-user-plus text-succes">Tambah Data</a>
	<!-- </button>  -->

	<?php
	}
	?>
	
	<table class="table table-bordered table-dark">
		<thead>
			<tr class="text-center btn-success">
				<th scope="col">No</th>
				<th scope="col">Nim</th>
				<th scope="col">Nama</th>
				<th scope="col">Fakultas</th>
				<th scope="col">Alamat</th>
				<th scope="col">Jenis Kelamin</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>

		<tbody>
<?php 
$no=1;
while ($data=mysqli_fetch_assoc($result)) {
?>	
			<tr>
				<th scope="row" class="text-center"><?php echo $no++; ?></th>
				<td><?php echo $data['nim']; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['fakultas']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['jk']; ?></td>
				<td class="text-center">
				    <a href="ubah.php?id=<?php echo $data['id']; ?>" class="fas fa-pencil-alt btn btn-warning"></a>
				<?php
				if($_SESSION['status'] == 'admin') {
				?>
					<a href="hapus.php?kode=<?php echo $data['id']; ?>" class="fas fa-trash btn btn-danger"></a>
				<?php
				}
				?>
	
				</td> 
			</tr>
<?php 
}
?>	
		</tbody>
	</table>
</body>
</html>