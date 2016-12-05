<?php

    // Access to CheapoMail database
    include "CheapoMailDB.php";
    
    session_start();
    
    //Retrieving data from form fields
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $uname = $_POST["username"];
    $pass = $_POST["password"];
    $pass2 = $_POST["password2"];
    
    //Ensure that the password has one number and one capital letter and is at least
    //8 characters long
    
    if ( !preg_match("^(?=.*[A-Za-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$^", $pass) )
        {
            echo "Invalid password. Ensure it is at least 8 characthers long and includes a number and cpital letter.";
        }
        
     //Ensure that the passwords match
     if ($pass1 != $pass2)
     {
         echo "Please ensure that both passwords match.";
     }
     
     //Hash the password
     $encrypted = md5($password);
     
     
     // THIS IS TO BE DONE CLIENT-SIDE NOT SERVER SIDE!!!!
     //Ensure the first name field is not empty
     	
	    if(empty($fname))
	    {
			echo "First name required";
		}
		
	//Ensure the last name field is not empty
     	
	    if(empty($lname))
	    {
			echo "Last name required";
		}	
		
	//Ensure the username field is not empty
     	
	    if(empty($uname))
	    {
			echo "Username required";
		}	
		
		
	//Insert the new user into the database
	$sql = "INSERT INTO User(firstname, lastname, username, password) VALUES ('$fnname','$lname','$encrypted','$uname')";
	$query = mysql_query($sql);
	
	// Check for errors in adding
	if (!$query)
	{
	    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    }
    else
    {
        echo "New user ('".$uname."') successfully added";
    }
	    

	    
	    
	
?>
        
        
        