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
	$pid = $_POST['product_id'];
	$prod_nam = $_POST['prod_name'];
	$qt = $_POST['qty'];
	$pr = $_POST['price'];

	$query = "CALL insert_cart($pid,'$prod_nam',$qt,$pr)";
	$result = pg_query($con, $query);
	if($result)
	{
		echo "Product Added to Cart!";
		header("Location:sample.php");
	}
	else
	{
		echo "ERROR!\n";
	}
}
pg_close($con);

?>