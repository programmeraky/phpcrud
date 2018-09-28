<html>
	<head><title>Form Data</title></head>
	 <body>
		<?php 
		session_start();
			include("connection.php");
			
			if($con->connect_error)
			{
				die("Connection failed:". $con->connect_error);
			}
			else
			{
				echo "Database connected successfully!"."<br>";
			}
			if(isset($_POST['form_submitted']))
			{
				echo "Welcome ". $_POST['name']. "!<br>";
			}
			
			$name = $_POST['name'];
			$email = $_POST['email'];
			$gender = $_POST['gender'];
			$password = $_POST['password'];
		 
		
		 
//		 
//		 $extension = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
//		 $i_name = pathinfo($_FILES['image']['name'],PATHINFO_FILENAME);
//		
//		 $img = $i_name.uniqid().$extension;
//			
//		 $imgArr = explode(".",$img);
//		 
		 
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
		 	if(!empty($_FILES['image']['name'])){
    
				//call thumbnail creation function and store thumbnail name
				$upload_img = cwUpload('image','empImages/','',TRUE,'empImages/empThumb/','50','50');
    
				//full path of the thumbnail image
				$thumb_src = 'empImages/empThumb/'.$upload_img;
    
			}
		 	else
			{
    
				//if form is not submitted, below variable should be blank
				$thumb_src = '';
			}
//		 	$uploads_dir = "empImages/";
//		 	$uploads = "/empImages/empThumb/";
//		
//		 
//		 	if (move_uploaded_file($_FILES['image']['tmp_name'],$uploads_dir.$_FILES['image']['name']) ) 
//			{
//				echo '<pre>';
//				print_r($_FILES);
//				echo '</pre>';
//				
//    			echo "Uploaded";
//			}
//		 	else 
//			{
//   				echo "File was not uploaded";
//			}	
//		 echo 'test<pre>';
//				print_r($_FILES);
//				echo '</pre>';
//		  move_uploaded_file($_FILES['image']['tmp_name'],$uploads.$_FILES['image']['name']);
//		 
//		 
//		 	
////		 	$uploads = "__DIR__.'/../../empImages/empThumb/'";
////        	$name = basename($_FILES["image"]["name"]);
////        		//echo $uploads; 
////		 		//exit();
////        		move_uploaded_file($name, "$uploads_dir/$name");
////        		move_uploaded_file($name, "$uploads/$name");
////    			
		 
			$job_role_id = $_POST['job_role_id'];
			
			$c_date = date("Y/m/d");
			$update = date("Y/m/d h:i:s");
			
			/*echo "Name: ". $name;
			echo "Email: ". $email;
			echo "Password: ". $password;
			echo "Interests: ". $interest;*/
			$interests = $_POST['interest'];
		 		
		 	$query = "INSERT INTO emp_details(emp_id, emp_name, emp_email, emp_gender, emp_password, emp_image, emp_thumb_image, emp_job_role_id, emp_create_date, emp_update) VALUES('','".$name."','".$email."','".$gender."','".$password."','".$upload_img."','".$upload_img."','".$job_role_id."','".$c_date."','".$update."');";
			$qr = mysqli_query($con,$query);
		 	
		 	$emp_id = mysqli_insert_id($con);
		 	$c = date('Y-m-d h:i:s');
		    if(!empty($emp_id)){
				foreach($interests as $intrest)
				{
									
					$insert_emp_interest = mysqli_query($con,"INSERT INTO emp_interest(emp_interest_id, interest_id, emp_id, emp_interest_create_date, emp_interest_update) VALUES('','".$intrest."','".$emp_id."','".$c."','".$c."')");
					
					header('location: emp_data.php');
					
				}
	
			} 
		 mysqli_close($con);
	?>
	</body>
</html>