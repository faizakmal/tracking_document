<?php
session_start();

$_SESSION['nama'] = '';
$_SESSION['status'] = '';


unset($_SESSION['nama']);
unset($_SESSION['status']);

session_unset();
session_destroy();
header('Location:../index.php');

?>