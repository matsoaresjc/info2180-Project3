<? php 

    include "CheapoMailDB.php";
    
    session_start(); // Start session to get logged in user details
    
?>

<!--HOMEPAGE HTML-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Cheapomail Home</title>
	<link rel="stylesheet" type="text/css" href="css/p1a.css"/>
	<script type="text/javascript" src="js/validation.js"></script>
	<script>
	    $(document).ready(function()
	    {
	        // Get id of logged in user from hidden field
	        var userid = document.getElementById("userid").value;
	        
	        // Load Inbox every x 
	        setInterval(function()
	                   {
	                       $("#inbox").load("inbox.php?id="+userid);
	                       
	                   }, 2000); 
	    });
	</script>
</head>

<body>
	<div>
		<h1>Cheapomail</h1>
		<!--Hidden Session Data-->
		<input type="hidden" id="username" value="<?=$_SESSION['username'];?>"></input>
        <input type="hidden" id="userid" value="<?=$_SESSION['id'];?>"></input>
        
		<h2>messages</h2>
		<button type="button"><a class="btn" href="composeMsg.html">Compose</a></button>
		<!--Should only be visible to Admin-->
		<button type="button" style="visibility:
		                            <?php if (isset($_SESSION["username"]))
		                                  {
		                                        if($_SESSION["username"] != "Admin")
		                                        {
		                                            echo "hidden";
		                                        }
		                                  }
		                            ?>
		                            "><a class="btn" href="AddUser.html">Add User</a></button>
		
		<button type="button"><a class="btn" href="logout.php">Logout</a></button>
	</div>	
	
	<div id="inbox">
		
		<table>
		<tr class="header-row">
			<th class="left width">Sender</th>
			<th class="left">Subject</th>
		</tr>
		<tr class="item-row width">
			<td class="width name">"Name"</td>
			<td class="subject">"Subject"</td>
		</tr>
		<tr class="item-row">
			<td class="name">"Name"</td>
			<td class="subject">"Subject"</td>
		</tr>
		<tr class="item-row">
			<td class="name">"Name"</td>
			<td class="subject">"Subject"</td>		
		</tr>
		<tr class="item-row">
			<td class="name">"Name"</td>
			<td class="subject">"Subject"</td>
		</tr>
		<tr class="item-row">
			<td class="name">"Name"</td>
			<td class="subject">"Subject"</td>
		</tr>
		<tr class="item-row">
			<td class="name">"Name"</td>
			<td class="subject">"Subject"</td>
		</tr>
		<tr class="item-row">
			<td class="name">"Name"</td>
			<td class="subject">"Subject"</td>
		</tr>
		<tr class="item-row">
			<td class="name">"Name"</td>
			<td class="subject">"Subject"</td>
		</tr>
		<tr class="item-row">
			<td class="name">"Name"</td>
			<td class="subject">"Subject"</td>
		</tr>
		<tr class="item-row">
			<td class="name">"Name"</td>
			<td class="subject">"Subject"</td>
		</tr>
	</table>
	<div id = msgView> </div>
	</div>
	</body>
</body>
</html>

       