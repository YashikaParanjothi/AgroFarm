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
	$name = $_POST['username'];
	$password = $_POST['password'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$phone = $_POST['phone_no'];

	$query = "CALL insert_cus('$name','$password','$city','$email',$phone)";
	$result = pg_query($con, $query);
	header("Location:customer.html");
}
pg_close($con);

?>