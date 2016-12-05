
function submission(){
	var fn = document.getElementById('firstname').value;
	var ln = document.getElementById('lastname').value;
	var un = document.getElementById('username').value;
	var pw = document.getElementById('password').value;
	var pc = document.getElementById('password2').value;
	var reg1 =/^(?=.*[A-Zaz])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
	var password1 = reg1.test(document.getElementById("password").value);
	console.log(password1);

	if(fn==""){
		document.getElementById("firstname").className = "wrong";
		return false;
	}
	else{
		document.getElementById("firstname").className = "valid";
	}
	
	if(ln==""){
		document.getElementById("lastname").className = "wrong";
		return false;
	}
	else{
		document.getElementById("lastname").className = "valid";
	}

	if(un==""){
		document.getElementById("username").className = "wrong";
		return false;
	}
	else{
		document.getElementById("username").className = "valid";
	}

	if(password1){
		document.getElementById("password").className = "valid";
	}
	else{
		document.getElementById("password").className = "wrong";
		return false;
	}
	
	if(pw==pc){
		document.getElementById("password").className = "valid";
	}
	else{
		document.getElementById("password").className = "wrong";
		return false;
	}
}


function compose()
{
	// Get data entered into form
	var recipient = document.getElementById("recipient").value;
	var subject = document.getElementById("subject").value;
	var body = document.getElementById("msgBody").value;

	// Returns successful data submission message when the entered information is stored in database.
	var data = 'recipients=' + recipient + '&subject=' + subject + '&body=' + body;

	// Validation 
	if (recipient == '' || subject == '' || body == '') {
		alert("Please Fill All Fields");
	} else {

		// AJAX code to submit form using Jquery
		$.ajax({
			type: "POST",
			url: "composeMsg.php",
			data: data,
			cache: false,
			success: function(html) {
						alert(html);
					}
		});
	}
	return false;
}


function loginVal(){
	var un = document.getElementById('username').value;
	var pw = document.getElementById('password').value;
	var reg1 =/^(?=.*[A-Zaz])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
	var password1 = reg1.test(document.getElementById("password").value);
	console.log(password1);

	if(un==""){
		document.getElementById("username").className = "wrong";
		return false;
	}
	else{
		document.getElementById("username").className = "valid";
	}
	

	if(password1){
		document.getElementById("password").className = "valid";
	}
	else{
		document.getElementById("password").className = "wrong";
		return false;
	}

}

function readMsg(count){
	// var $name = document.getElementByClassName('name');
	// var $subject = document.getElementByClassName('subject');
	// $name.className = "unread";
	// $subject.className = "unread";
	
	// $(name).removeClass("unread");
	// $name.onclick = $name.className="read";
	$('#msg'+count).removeClass("unread");

	
	var msgId = document.getElementById("idMsg"+count).textContent;
	var data = 'id=' + msgId;
	
	// AJAX code using Jquery
	$.ajax({
	type: "POST",
	url: "Readmsg.php",
	data: data,
	cache: false,
	success: null
	});					

	// View the message
	// AJAX code using Jquery
	setTimeout(function(){
		$("#msgView").load("view.php?id="+msgId);
		}, 1000);

}

	
	
	
