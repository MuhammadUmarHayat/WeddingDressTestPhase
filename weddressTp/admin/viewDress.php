<?php include '../config.php'; 
 //`dresstype`, `category`, `price`
// Get image data from database 
$result = $con->query("SELECT * FROM dress"); 


?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery">
<h1> All Technicians!</h1>
<a href="index.php">Home</a>|<a href="Logout.php">Logout</a>	
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
	 
	   
	   <?php

//echo '<a href="tech.php?id=' . $row['shopid'] . '">Show Technicians</a>';

	   } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>