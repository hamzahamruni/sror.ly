<?php
//
	@define("DB_SERVER" , "localhost:3306");
	@define("DB_USER" , "root");
	@define("DB_PASS" , "Q7Q9754RTZ:>z;k&LG(AU0j615Jv_9");
	@define("DB_NAME" , "sror");
	$connection = mysqli_connect(DB_SERVER, DB_USER, @DB_PASS, DB_NAME);
	$connection->set_charset("utf8");
	if (mysqli_connect_errno())
	{
		# code...
		die("Database connection Failed: " .
			mysqli_connect_error() .
			" (" . mysqli_connect_errno() . ")"
			);
	}
?>