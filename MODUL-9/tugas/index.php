<?php
session_start();
if (isset($_SESSION['user'])) {
	if ($_SESSION['user']['status']=='Administrator') {
		header('Location: admin/');
	} elseif ($_SESSION['user']['status']=='Member') {
		header('Location: member/');
	} else {
		session_destroy();
		echo "<script>alert('Access Denied!! Unauthorize Status User.');window.location='./';</script>";
	}

	exit;
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Halaman Login Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <?php
		if (isset($_POST['login'])) {
			include('config/koneksi.php');

			$username = mysql_real_escape_string($_POST['username']);
			$password = mysql_real_escape_string($_POST['password']);

			$query=mysqli_query($dbc, "SELECT * FROM user WHERE username='$username'");
			if (mysqli_num_rows($query) == 0) {
				echo "<b>Username Salah..!!<b><br>";
			} else {
				$fetchData=mysqli_fetch_array($query);
				// Cek Password
				if ($password == $fetchData['password']) {
					$_SESSION['user']=$fetchData;
					if ($_SESSION['user']['status']=='Administrator') {
						echo "<script>alert('Login Sukses');window.location='admin/';</script>";
					} elseif ($_SESSION['user']['status']=='Member') {
						echo "<script>alert('Login Sukses');window.location='member/';</script>";
					}
					exit;
				} else {
					echo "<b>Password Salah..!<b><br>";
				}
			}
		}
		?>
		<br>
      <label for="inputUsername" class="sr-only">Username</label>
      <input name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
  </body>
</html>