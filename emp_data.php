<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title>Employee Details</title>
	<script type="text/javascript">
$(document).ready(function() {
			
    $("#ckbCheckedAll").change(function() {

        if (this.checked) {
            $(".ckbChecked").each(function() {
                this.checked=true;
            });
        } else {
            $(".ckbChecked").each(function() {
                this.checked=false;
            });
        }
    });

    $(".ckbChecked").click(function () {
		
        if ($(this).is(":checked")) {
            var isAllChecked = 0;

            $(".ckbChecked").each(function() {
                if (!this.checked)
                    isAllChecked = 1;
            });
			
		 if (isAllChecked == 0) {
                $("#ckbCheckedAll").prop("checked", true);
            }     
        }
        else {
            $("#ckbCheckedAll").prop("checked", false);
        }
    });
	 $('#delete').click(function() {
		 
            if($('input[type=checkbox]:checked').length == 0)
			{
    			alert ( "Please select at least one checkbox" );
				return false;
			}
		else
			{
				alert ( "Are you sure you want to delete this item?" );
			}
		});
		 
		/* var x=false;
		for(var i=0,l=checkboxs.length;i<l;i++)
		{
			if(checkboxs[i].checked)
			{
				x=true;
				break;
			}
		}
		if(x){
			//
		}else {
			alert("Please check a checkbox");
		}*/
    });
	

	</script>	
</head>
<body>
	<br>
	<h1><center>Employee Details</center></h1>
	<hr width= '900px' height = '3px' color= '#000000'>
	<br>
	
<?php
include("connection.php");
	$qr1 = mysqli_query($con,"SELECT * FROM emp_details e,emp_job_role r where e.emp_job_role_id = r.emp_job_role_id");
			
?>
	<center><a href="emp_register.php">Register</a></center><br>
			<table align = 'center' border = '1px solid'>
			<tr>
				<th>
					<form name="form" id= "form" action = "emp_data_process.php" method="post">
					<input type="checkbox" name= "ckbCheckedAll" id= "ckbCheckedAll"></th>
				<th width= '10%'>Name</th>	
				<th>Email</th>
				<th>Gender</th>
				<th>Image</th>
				<th>Job Role</th>
				<th>Interests</th>
				<th>Create Date</th>
				<th>Update</th>
				<th>Action</th>
			</tr>
			<?php
				
			if(mysqli_num_rows($qr1)>0)
			{
					while($r= mysqli_fetch_array($qr1))
					{  
			?>
			<tr>
				<td><input type="checkbox" id="check" name="check[]" class="ckbChecked" value="<?php echo $r['emp_id']; ?>"></td>
				<td><?php echo $r['emp_name']; ?></td>
				<td><?php echo $r['emp_email']; ?></td>
				<td><?php echo $r['emp_gender']; ?></td>
				<td><img src='empImages/empThumb/<?php echo $r['emp_thumb_image'];?>'></td>
				<td><?php echo $r['emp_field_name']; ?></td>
				
				<td>
					<?php
						
						$select = mysqli_query($con,"SELECT interest_name FROM emp_interest e,interest i WHERE e.interest_id = i.interest_id AND emp_id = '".$r['emp_id']."'");
						//echo mysqli_num_rows($select);
						$empInterests = array();
						if(mysqli_num_rows($select) > 0)
						{
							//print_r(array_values($interest));
							while($interest = mysqli_fetch_array($select))
							{	
								$empInterests[] = $interest['interest_name'];
							}
							$emp_interests = implode(' , ',$empInterests);
								echo $emp_interests;
						}
						 ?>		
				</td>
				
				<td><?php echo $r['emp_create_date']; ?></td>
				<td><?php echo $r['emp_update']; ?></td>
				
				<td><a href='emp_edit.php?id=<?php echo $r['emp_id']; ?>'>Edit</a> | 
				<a href='emp_delete.php?id=<?php echo $r['emp_id']; ?>' onclick = "return confirm('Are you sure you want to delete this item?');">Delete</a></td>
			</tr>
			
			<?php } ?>
				<tr><td colspan="10"><center><input type= "submit" name="delete" id = "delete" value="Delete">
					</form></center></td></tr>
			
			<?php
			}
															 
				mysqli_close($con);
			?>
	<?php if(empty(mysqli_num_rows($qr1))){?>
	<tr><td colspan="10"><center>No records !</center></td></tr>
			<?php } ?>
<br>
</table>
</body>
</html>