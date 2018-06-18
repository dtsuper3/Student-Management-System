<?php 
	session_start();
	if (isset($_SESSION['uid'])) {
		echo "";
	}
	else{
		header('location:../login.php');
	}
 ?>
 <?php require('includes/header.php'); ?>
 <div class="container">
 	<?php require('includes/adminhead.php'); ?>
 	<form action="addstudent.php" method="post" enctype="multipart/form-data">
 		<div class="form-group row">
 			<label for="rollno" class="col-2 col-form-label">Rollno</label>
 			<div class="col-10">
 				<input type="number" class="form-control" name="rollno" placeholder="Enter Rollno" required>	
			</div>
 		</div>
 		<div class="form-group row">
 			<label for="name"  class="col-2 col-form-label">Name</label>
 			<div class="col-10">
 				<input type="text" class="form-control" name="name" placeholder="Enter Name" required>
 			</div>
 		</div>
 		<div class="form-group row">
 			<label for="city" class="col-2 col-form-label">City</label>
 			<div class="col-10">
 				<input type="text" class="form-control" name="city" placeholder="Enter City" required>
 			</div>
 		</div>
 		<div class="form-group row">
 			<label for="pcont" class="col-2 col-form-label">Parent Contact</label>
 			<div class="col-10">
 				<input type="text" class="form-control" name="pcont" placeholder="Enter Parent Number" required>
 			</div>
 		</div>
 		<div class="form-group row">
 			<label for="standard" class="col-2 col-form-label">Standard</label>
 			<div class="col-10">
 				<input type="number" class="form-control" name="standard" placeholder="Enter Standard" required>
 			</div>
 		</div>
 		<div class="form-group row">
 			<label for="image" class="col-2 col-form-label">Image</label>
 			<div class="col-10">
 				<input type="file" class="form-control-file" name="image" required>
 			</div>
 		</div>
 		<button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
 	</form>
 </div>
 <?php require('includes/footer.php') ?>
 <?php 
 	if (isset($_POST['submit'])) {
 		require('../dbcon.php');

 		$rollno=$_POST['rollno'];
 		$name=$_POST['name'];
 		$city=$_POST['city'];
 		$pcont=$_POST['pcont'];
 		$standard=$_POST['standard'];
 		$image=$_FILES['image']['name'];
 		$tempname=$_FILES['image']['tmp_name'];

 		move_uploaded_file($tempname, "../dataimg/$image");
 		$query="INSERT INTO `student`(`id`, `rollno`, `name`, `city`, `pcont`, `standard`, `image`) VALUES (null,'$rollno','$name','$city','$pcont','$standard','$image')";
 		$run=mysqli_query($con,$query);
 		if ($run) {
 			?>
 			<script>
 				alert('Data Inserted Successfully');
 			</script>
 			<?php  
 		}
 	}
  ?>