 <?php include '../config.php'; 
 
 echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
 echo "The time is " . date("h-i-sa");
 
 
 
 
 
 //////////////////////////////////////////////////////////
 
 $cusId = $_POST['userid'];
            $dressid = $_POST['dressid'];
			 $price = $_POST['price'];
			          $quantity = $_POST['quantity'];
           
			          $mobile = $_POST['mobile'];
            $address = $_POST['address'];
			$status="confirmed";
 
 
 
 $q1="INSERT INTO `orders`( `cusId`, `dressid`, `price`, `quantity`, `date`, `status`) VALUES ('$cusId', '$dressid', '$price', '$quantity', Date(), '$status')";
			$query = mysqli_query($con,$q1);
 
 
 echo 'Thank you';
 ?>
 
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
<link rel="stylesheet" href="styles.css">
    <title> Cart </title>
</head>
<body>
<h1> Shoping Cart</h1>
<br>
<br>

<div >

                <form method="POST" action="cart.php">
				<br>
<br> 
<br>
<?php 
 session_start();
 $customerID=$_SESSION["userid"] ;
echo "Thank you : ".$customerID;

$_SESSION["dressid"]+=$_GET['id'];
 $_SESSION["qty"]+=$_GET['qty'];
 
 $q+=$_GET['qty'];
 $amount=$q;
 
echo "<br> Dress Number " . $_GET['id'] . " at " . $_GET['qty'];
echo "Grand Total".$amount;

echo "<br><a href='index.php'>  Continue-Shopping</a>";
 
 
 ?>
<br>
                    <button type="submit" name="done">check out</button>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>