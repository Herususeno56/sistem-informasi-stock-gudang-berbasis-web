<?php
session_start();
include "../koneksi/koneksi.php";


$login = mysqli_query($con,"select * from user where username = '" . $_POST['username'] . "' and password = '".md5($_POST['password'])."'");
$login2 = mysqli_query($con,"select * from user where username = '" . $_POST['username'] . "' and password = '".md5($_POST['password'])."'");
$rowcount = mysqli_num_rows($login);

$data = mysqli_fetch_array($login2);

if ($rowcount == 1) 
{
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = md5($_POST['password']);
	$_SESSION['email'] = $data['email'];
	header("Location: ../index.php");
}
else
{
	echo '<script>alert(\'Username atau password tidak sesuai!\')
			setTimeout(\'location.href="../login.php"\' ,0);</script>';
			exit;
}
