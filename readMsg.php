
   <?php
	include "CheapoMailDB.php;
	
	session_start(); 
	
	$messageID = $_POST['id'];
	
	// Get session's timezone
	$timezone = date_default_timezone_get();
	date_default_timezone_set($timezone);
	// Get current date
	$date = date('Y-m-d H:i:s');
	$sql = "INSERT INTO Message_read (message_id, reader_id, date) VALUES ('$messageID','{$_SESSION['id']}', '$date')";
	$query = mysql_query($sql);
?>    