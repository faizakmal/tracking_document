<?php
    if(isset($_POST['login'])){
    session_start();
    include ('conn.php');
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $login = mysqli_query($conn, "select * from akun where username='$username' and password='$password'");
    $cek = mysqli_fetch_row($login);
    
    if($cek > 0){
      if ($cek[3] == "Admin") {
        $_SESSION['nama'] = $cek[2];
        $_SESSION['username'] = $cek[0];
        header('Location: ../view/admin/home.php');        
      }
      elseif ($cek[3] == "Nasabah") {
        $_SESSION['nama'] = $cek[2];
        $_SESSION['username'] = $cek[0];
        header('Location: ../view/nasabah/home.php'); 
        }
      }
     else{
      header('Location: index.php'); 
    }
  }
?>