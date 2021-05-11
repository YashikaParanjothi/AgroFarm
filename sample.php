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
	$query = "SELECT product_id,prod_name,price FROM products";
	$result = pg_query($con, $query);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>CUSTOMER PAGE</title>
	<link rel="stylesheet" type="text/css" href="css/customerpage.css">
</head>
<body>
	<h1>Shop With Us!</h1>
	<h2>Enter the name of the product which you would like to buy from the list available!</h2>
	<section>
		<table>
			<tr>
				<th>Product Id</th>
				<th>Product Name</th>
				<th>Price (per kg)</th>
			</tr>
			<?php
				while($row = pg_fetch_array($result))
				{
			?>
			<tr>
				<td><?php echo $row['product_id'];?></td>
				<td><?php echo $row['prod_name'];?></td>
				<td><?php echo $row['price'];?></td>
			</tr>
			<?php		
				}
			?>
		</table>
	</section>

	<form class="box" action="insert_cart.php" method="post">
		<input type="number" name="product_id" placeholder="Product Id" required>
		<input type="text" name="prod_name" placeholder="Product Name" required>
		<input type="number" min="0" step="any" name="qty" placeholder="Quantity (in kgs)" required>
		<input type="number" min="0" step="any" name="price" placeholder="Enter the Price (per kg)" required>
		<input type="submit" value="ADD TO CART">
		<a href="pay.php" class="btn">Shopping Done</a>
	</form>

</body>
</html>