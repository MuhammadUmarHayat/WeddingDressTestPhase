<?php include '../config.php';?>
<?php


$category = "";
 $totalRows="";//total rows from table
 $result ="";

  $sql ="SELECT * FROM category";
$result = $con->query($sql);

 $totalRows=$result->num_rows;
           

 

if(isset($_POST['done']))
{
if(!empty($_POST)) 
{
    if(!empty($_POST['category']))
	{
//insert data into table
			
            $category = $_POST['category'];
           
   $query="INSERT INTO `category`(`category`) VALUES ('$category')";
   
   $query1 = mysqli_query($con,$query);
 
 
 echo 'User is registered successfully';
 
 /////////////////////////////////////////get data///////////////////////////////
		
		$sql ="SELECT * FROM category";
$result = $con->query($sql);

 $totalRows=$result->num_rows;		
         
   
        
    } 
	else 
	{
        echo "field should not empty <br>";
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
<h1> Category Management </h1>
<a href="index.php"> Admin Pannel !</a>

<br>
<br>

<div >

                <form method="POST" action="categoryManagement.php">
				Enter category name:<input type="text" name="category">
				<br>
				<br>
 
<br>
<br>
                    <button type="submit" name="done">Submit</button>
					
					<br>
					<table>
					<tr><th> #</th><th>Category </th></tr>
					<?php 
					
					 if ($totalRows> 0) 
			{
				$usertype="";
				while($row = $result->fetch_assoc())
				{
					echo "<tr><td>".$row['id']."</td>";
					echo "<td>".$row['category']."</td></tr>";
					
				}
				
					
					
            }
   
   			
			else 
			{
                echo "No data is found";
            }
					
					
					?>
					
					</table>
					
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>