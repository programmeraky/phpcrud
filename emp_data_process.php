<?php 
include("connection.php");

if(isset($_POST['delete']))
{
    $empIDs =  $_POST['check'];
	
	for($i=0;$i<count($empIDs);$i++)
	{
		$del_id = $empIDs[$i];
		$q = mysqli_query($con,"SELECT * FROM emp_details where emp_id = '".$del_id."'");
		while ($res = mysqli_fetch_array($q))
		{
			unlink("empImages/".$res['emp_image']);
		unlink("empImages/empThumb/".$res['emp_thumb_image']);
		
		}
		
		$sql = "DELETE FROM emp_details WHERE emp_id='$del_id'";
		$result = mysqli_query($con, $sql);
		
	}

	if($result)
	{
		header("Location: emp_data.php");
	}
}
/*
 $ = implode(",", $_POST['check']);

if(!empty($empIDs)){
	
	echo $qry = "DELETE FROM emp_details WHERE emp_id IN ('".$empIDs."')";exit;
	$result = mysqli_query($con,$qry);
	
}*/


?>