<html>
<head>
	<title>Form Update</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<script type="application/javascript">
		$(document).ready(function() {
    var $submit = $('input[type="submit"]');
    $submit.prop('disabled', true);
    $('input[type="text"]').on('input change', function() { //'input change keyup paste'
        $submit.prop('disabled', !$(this).val().length);
    });
	$('input[type="select"]').on('input change', function() { //'input change keyup paste'
        $submit.prop('disabled', !$(this).val().length);
    });
	$('input[type="file"]').on('input change', function() { //'input change keyup paste'
        $submit.prop('disabled', !$(this).val().length);
    });
	$('input[type="checkbox"]').on('input change', function() { //'input change keyup paste'
        $submit.prop('disabled', !$(this).val().length);
    });
});
	</script>
</head>
<body>
<?php

include("connection.php");
    if (isset($_GET['id'])) 
	{
		$id = $_GET['id'];
		$result = mysqli_query($con, "SELECT * FROM emp_details WHERE emp_id='".$id."'");
		$res = mysqli_fetch_array($result);
	}
?>
	<form action = "edit_process.php" method = "POST" enctype="multipart/form-data">
	<h1><center>Update the Form Details</center></h1>
	<table height = "30" width = 30% border = "3" align = "center">
				<tr>
					<td width= "20%">Name:</td>
					<td><input type = "text" name= "name" id = "name" value = "<?php echo $res['emp_name'];?>"></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type = "text" name= "email" id = "email" value = "<?php echo $res['emp_email'];?>"></td>
				</tr>
				<tr>
					<td>Gender:</td>
					<td>
						<input type = "radio" name= "gender"  value= "Male" id = "gender" 
							   <?php if($res['emp_gender'] == 'Male'){ echo 'checked="checked"';}?>
							   >Male
						<input type = "radio" name = "gender" value="Female" id = "gender" 
							   <?php if($res['emp_gender'] == 'Female'){ echo 'checked="checked"';}?>
							   >Female
					</td>
				</tr>
				<tr>
					<td>Image:</td>
					<td><input type = "file" name= "image" id = "image"><img src= "<?php echo "empImages/".$res['emp_image']; ?>" height="42" width="42"></td>
				</tr>
				<tr>
					<td>Job Role:</td>
					<td>
							<?php 
							$result = mysqli_query($con,"SELECT * FROM emp_job_role");
							?>
							<select name = "job_role_id" id = "job_role_id">
							<?php while($job_role = mysqli_fetch_assoc($result))
							{
							?>
								<option value = "<?php echo $job_role['emp_job_role_id'];?>" <?php if($res['emp_job_role_id'] == $job_role['emp_job_role_id']) { echo "selected"; }?> > <?php echo $job_role['emp_field_name'];?> </option>			
					<?php   } 
							?>
							</select>
						</td>
				</tr>
				<tr>
					<td>Interests:</td>
					<td>
						
						
						<?php
						
						$select_interest = mysqli_query($con,"SELECT * FROM interest");
						$rows =  array();
						while($row = mysqli_fetch_array($select_interest)) {
							$rows[] = $row;
						}
						
						$select = mysqli_query($con,"SELECT * FROM emp_interest WHERE emp_id = '".$res['emp_id']."'");
						
						$empIntrests =  array();
						while($interest = mysqli_fetch_array($select)) {
							$empIntrests[] = $interest;
						}
						$intrestIDs = array();
						
						foreach($empIntrests as $ids){
							$intrestIDs[] = $ids['interest_id'];
						}
						
						foreach($rows as $row)
						{			
//							print_r($row['interest_id']);exit();
							?>
								<input type = "checkbox" name= "interest[]" id = "interest" value= "<?php echo $row['interest_id']; ?>" <?php if(in_array($row['interest_id'] , $intrestIDs)){ echo "checked"; }?>><?php echo $row['interest_name'];?><br>
				
						<?php } ?>
						
					
					</td>
				</tr>
				<tr>
					<td><input type= "hidden" name= "id" value = "<?php echo $_GET['id']?>"></td>
					<td colspan = "2"><center><input type = "submit" name= "update" value = "Update" id= "update"></center></td>
				</tr>
			</table>
		</form>
		</body>
		</html>
	