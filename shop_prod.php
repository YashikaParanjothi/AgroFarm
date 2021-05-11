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
	if($result)
	{
		if(pg_num_rows($result) > 0)
		{
			echo "<table>";
				echo "<tr>";
					echo "<th>product_id</th>";
					echo "<th>prod_name</th>";
					echo "<th>price (per kg)</th>";
				echo "</tr>";

				while($row = pg_fetch_array($result))
				{
					echo "<tr>";
						echo "<td>" . $row['product_id'] . "</td>";
						echo "<td>" . $row['prod_name'] . "</td>";
						echo "<td>" . $row['price'] . "</td>";
					echo "</tr>";
				}
			echo "</table>";
			pg_free_result($result);
		}
		else
		{
			echo "No records found!";	
		}
	}
	else
	{
		echo "Error!";
	}
}
pg_close($con);

?>
