<!-- ANONYMOUS CHAT using chat box -->

<html>
<head>
<title>ANONYMOUS CHAT</title>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

<script type="text/javascript" src="jscolor.js"></script>   <!--version 1.3.13-->

<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>

<script src="jquery-1.10.1.min.js"></script>

<script>

//MAIN PROGRAM 

$(document).ready(function() {  // it starts when html page is completely loaded only!
	$.ajaxSetup(
        {
            cache: false,                 //it appends a timestamp to the URL, 
            beforeSend: function() 
	    {
                $('#messages').hide();
                $('#messages').show();
		$("#messages").animate({"scrollTop": $('#messages')[0].scrollHeight}, "slow");  // duration 600 milisecs
            },
            
            complete: function() {
                $('#messages').hide();
                $('#messages').show();
		$("#messages").animate({"scrollTop": $('#messages')[0].scrollHeight}, "slow");
            },
            
            success: function() {
                $('#messages').hide();
                $('#messages').show();
		$("#messages").animate({"scrollTop": $('#messages')[0].scrollHeight}, "slow");
            }
        });

        var $container = $("#messages");
        $container.load('ajaxload.php?id=<?php echo 'a' ?>');

        var refreshId = setInterval(function()
        {
            $container.load('ajaxload.php?id=<?php echo 'a' ?>');
        }, 1000);

	$("#userArea").submit(function() {          //form submition time	
		
		$.post('ajaxPost.php', $('#userArea').serialize(), function(data) {
			$("#messages").append(data);
			$("#messages").animate({"scrollTop": $('#messages')[0].scrollHeight}, "slow");
			document.getElementById("output").value = "";
			});
		return false;
	});
});

</script>


</head>
<body bgcolor="#008080">
<center><b><u>ANONYMOUS CHAT</b></u></center>
<div id="chatwrapper">
<div id="messages"></div>

<form id="userArea">

<div id="usercolor">
<input type="text" name="user" placeholder="User" required="required" value="argie" id="text" style="margin-bottom: 5px;" />
<input name="text" class="color" id="text" maxlength="6" value="000000" />
</div>

<div id="messagesntry">
<textarea id="output" name="messages" placeholder="Message" /></textarea>
</div>

<div id="messagesubmit">
<input type="submit" value="Post message" id="submitmessage" />
</div>

</form>
</div>
</body>
</html>
