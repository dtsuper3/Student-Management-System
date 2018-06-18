<?php 
	session_start();
	if(isset($_SESSION['uid'])) {
		header('location:admin/admindash.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<title>Admin Login</title>
</head>
<body>
	<div class="container">
		<h1 class="text-center mt-4">Admin Login</h1>
		<form action="login.php" method="post">
			<div class="form-group m-auto">
				<label for="uname" class="font-weight-bold">Username</label>
				<input type="text" name="uname" class="form-control">
			</div>
			<div class="form-group m-auto">
				<label for="password" class="font-weight-bold">Password</label>
				<input type="password" name="password" class="form-control">
			</div>
			<button class="mt-4 btn btn-primary btn-block" name="login">login</button>
		</form>
	</div>
</body>
</html>
<?php
	require('dbcon.php');
	if (isset($_POST['login'])) {
		$username = htmlspecialchars($_POST['uname']);
		$password = htmlspecialchars($_POST['password']);
		$query = "SELECT * FROM admin WHERE USERNAME='$username' AND PASSWORD='$password'";
		$result = mysqli_query($con,$query);
		$row = mysqli_num_rows($result);
		if ($row < 1) {
		?>
			<script>
				alert("Username or Password not match!!");
				window.open('login.php','_self');
			</script>
		<?php 
		}
		else{
			$data = mysqli_fetch_assoc($result);
			$id = $data['id'];
			$_SESSION['uid']=$id;
			header('location:admin/admindash.php');
		}
	}
 ?>