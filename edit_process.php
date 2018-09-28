<?php

include("connection.php");
if(isset($_POST['id']))
{
	$id = $_POST['id'];
	$name= $_POST['name'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$job_role_id = $_POST['job_role_id'];

				//$interest = implode(',', $checksub);	

	$update = date("Y/m/d h:i:s");
	
//	echo "<pre>";
//	$uploadedfile = $_FILES['image']['name'];
//	if($uploadedfile == null){echo "null!";}
//	echo "</pre>";
//	exit();
//	$uploadedfiletype = $_FILES['image']['type']; 	
	
	
	
		 function cwUpload($field_name = '', $target_folder = '', $file_name = '', $thumb = FALSE, $thumb_folder = '', $thumb_width = '', $thumb_height = '')
		 {
			  $image = explode(".",$_FILES['image']['name']);
		 
		 $uniqID = uniqid();
		 $i = $image[0].$uniqID.".".$image[1];

    //folder path setup
    			$target_path = $target_folder;
    			$thumb_path = $thumb_folder;
    
    //file name setup
    			$filename_err = explode(".",$_FILES[$field_name]['name']);
    			$filename_err_count = count($filename_err);
    			$file_ext = $filename_err[$filename_err_count-1];
    			if($file_name != '')
				{
        			$fileName = $file_name.'.'.$file_ext;
					
    			}
			 	else
				{
        			$fileName = $i;
				
    			}
    
    			//upload image path
    			$upload_image = $target_path.basename($fileName);
    
			 	//upload image
    			if(move_uploaded_file($_FILES[$field_name]['tmp_name'],$upload_image))
    			{
        			//thumbnail creation
						if($thumb == TRUE)
						{
							$thumbnail = $thumb_path.$fileName;
							list($width,$height) = getimagesize($upload_image);
							$thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
							switch($file_ext){
								case 'jpg':
									$source = imagecreatefromjpeg($upload_image);
									break;
								case 'jpeg':
									$source = imagecreatefromjpeg($upload_image);
									break;

								case 'png':
									$source = imagecreatefrompng($upload_image);
									break;
								case 'gif':
									$source = imagecreatefromgif($upload_image);
									break;
								default:
									$source = imagecreatefromjpeg($upload_image);
						}

					imagecopyresized($thumb_create,$source,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
							switch($file_ext){
								case 'jpg' || 'jpeg':
									imagejpeg($thumb_create,$thumbnail,100);
									break;
								case 'png':
									imagepng($thumb_create,$thumbnail,100);
									break;
								case 'gif':
									imagegif($thumb_create,$thumbnail,100);
									break;
								default:
									imagejpeg($thumb_create,$thumbnail,100);
								}

						}

						return $fileName;
					}
    	else
		{
			return false;
		}
	}
		 	if(!empty($_FILES['image']['name']))
			{
//				echo "<pre>";
//				print_r($_FILES);
//				echo "</pre>";
				$qry = mysqli_query($con,"SELECT emp_image,emp_thumb_image FROM emp_details WHERE emp_id = '".$id."'");
					$q = mysqli_fetch_array($qry);
				unlink("empImages/".$q['emp_image']);
				unlink("empImages/empThumb/".$q['emp_thumb_image']);
	
//				
				//call thumbnail creation function and store thumbnail name
				$upload_img = cwUpload('image','empImages/','',TRUE,'empImages/empThumb/','50','50');
    
				//full path of the thumbnail image
				//$thumb_src = 'empImages/empThumb/'.$upload_img;	
				$qr1 = mysqli_query($con,"UPDATE emp_details SET emp_image = '".$upload_img."', emp_thumb_image = '".$upload_img."' where emp_id = '".$id."'");
			}
	
		 	else
			{
				//if form is not submitted, below variable should be blank
				$thumb_src = '';
			}

	
	
}

//
//	$view = mysqli_query($con,"SELECT emp_image FROM emp_details WHERE emp_id = '".$id."'");
//	$res = mysqli_fetch_array($view);
//	return $res['emp_image'];
	
	$qr = "UPDATE emp_details SET emp_name = '".$name."', emp_email = '".$email."', emp_gender = '".$gender."', emp_job_role_id = '".$job_role_id."', emp_update= '".$update."' where emp_id = '".$id."' ";
	
	$qry = mysqli_query($con,$qr);
	//print_r($_POST['interest']);
	//exit();	
	if(!empty($_POST['interest']))
	{
//		$id = mysqli_fetch_array($qr);
		//$interest = implode (',',);
	
		$interests = $_POST['interest'];
		
		$q = "DELETE FROM emp_interest WHERE emp_id = '".$id."'";
		//exit();
		$emp_delete_qry = mysqli_query($con,$q);
		
		foreach($interests as $interest)
		{
			$query = mysqli_query($con, "INSERT into emp_interest(emp_interest_id,interest_id,emp_id,emp_interest_create_date,emp_interest_update) VALUES ('','".$interest."','".$id."','".$update."','".$update."')");
						
		}
		
				//print_r($r['emp_id']);
				//exit();
				if (!$query)
				{
					//
				}
				else
				{
					header('Location: emp_data.php');
				}

	}


?>