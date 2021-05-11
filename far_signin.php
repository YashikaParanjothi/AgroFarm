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

	$check_db_query = pg_query($con,"SELECT * FROM farmer WHERE username LIKE '$name' AND password LIKE '$password'");
	$check_signin_query = pg_num_rows($check_db_query);
	$row = pg_fetch_array($check_db_query);
	
	if($row)
	{
		header("Location:farmerpage.html");
	}
}
pg_close($con);

?>