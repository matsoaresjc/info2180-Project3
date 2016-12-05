<?php

	// Access to database
	include "CheapoMailDB.php";
	
	// Retrieve data from login fields
	
    $uname = $_POST["username"];
    $pass = $_POST["password"]; 
    
           
	if (empty($uname) || empty($pass))  // Ensure the fields are not empty // SHOULD BE DONE CLIENT SIDE!!!
	{
       	echo "Please enter a username and password";
    } else 
    {
    	// Search database for entered username and password
       	$sql = "SELECT * FROM  User WHERE username = '$uname' AND password = '$pass'";
       	$query = mysql_query($sql);
       	
       	// Check if query was executed
       	if ($query === false) {
            echo "Could not successfully run query ($sql) from DB: " . mysql_error();
            exit;
        }
       	
       	// Check If any results were found
       	if (mysql_num_rows($query) > 0) 
       	{ 
         	
         	// Get row of data; save in assoc array
            $data = mysql_fetch_assoc($query);

         	// Assign session variables for logged in user
         	$_SESSION["id"] = $data['id'];
         	$_SESSION["username"] = $username;
            	
            // Link to homepage
         	$homepage = "homescreen.php";
            
            // Redirect to homescreen
            header("Location: ".$homepage."'");
            exit;
        }
        else
        {
        	// Display error message
        	echo "Username or Password incorrect";	
        }
    }

        

       