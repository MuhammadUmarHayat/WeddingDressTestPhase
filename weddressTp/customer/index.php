<?php include '../config.php'; 

//session_start();

$customerID=$_SESSION["userid"] ;
echo "<h1> Welcome : ".$customerID."</h1>";

$_SESSION["cartid"]="";
	$cartID="";
 if(isset($_POST['checkout']))
{
	header('Location:http://localhost/weddressTP/customer/checkout.php');
}
if(isset($_POST['done']))
{
if(!empty($_POST)) 
{
    if(!empty($_POST['dressid']))
	{
	$dressid=	$_POST['dressid'];
	
	$qty=	$_POST['qty'];
	
	$unitPrice=0;
	
	$resultPrice = $con->query("SELECT * FROM dress where dressid= '$dressid'"); 
 if($resultPrice->num_rows > 0)
 {
	$row = $resultPrice->fetch_assoc();
	$unitPrice=$row['price'];
		
	 
 }
	
	$TotalPrice=$unitPrice*$qty;
	
	if($_SESSION["cartid"]=="")
	{
		
		$cartID=$customerID.date("h-i-sa");
		$_SESSION["cartid"]=$cartID;
	}
	else
	{
		
		$cartID=$_SESSION["cartid"];
		
	}
	echo "<br>< <h3> Customer Name :".$customerID ."</h3> Cart ID :".$cartID." Dress id :".$dressid."Unit Price : ".$unitPrice." Quantity : ".$qty." Total : ".$TotalPrice;	
	//ok	
	 $q12="INSERT INTO `cart`(`cartID`, `customerID`, `dressid`, `unitPrice`, `Quantity`, `TotalPrice`) VALUES ('$cartID', '$customerID', '$dressid', '$unitPrice', '$qty', '$TotalPrice')";
	$query12 = mysqli_query($con,$q12);
	
	echo "<br> item is added to cart";
	}
	else{
		echo "Not dress is selected";
	}
	
	
	////////sum function
	//$stmt = $con->query("SELECT SUM(unitPrice) As Total FROM cart"); 
$result = mysqli_query($con, 'SELECT SUM(`unitPrice`) AS value_sum FROM cart'); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];
echo "<br> <h2>Total Amount : ".$sum."</h2>";
	
}
}










// Get image data from database 
$result = $con->query("SELECT * FROM dress"); 
 if($result->num_rows > 0){ 
 ?> 
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
<link rel="stylesheet" href="styles.css">
    <title>Customer Pannel</title>
</head>
<body>
<h1> Online Wed dress shop Test Phase</h1>
<a href="index.php">  Customer Pannel!</a>

<a href="displayOrder.php"> view orders!</a>
<a href="../logout.php"> Logout!</a>
<br>
<br>
<hr>
<div class="gallery">
<h1> Our Dress Collections!</h1>
	<form method="POST" action="index.php">
        <?php while($row = $result->fetch_assoc()){ ?> 
		<br>
		Dress ID:<?php echo $row['dressid']?>
		<br>
				Category:<?php echo $row['category']?>
				<br>
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" width=100px height=100px /> 
      <br>
	  Dress type:<?php echo $row['dresstype']?>
	   <br>
	  Price:<?php echo $row['price']?>
	   <br>
	 
	   Quantity:
	   <select name ="qty" id="qty">  
  <option value="Select" >--Select--</option> 
  <option value="1">1</option>  
  <option value="2">2</option>  
  <option value="3">3</option>  
  <option value="4">4</option>  
  <option value="5">5</option>  
  <option value="6">6</option>  
  <option value="7">7</option>  
  <option value="8">8</option>  
  <option value="9">9</option>  
  <option value="10">10</option>
</select>
<input type="hidden" id="dressid" name="dressid" value="<?php echo $row['dressid']?>">
<button type="submit" name="done" >Add to Cart </button> 
<button type="submit" name="checkout"> check out </button> 
<?php 


//echo '<br><a href="cart.php?id=' . $row['dressid'].'&qty='.$_GET['qty'].'">Add to Cart Now !</a>';
//echo '<br><a href="cart.php?id=' . $row['dressid'].'&qty=3">Add to Cart Now !</a>';
	
$con->close();	} 
	 }else
	 { 
    echo "<br>Record not found <br>";
 }  
                    
?>					
</div> 
 </form>
</body>
</html>