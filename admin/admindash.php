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
 	<div class="bg-primary text-white mt-5 mb-5 p-5 row">
 		<div class="col-1 mt-2 font-weight-bold"><a href="../index.php" class="text-white">HOME</a></div>
		<h2 class="text-center col-10">Welcome to Admin Dashboard</h2>
		<div class="col-1 mt-2 font-weight-bold"><a href="logout.php" class="text-white">Logout</a></div>
	</div>
 	<div class="text-center">
 	<ul class="list-group">
        <a class="list-group-item list-group-item-action" href="addstudent.php">Insert Student Details</a>
        <a class="list-group-item list-group-item-action" href="updatestudent.php">Update Student Details</a>
        <a class="list-group-item list-group-item-action" href="deletestudent.php">Delete Student Details</a>       
    </ul>
	</div>
 </div>
 <?php require('includes/footer.php') ?>