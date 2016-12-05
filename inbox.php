 <?php
    include "CheapoMailDB.php";
    
    session_start();
    
    //Showing the 10 most recent messages
    $row = null;
    $count = 0; 
    
    //Using the unique id
    $userid = $_GET["id"];
    
    $sql = "SELECT * FROM Message ORDER BY id DESC LIMIT 11"; // Sort by descending order to pull most recently added rows
    $query = mysql_query($sql);
    
     if ($query === false) {
        echo "Could not successfully run query ($sql) from DB: " . mysql_error();
        exit;
    }
    
    // REGENERATE INBOX WITH DATA
    
    //Print inbox part of  homepage (HEADINGS)
    echo "<table>
		<tr class='header-row'>
			<th class='left width'>Sender</th>
			<th class='left'>Subject</th>
		</tr>";
		
	// Loop printing each row of inbox
    while($row = mysql_fetch_array($query))
            {
                // ID of sender with ; as the delimiter
                $recipients = explode(";",$row["recipient_ids"]);
                foreach ($recipients as $recipient)
                {
                    if ($recipient == $userid)
                    {
                        // Display that message details
                        $count++;
                         ?><tr class="item1-row width  
                            <?php //Determine if message has been read or not
                                 $esqli = "SELECT date FROM message_read WHERE message_id = '$row[id]'";
                                 $results = mysql_query($esqli);
                                 if ($results === false) 
                                 {
                                    echo "Could not successfully run query ($esqli) from DB: " . mysql_error();
                                    exit;
                                 }
                                else if (!mysql_num_rows($results) > 0) 
                                {
                                        // Record not found therefore message has been read before
                                        $unread = true;
                                        echo "unread"; // Class
                                }
                            ?>" id="msg$count"> 
                            <?php
                            
                             echo "<td style= 'display: none' id= 'idMsg$count'>$row[id]</td>"; // Message id

                                // Get corresponding username
                                $mysql = "SELECT username FROM User WHERE id = '{$row['user_id']}'";
                                $querry = mysql_query($mysql);
                                if ($querry === false) 
                                {
                                    echo "Could not successfully run query ($mysql) from DB: " . mysql_error();
                                    exit;
                                }
                                else if (mysql_num_rows($querry) > 0) 
                                {
                                    $data = mysql_fetch_array($querry);
                                    // print Sender's name - ADDD FUNCTION TO READ MESSAGES ONCLICK
                                    echo "<td class='width' id= 'sender$count'><a href='#' onclick='readMsg($count);'>$data[username]</a></td>";
                                }
                            
                            // print subject of mail  - ADDD FUNCTION TO READ MESSAGE ONCLICK
                            echo "<td id= 'subject$count'><a href='#' onclick='readMsg($count);'>$row[subject]</a></td>";
                            
                            // End of message row
                            echo "</tr>";
                    }
                }
            
                 // End of inbox table
                echo "</table>";
            }
            else
            {
                // empty inbox
                echo "Inbox empty.";
            }
                    
                    
?>
                        
        
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                