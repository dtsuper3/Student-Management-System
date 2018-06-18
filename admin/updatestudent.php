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
 <div class="container m-auto">
 	<?php require('includes/adminhead.php'); ?>
 	<form action="updatestudent.php" method="post" class="form-inline">
		<label for="standard" class="m-2">Standard</label>
		<input type="number" class="form-control mb-2 mr-sm-2" name="standard" placeholder="Enter Standard" required>
		<label for="name"  class="m-2">Name</label>
		<input type="text" class="form-control mb-2 mr-sm-2" name="name" placeholder="Enter Name" required>
 		<button type="submit" class="btn btn-primary form-control mb-2 mr-sm-2" name="submit">Search</button>
 	</form>
 <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Rollno</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
 <?php 
 	if (isset($_POST['submit'])) {
 		require('../dbcon.php');

 		$name=htmlspecialchars($_POST['name']);
 		$standard=htmlspecialchars($_POST['standard']);

 		$query="SELECT * FROM `student` WHERE `name` LIKE '%$name%' AND `standard`='$standard'";
 		$run=mysqli_query($con,$query);
 		if (mysqli_num_rows($run)<1) {
 			echo "<tr><td>No Record Found</td></tr>";
 		}else{
 			$count=0;
 			while ($data=mysqli_fetch_assoc($run)) {
 				$count++;
 				?>
			    <tr>
			      <th scope="row"><?php echo $count; ?></th>
			      <td><img src="../dataimg/<?php echo $data['image'] ?>" alt="image" style="max-width: 100px"></td>
			      <td><?php echo $data['name']; ?></td>
			      <td><?php echo $data['rollno']; ?></td>
			      <td><a href="updateform.php?sid=<?php echo $data['id']; ?>">Edit</a></td>
			    </tr>
			    <?php
 			}
 		}
 	}
  ?>
</tbody>
</table>
 </div>
<?php require('includes/footer.php') ?>