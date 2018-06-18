<?php 
	function showdetails($standard,$rollno)
	{
		require('dbcon.php');
		$query="SELECT * FROM student WHERE rollno='$rollno' AND standard='$standard'";
		$run=mysqli_query($con,$query);
		if (mysqli_num_rows($run)>0) {
			$data=mysqli_fetch_assoc($run);
			?>
				<table class="table table-borderless">			
					<tbody>
					    <tr>
					      <th colspan="3" class="text-center">Student Details</th>					  
					    </tr>			
					    <tr>
					      <th scope="row" rowspan="5"><img src="dataimg/<?php echo $data['image']; ?>" alt="image" style="max-height: 150px;max-width: 120px;"></th>				  
					      <th>Roll No</th>
					      <td><?php echo $data['rollno']; ?></td>
					    </tr>			
					    <tr>
					      <th scope="col">Name</th>
					      <td><?php echo $data['name']; ?></td>		
					    </tr>			
					    <tr>
					      <th scope="col">Standard</th>	
					      <td><?php echo $data['standard']; ?></td>						  
					    </tr>			
					    <tr>					
					      <th scope="col">Parent Contact</th>	
					      <td><?php echo $data['pcont']; ?></td>	  
					    </tr>			
					    <tr>					
					      <th scope="col">City</th>	
					      <td><?php echo $data['city']; ?></td>	  
					    </tr>			
					</tbody>
				</table>
			<?php		
		}
		else{
			echo "<h3>No Student Found..</h3>";
		}
	}
 ?>