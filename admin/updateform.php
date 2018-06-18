<?php 
	session_start();
	if (isset($_SESSION['uid'])) {
		require('../dbcon.php');
		$sid=$_GET['sid'];
		$query="SELECT * FROM `student` WHERE `id`='$sid'";
		$run=mysqli_query($con,$query);
		$data=mysqli_fetch_assoc($run);
	}
	else{
		header('location:../login.php');
	}
 ?>
 <?php require('includes/header.php'); ?>
 <div class="container">
 	<?php require('includes/adminhead.php'); ?>
 	<form action="updatedata.php" method="post" enctype="multipart/form-data">
 		<div class="form-group row">
 			<label for="rollno" class="col-2 col-form-label">Rollno</label>
 			<div class="col-10">
 				<input type="number" class="form-control" name="rollno" value="<?php echo $data['rollno']; ?>" required>	
			</div>
 		</div>
 		<div class="form-group row">
 			<label for="name"  class="col-2 col-form-label">Name</label>
 			<div class="col-10">
 				<input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" required>
 			</div>
 		</div>
 		<div class="form-group row">
 			<label for="city" class="col-2 col-form-label">City</label>
 			<div class="col-10">
 				<input type="text" class="form-control" name="city" value="<?php echo $data['city']; ?>" required>
 			</div>
 		</div>
 		<div class="form-group row">
 			<label for="pcont" class="col-2 col-form-label">Parent Contact</label>
 			<div class="col-10">
 				<input type="text" class="form-control" name="pcont" value="<?php echo $data['pcont']; ?>" required>
 			</div>
 		</div>
 		<div class="form-group row">
 			<label for="standard" class="col-2 col-form-label">Standard</label>
 			<div class="col-10">
 				<input type="number" class="form-control" name="standard" value="<?php echo $data['standard']; ?>" required>
 			</div>
 		</div>
 		<div class="form-group row">
 			<label for="image" class="col-2 col-form-label">Image</label>
 			<div class="col-10">
 				<input type="file" class="form-control-file" name="image">
 			</div>
 		</div>
 		<input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
 		<button type="submit" class="btn btn-primary btn-block" name="update">Update</button>
 	</form>
 </div>
 <?php require('includes/footer.php') ?>