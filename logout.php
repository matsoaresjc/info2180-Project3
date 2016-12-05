<?php
	//Continuign the session
	session_start(); 
	//Remove al lsessio nvariables
	session_destroy(); 
	// Redirect to login page
	header("location: login.html"); 
?>