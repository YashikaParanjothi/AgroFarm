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
	$fid = $_POST['farmer_id'];
	$pid = $_POST['product_id'];
	$pname = $_POST['prod_name'];
	$pqt = $_POST['qty'];
	$ppr = $_POST['price'];

	$query = "CALL insert_prod($fid,$pid,'$pname',$pqt,$ppr)";
	$result = pg_query($con, $query);
	if($result)
	{
		echo "Product Added!";
		header("Location:farmerpage.html");
	}
	else
	{
		echo "ERROR!\n";
	}
}
pg_close($con);

?>