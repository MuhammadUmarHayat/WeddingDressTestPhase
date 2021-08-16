<?php include 'config.php';?>
<?php
//session_start();
 $userid = "";
$password = "";
if(isset($_POST['done']))
{
if(!empty($_POST)) 
{
    if(!empty($_POST['userid']))
	{
        if(!empty($_POST['password']))
	    {
			//"userType"
            $userid = $_POST['userid'];
            $password = $_POST['password'];
   
   
   
				
         $qry = "Select * from users where  userid= '$userid' and password='$password'";

            $results = mysqli_query($con, $qry);
            if ($results->num_rows> 0) //username and password is corract
			{
				$usertype="";
				$row = $results->fetch_assoc();//getting the single row only
				
					$usertype=$row['usertype'];//fetching the usertype
				
					$_SESSION['userid'] = $userid;//session
					if($usertype=="Admin")
					{
					session_start();
					header('Location:http://localhost/weddressTP/admin/index.php');
					}
					else if($usertype=="Customer")
					{
						session_start();
					header('Location:http://localhost/weddressTP/customer/index.php');
					}
					
            }
   
   			
			else 
			{
                echo "Invalid username or password.";
            }
   
        }
		else 
		{
           echo "Password field is empty.";
        }
    } 
	else 
	{
        echo "username field is empty";
    }
	
	
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
<link rel="stylesheet" href="styles.css">
    <title>Login Form</title>
</head>
<body>
<h1> Online Wed dress shop Test Phase</h1>
<a href="AdminRegistrationForm.php"> Register Now as Admin !</a>
<a href="CustomerRegistration.php"> Register Now as Customer!</a>
<br>
<br>

<div >

                <form method="POST" action="index.php">
				Enter User Name:<input type="text" name="userid"  id="username">
				<br>
				<br>
 Enter User password:<input type="password" name="password"  id="password">   
<br>
<br> 
<br>
<br>
                    <button type="submit" name="done">Submit</button>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>