<?php
	
	// (host, user, pass, db)
	$conn = mysqli_connect("localhost", "user_ipss_evaluacion2", "IPSS2025$", "ciisa_backend_v1_eva2_A");
	
	// error 
	if (!$conn) {
		die("La connection no fue establecida: " .mysqli_connect_error());
	}

?>