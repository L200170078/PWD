<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Counter SESSION</title>
</head>
<body>
<?php
$_SESSION['counter']++;
$_SESSION['nama_pengunjung']='abdul';
echo "Selamat Datang $_SESSION[nama_pengunjung] Anda telah mengunjungi halaman ini sebanyak $_SESSION[counter]";
?>
</body>
</html>