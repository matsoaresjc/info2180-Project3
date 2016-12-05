<?php

    include "CheapoMailDB.php";
    session_start();

    $user = $_SESSION["username"];
    $recipient = $_POST["recipient"];
    $subject = $_POST["subject"];
    $body = $_POST["msgBody"];
    
    if($subject == ""){
        echo "Enter a subject.";
    }
    if($body==""){
        echo "Enter message body.";
    }
    
    $user_id = mysql_query("SELECT id FROM user WHERE username = '$user'");
    $recipient_id = mysql_query("SELECT id FROM user WHERE username = '$recipient'");
    $sql = "INSERT INTO message (recipient_ids, user_id, subject, body, date_sent) VALUES('$recipient_id','$user_id','$subject', '$body', GETDATE())";
    if(!mysql_query($sql)){
        die('Unable to Send. Error:'.mysql_error());
    }else{
        echo "Message Sent.";
    }
?>