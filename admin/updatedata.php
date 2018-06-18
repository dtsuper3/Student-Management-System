<?php 
		session_start();
		if (isset($_SESSION['uid'])) {
		if (isset($_POST['update'])) {
	 		require('../dbcon.php');

	 		$rollno=$_POST['rollno'];
	 		$name=$_POST['name'];
	 		$city=$_POST['city'];
	 		$pcont=$_POST['pcont'];
	 		$standard=$_POST['standard'];
	 		$id=$_POST['sid'];
	 		$image=$_FILES['image']['name'];
	 		if ($image) {
	 			$tempname=$_FILES['image']['tmp_name'];
	 			move_uploaded_file($tempname, "../dataimg/$image");
	 		}else{
	 			$img_query="SELECT image FROM `student` WHERE id='$id'";
	 			$run=mysqli_query($con,$img_query);
	 			$data=mysqli_fetch_assoc($run);
	 			$image=$data['image'];
	 			$tempname=$_FILES['image']['tmp_name'];
	 			move_uploaded_file($tempname, "../dataimg/$image");
	 		}
	 		$query="UPDATE student SET rollno='$rollno',name='$name',city='$city',pcont='$pcont',standard='$standard',image='$image' WHERE id='$id'";
	 	 	$run=mysqli_query($con,$query);
	 		if ($run) {
	 			?>
	 			<script type="text/javascript">
	 				alert('Data Updated Successfully');
	 				window.open('updateform.php?sid=<?php echo $id; ?>','_self');
	 			</script>
	 			<?php  
 		}
 	}
	}else{
		header('location:../login.php');
	}
?>