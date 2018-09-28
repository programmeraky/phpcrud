<?php
	include("connection.php");
	$id = $_GET['id'];

	$q = mysqli_query($con,"SELECT * FROM emp_details where emp_id = '".$id."'");
	$res = mysqli_fetch_array($q);
	unlink("empImages/".$res['emp_image']);
	unlink("empImages/empThumb/".$res['emp_thumb_image']);
	//echo $id;
	$qr = "DELETE FROM emp_details WHERE emp_id= '".$id."'";

	$result = mysqli_query($con,$qr);

	if($con->query($result))
	{
		echo "Item deleted successfully!";
	}
	
	header('Location:emp_data.php');
?>