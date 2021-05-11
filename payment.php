<?php
$host = "localhost";
$user = "postgres";
$pass = "vishu@pv";
$db = "package";
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Could not connect to Server\n");

if(!$con){
	echo "Error : Unable to open database\n";
} 

else{
	$query = "SELECT * FROM cart";
	$result = pg_query($con, $query);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>PAYMENT</title>
	<link rel="stylesheet" type="text/css" href="css/paym.css">
</head>
<body>
	<h1>Your Cart!</h1>
	<table>
		<tr>
			<th>Product Id</th>
			<th>Product Name</th>
			<th>Quantity (in kg)</th>
			<th>Price (per kg)</th>
			<th>Amount (in ₹)</th>
		</tr>
		<?php
			while($row = pg_fetch_array($result))
			{
		?>
		<tr>
			<td><?php echo $row['product_id'];?></td>
			<td><?php echo $row['prod_name'];?></td>
			<td><?php echo $row['qty'];?></td>
			<td><?php echo $row['price'];?></td>
			<td><?php echo $row['amt'];?></td>
		</tr>
		<?php		
				}
		?>
	</table>

	<div class="pay" style="margin-bottom: 40px;">
	<h2 style="color: white;text-align: center;margin-left: 30px;">Total Amount to be paid : <?php
					$que = "SELECT SUM(amt) as total FROM cart";
					$res = pg_query($con,$que);
					while($row = pg_fetch_array($res))
					{
						echo $row['total'];
					}
				?></h2>
	</div>

	<?php
		$quer = "CALL del_cart()";
		$rest = pg_query($con,$quer);
	?>

	<div style="margin-bottom 10px; text-align: center;">
			<a href="thanku.html" style="text-decoration: none;color: white;border: 2px solid #fff;padding: 5px 5px;">CHECK OUT</a>
		</div>
</body>
</html>
