<?php
session_start();
if (isset($_SESSION['user'])) {
	header('Location: ./');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Login Dashboard</title>
</head>
<body>
	<h4>Halaman login Dashboard</h4>
	<?php
	if (isset($_POST['login'])) {
		include('config/koneksi.php');

		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);

		$query=mysqli_query($dbc, "SELECT * FROM user WHERE username='$username'");
		if (mysqli_num_rows($query) == 0) {
			echo "Username Salah..!!";
		} else {
			$fetchData=mysqli_fetch_array($query);
			// Cek Password
			if ($password == $fetchData['password']) {
				$_SESSION['user']=$fetchData;
				header('Location: ./');
				exit;
			} else {
				echo "Password Salah..!";
			}
		}
	}
	?>
	<form action="" method="POST">
		Username : <br>
		<input type="text" name="username"><br>
		Password : <br>
		<input type="password" name="password"><br><br>
		<input type="submit" name="login" value="LOGIN">
		<input type="reset" name="reset" value="RESET">
	</form>
</body>
</html>