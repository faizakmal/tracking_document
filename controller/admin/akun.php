<?php
	include('../../controller/conn.php');

	if (isset($_POST['tambah'])) {
			$username=$_POST['username'];
			$password = $_POST['password'];
			$kpassword = $_POST['kpassword'];
			$nama = $_POST['nama'];
			$role = "Nasabah";

			if ($password!=$kpassword) {
				echo "Password Tidak Sesuai";
			}
			else{
				mysqli_query($conn,"insert into akun (username, password, nama, role) values ('$username', '$password', '$nama', '$role')");
				header('location:../../view/admin/pengaturan.php');
			}
	}

	if (isset($_POST['edit'])) {
			$id=$_GET['id'];
			$password = $_POST['password'];
			$kpassword = $_POST['kpassword'];
			$nama = $_POST['nama'];
			$role = "Nasabah";

			if ($password!=$kpassword) {
				echo "Password Tidak Sesuai";
			}
			else{
				mysqli_query($conn,"update akun set password = '$password', nama='$nama', role='$role' where username='$id'");
				header('location:../../view/admin/pengaturan.php');
			}
	}

	if (isset($_POST['delete'])) {
				$id=$_GET['id'];
				mysqli_query($conn,"delete from akun where username='$id'");
            header('location:../../view/admin/pengaturan.php');
	}

?>