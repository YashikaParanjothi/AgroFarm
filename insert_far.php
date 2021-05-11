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
	$name = $_POST['username'];
	$password = $_POST['password'];
	$phone = $_POST['phone_no'];
	$city = $_POST['city'];

	$query = "CALL insert_far($fid,'$name','$password',$phone,'$city')";
	$result = pg_query($con, $query);
	if($result)
	{
		header("Location:farmer.html");
	}
	else
	{
		echo "ERROR!\n";
	}
}
pg_close($con);

?>