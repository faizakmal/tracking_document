<?php
	include('../../controller/conn.php');

	if (isset($_POST['tambah'])) {
			$id=$_POST['id'];
			$nama=$_POST['nama'];
			$no_ktp=$_POST['no_ktp'];
			$developer=$_POST['developer'];
			$status=$_POST['status'];
			$keterangan=$_POST['keterangan'];

			$tanggal= date("Y-m-d");

			mysqli_query($conn,"insert into pengajuan (id, username, no_ktp, developer, status, keterangan) values ('$id', '$nama', '$no_ktp', '$developer', '$status', '$keterangan')");

			mysqli_query($conn,"insert into status (id, username, status, tanggal) values ('$id', '$nama', '$status','$tanggal')");

			header('location:../../view/admin/home.php');
	}

	if (isset($_POST['edit'])) {
			$id=$_GET['id'];
			$nama=$_POST['nama'];
			$no_ktp=$_POST['no_ktp'];
			$developer=$_POST['developer'];
			$status=$_POST['status'];
			$keterangan=$_POST['keterangan'];

			$tanggal= date("Y-m-d");

			mysqli_query($conn,"update pengajuan set username = '$nama', no_ktp='$no_ktp', developer='$developer', status='$status', keterangan='$keterangan' where id='$id'");
			
			mysqli_query($conn,"insert into status (id, username, status, tanggal) values ('$id', '$nama', '$status','$tanggal')");


			header('location:../../view/admin/home.php');
	}

	if (isset($_POST['delete'])) {
				$id=$_GET['id'];
				mysqli_query($conn,"delete from pengajuan where id='$id'");
            header('location:../../view/admin/home.php');
	}

?>