<?php include 'config.php';?>
<?php 


if(isset($_POST['done']))
{
if(!empty($_POST)) 
{
    if(!empty($_POST['userid'])&& !empty($_POST['password']))
	{
        
			//INSERT INTO `users`(`userid`, `name`, `password`, `email`, `mobile`, `address`, `usertype`)
          $userid = $_POST['userid'];
            $name = $_POST['name'];
			 $password = $_POST['password'];
			          $email = $_POST['email'];
           
			          $mobile = $_POST['mobile'];
            $address = $_POST['address'];
			$usertype="Customer";
			
			
			
			$q1="INSERT INTO `users`(`userid`, `name`, `password`, `email`, `mobile`, `address`, `usertype`) VALUES ('$userid', '$name', '$password', '$email', '$mobile', '$address', '$usertype')";
			$query = mysqli_query($con,$q1);
 
 
 echo 'User is registered successfully';
		
	}
	else
	{
		
		echo "Please enter user name and password";
		
	}
}
else{
	
	
	
	echo "Please fill the form first";
}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
   <link rel="stylesheet" href="styles.css">
    <title>Registration Form</title>
</head>
<body>
<h1> Online Wed Dress Shop Test Phase</h1>
<a href="index.php">Back</a>
<br>
				<br>
<div >

                <form method="POST" action="CustomerRegistration.php">
				
				<br>
				<br>
				Enter User ID: <input type="text" name="userid">
				<br>
				<br>
				
 Enter  User Name: <input type="text" name="name" >
<br>
				<br> 
				
	Enter  Password: <input type="password" name="password" >			
			<br>
				<br>
Enter  Email: <input type="text" name="email" >
<br>
				<br> 				
				Enter  Mobile Number: <input type="text" name="mobile" >
<br>
				<br> 
				Enter  address: <input type="text" name="address" >
<br>
				<br> 
                    <button type="submit" name="done" >Submit</button>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>