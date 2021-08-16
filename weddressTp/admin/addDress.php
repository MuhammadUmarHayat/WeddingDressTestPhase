<?php include '../config.php';
 
// If file upload form is submitted 

$status = $statusMsg = ''; 
if(isset($_POST["submit"]))
{ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) 
	{ 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         //INSERT INTO `dress`( `image`, `uploaded`, `dresstype`, `category`, `price`)
		$dresstype= $_POST['dresstype'];
		$category= $_POST['category'];
		 $price=$_POST['price'];
		 
		 
            
            $insert = $con->query("INSERT INTO `dress`( `image`, `uploaded`, `dresstype`, `category`, `price`) VALUES ('$imgContent', NOW(),'$dresstype','$category','$price')"); 
             if($insert){ 
                $status = 'success'; 
                $statusMsg = "Dress is added successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>


<form action="addDress.php" method="post" enctype="multipart/form-data">

<br><br>
Enter dress type: <input type="text" name="dresstype">
<br><br>
Enter category: <input type="text" name="category">
<br><br>
Enter price: <input type="text" name="price">
<br><br>
    <label>Select Image File:</label>
    <input type="file" name="image">
	<br><br>
	
	
    <input type="submit" name="submit" value="Add Dress">
</form>