<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<title>Student Management System</title>
	</head>
	<body>
		<h5 class="text-right mr-4 mt-4"><a href="login.php">Admin Login</a></h5>
		<h1 class="text-center">Welcome to Student Management System</h1>
		<div class="container m-auto">
			<form action="index.php" method="post" class="mt-4 mb-4">
				<div class="form-group text-center">
					<h2>Student Information</h2>
				</div>
				<div class="form-group">
					<label for="exampleSelect1">Choose Standard</label>
					<select class="form-control" name="standard" required>
						<option value="1">1st</option>
						<option value="2">2nd</option>
						<option value="3">3rd</option>
						<option value="4">4rth</option>
						<option value="5">5th</option>
						<option value="6">6th</option>
						<option value="7">7th</option>
						<option value="8">8th</option>
						<option value="9">9th</option>
						<option value="10">10th</option>
						<option value="11">11th</option>
						<option value="12">12th</option>
					</select>
				</div>
				<div class="form-group">
					<label for="rollno">Roll no.</label>
					<input type="number" name="rollno" class="form-control" required>
				</div>
				<button type="submit" name="submit" class="btn btn-primary btn-block mt-4">Show Info</button>
			</form>
<?php 
	if (isset($_POST['submit'])) {
		$standard=$_POST['standard'];
		$rollno=$_POST['rollno'];
		require('dbcon.php');
		require('function.php');
		showdetails($standard,$rollno);
	}
 ?>
 </div>
 <script src="js/bootstrap.min.js"></script>
	</body>
</html>