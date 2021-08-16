<?php include '../config.php';?>
<?php 

///echo"<tr><td>".$row['cartID']."</td><td>".$row['customerID']."</td><td>".$row['dressid']."</td><td>".$row['unitPrice']."</td><td>".$row['Quantity']."</td><td>".$row['TotalPrice']."</td></tr>";
	//$ qry="INSERT INTO `orders`(`cusId`, `dressid`, `price`, `quantity`, `date`, `status`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')";
	//INSERT INTO `orders`(`cusId`, `dressid`, `price`, `quantity`, `date`, `status`, `id`, `total`, `orderid`) VALUES (
	$customerID="";
$amount=0;
$customerID=$_SESSION["userid"] ;
echo "<h3> Welcome : ".$customerID."</h3>";
	
	//$customerID=$_SESSION["userid"] ;
/*	
	function saveOrder($cusId, $dressid, $price, $quantity, $status, $total, $orderid) 
{
	$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'kleemtestdb');
	                                                //`cusId`, `dressid`, `price`, `quantity`, `date`, `status`, `total`, `orderid`
 $q1="INSERT INTO `orders`(`cusId`, `dressid`, `price`, `quantity`, `date`, `status`, `total`, `orderid`) VALUES ('$cusId', '$dressid', '$price','$quantity', NOW(), '$status', '$total','$orderid')";
			 $query = mysqli_query($con,$q1);	
				echo 'Thank you for order!';
}
*/

	
function getData($customerID) 
{
 // echo "$fname Refsnes.<br>";
 $con = mysqli_connect('localhost','root');
mysqli_select_db($con,'kleemtestdb');

$result = $con->query("SELECT * FROM `cart` WHERE customerID='$customerID'"); 
 if($result->num_rows > 0)
 { 
$orderid=rand(111,999);
 while($row = $result->fetch_assoc())
 {
	 //`cartID`, `customerID`, `dressid`, `unitPrice`, `Quantity`, `TotalPrice`
	 
	echo $row['cartID']."-".$row['customerID']."-".$row['dressid']."-".$row['unitPrice']."-".$row['Quantity']."-".$row['TotalPrice']."<br>";
	
	$cusId=$row['customerID'];
	
	$dressid=$row['dressid'];
	$price=$row['unitPrice'];
	$quantity=$row['Quantity'];
	$status="paid";
	$total=$row['TotalPrice'];
	
	
$q1="INSERT INTO `orders`(`cusId`, `dressid`, `price`, `quantity`, `date`, `status`, `total`, `orderid`) VALUES ('$cusId', '$dressid', '$price','$quantity', NOW(), '$status', '$total','$orderid')";
			 $query = mysqli_query($con,$q1);	

	
 }
 }
 else
 {
	 
	 
	  echo "No orders are found!";
 }
}






$result = mysqli_query($con, 'SELECT SUM(`unitPrice`) AS value_sum FROM cart'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
$amount=$sum ;
//echo "<br> <h2>Total Amount : ".$sum."</h2>";

if(isset($_POST['done']))
{
if(!empty($_POST)) 
{
	try 
	{ 
       
			
          $cusID = $customerID;
           
			 $status = "paid";
			 $bankname= $_POST['bankname'];
			          $accountNumber= $_POST['accountNumber'];
					  
		$method="";			  
				
	 if(isset($_POST['methods']))
{
	$method=$_POST['methods'];
}
else{
	
	
	echo "please select payment method first";
}
	
	
			$query="";
			
			if($method =="cod")
			{
				echo "cod";
			echo $q1="INSERT INTO `payments`( `cusID`, `method`, `amount`,`date`, `status`) VALUES ('$cusID', '$method`, '$amount',NOW(), '$status')";
			echo " result".$query = mysqli_query($con,$q1);	
			getData($customerID) ;
				echo 'Thank you for payment!';
			}
			else if ($method =="online")
			{
				echo " <br> Online Bankig <br>";
				 $q1="INSERT INTO `payments`( `cusID`, `method`, `amount`,`date`, `status`,`accountNumber`,`bankName`) VALUES ('$cusID', '$method', '$amount',NOW(), '$status','$accountNumber','$bankname')";
			" result". $query = mysqli_query($con,$q1);	
			getData($customerID) ;
				echo 'Thank you for payment!';
				
			}
	}
	
	
 catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
 
		
	}
	

else
{
	
	
	
	echo "Please fill the form first";
}
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
   <link rel="stylesheet" href="styles.css">
    <title></title>
</head>
<body>
<h1> Online Wed Dress Shop Test Phase|Customer Payments</h1>
<a href="index.php">Back</a>
<br>
				<br>
<div >

                <form method="POST" action="CustomerPayments.php">
				
				  
				<table>
				
				<input type="radio" name="methods"
<?php if (isset($methods) && $methods=="cod") echo "checked";?>
 value="cod">Cash on Delivery<br>
  <input type="radio" name="methods"
  <?php if (isset($methods) && $methods=="online") echo "checked";?> value="online">Online Banking<br>
  <br>
				
				
				
				
				
				
				
				
				
				<tr><td> Enter cusID:</td><td> <?php  echo $customerID; //$amount?></td></tr>
				
		<tr><td> Enter  Bank Name(for online banking):</td><td> <input type="text" name="bankname"></td></tr>		
				
				 <tr><td> Enter  Account Number (for online banking):</td><td> <input type="text" name="accountNumber"></td></tr>
				
				
				
				
				<tr><td> Enter  payment amount:</td><td> <?php  echo $amount;?></td></tr>
				
				<tr><td> </td><td> <button type="submit" name="done" >Submit</button></td></tr>			


                    
					</table>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>