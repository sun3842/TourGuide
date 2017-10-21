<?php
session_start();
$target_dir = "url/";
//$target_files = $target_dir.$_FILES["pphotos"]["name"];
$size=sizeof($_FILES["pphotos"]["name"]);
echo $size;
function insert($sql){
			$conn = mysqli_connect("localhost", "root", "","project");
			
			mysqli_query($conn, $sql)or die(mysqli_error($conn));
		}
if(isset($_FILES["pphotos"]["name"])){
			for($i=0;$i<$size;$i++){
				$tergetdir="url/".$_FILES["pphotos"]["name"][$i];
				if(move_uploaded_file($_FILES["pphotos"]["tmp_name"][$i],$tergetdir)){
					$qury='INSERT INTO `photo_table`(`Place_Id`, `Url`) VALUES ("'.$_POST["pid"].'","'.$tergetdir.'")';
					insert($qury);
				}
					
			}
		}
$target_file = $target_dir.$_FILES["fileToUpload"]["name"];	
if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
					
			define('DB_HOST', 'localhost');
			define('DB_NAME', 'project');
			define('DB_USER','root');
			define('DB_PASSWORD','');
			$conn = mysqli_connect("localhost", "root", "","project");
				//echo "YOUR REGISTRATION IS COMPLETEDmmmmmmmmmmm...";
				$pid  = $_POST['pid'];
				$pname  = $_POST['pname'];
				$ptype = $_POST['ptype'];
				$prating=$_POST['prating'];
				$pdetails= $_POST['pdetails'];
				$photo = $target_file;
				$query = "INSERT INTO place_table (Place_Id,Place_Name,Type,Rating,Details,Photo) VALUES ('$pid','$pname','$ptype','$prating','$pdetails','$photo')";
				$data = mysqli_query ($conn,$query)or die(mysqli_error($conn));
				
				
			}
?>