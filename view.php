<?php
	include "CheapoMailDB.php";
	session_start(); // Start Session
	$id = $_GET["id"];
    $sql = "SELECT * FROM Message WHERE id = '$id'";
    $query = mysql_query($sql);
    if ($query === false) {
        echo "Could not successfully run query ($sql) from DB: " . mysql_error();
        exit;
    }
        
    if (mysql_num_rows($query) > 0) { 
            while($row = mysql_fetch_array($query))
            {
            	
				echo "<h1 class='h1'>Message</h1>";
                // Print message format
                 echo "<h3 class='h3'><span class='font-normal'>Subject: </span> $row[subject]</h3>"; // message subject
                    // Find the matching usernme having found the user id 
                    $mysql = "SELECT username FROM User WHERE id = '{$row['userid']}'";
                    $querry = mysql_query($mysql);
                    if ($querry === false) {
                        echo "Could not successfully run query ($sql) from DB: " . mysql_error();
                        exit;
                     }
                    else if (mysql_num_rows($querry) > 0) {
                    	$data = mysql_fetch_array($querry);
                        // print corresponding username
						echo "<h5 class='h5'><span class='font-normal'>From: </span> $data[username]</h5>"; // Sender                    
                    }
                    else { echo "User not found";}
                
               
				// Message body
			
				echo "<p>$row[body]</p>";
			
            }
    }	
			
?>

       